<?php

namespace App\EventListener;

use App\Entity\ContactUs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Psr\Log\LoggerInterface;

/**
 * ContactUs post persist listener
 */
#[AsEntityListener(event: Events::postPersist, method: 'onPostPersist', entity: ContactUs::class)]
class ContactEmailListener
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * Dispatch event to create notifications for contact creation
     *
     * @param ContactUs $contactUs
     *
     * @return void
     */
    public function onPostPersist(ContactUs $contactUs): void
    {
        try {
            // Define the public URL to the logo
            $logoUrl = 'https://admin.hannachairs.com/admin/assets/images/hanna-logo.avif';

            // Create the email
            $email = (new Email())
                ->from('hannachairs@admin.hannachairs.com') // Sender's email
                ->to($contactUs->getEmail()) // Recipient's email
                ->subject('Hanna Chairs Kontakt')
                ->html(sprintf(
                    '
                    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px;">

                        <!-- Header with logo -->
                        <div style="text-align: center; padding: 20px 0; border-bottom: 1px solid #ddd;">
                            <img src="%s" alt="Hanna Chairs Logo" style="width: 150px;" />
                        </div>

                        <!-- Body content -->
                        <div style="padding: 20px 0;">
                        <p>Poštovani %s,</p>
<p>Zahvaljujemo vam što ste nas kontaktirali. Primili smo vašu poruku i javit ćemo vam se u najkraćem mogućem roku. U nastavku je sažetak vašeg upita:</p>
                            <ul style="list-style: none; padding: 0;">
                                <li><strong>Ime:</strong> %s</li>
                                <li><strong>Email:</strong> %s</li>
                                <li><strong>Predmet:</strong> %s</li>
                                <li><strong>Poruka:</strong> %s</li>
                            </ul>
                        </div>

                        <!-- Footer -->
                        <div style="text-align: center; padding: 20px 0; border-top: 1px solid #ddd;">
                            <p style="font-size: 12px; color: #777;">&copy; 2024 Hanna Chairs. Sva prava zdržana.</p>
                            <p style="font-size: 12px; color: #777;">
                                Visit us at <a href="https://hannachairs.com" style="color: #3498db;">hannachairs.com</a>
                            </p>
                        </div>

                    </div>
                    ',
                    $logoUrl, // Logo URL
                    $contactUs->getName(), // Name
                    $contactUs->getName(), // Name
                    $contactUs->getEmail(), // Email
                    $contactUs->getSubject(), // Subject
                    nl2br($contactUs->getMessage()) // Message
                ));

            // Send the email
            $this->mailer->send($email);

        } catch (TransportExceptionInterface $e) {
            // Log the error
            $this->logger->error('Email sending failed: ' . $e->getMessage());

            // Optionally log to error log
            error_log('Email sending failed: ' . $e->getMessage());
        }
    }
}
