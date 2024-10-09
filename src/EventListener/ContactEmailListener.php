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
            // Create the email
            $email = (new Email())
                ->from('info@admin.hannachairs.com') // Sender's email
                ->to($contactUs->getEmail()) // Recipient's email
                ->subject('Hanna Chairs Kontakt')
                ->text(sprintf(
                    "Imate novu poruku:\n\nName: %s\nEmail: %s\nSubject: %s\nMessage: %s",
                    $contactUs->getName(),
                    $contactUs->getEmail(),
                    $contactUs->getSubject(),
                    $contactUs->getMessage()
                ))
                ->html(sprintf(
                    "<p>Imate novu poruku:</p><ul>
                        <li><strong>Ime:</strong> %s</li>
                        <li><strong>Email:</strong> %s</li>
                        <li><strong>Predmet:</strong> %s</li>
                        <li><strong>Poruka:</strong> %s</li>
                    </ul>",
                    $contactUs->getName(),
                    $contactUs->getEmail(),
                    $contactUs->getSubject(),
                    nl2br($contactUs->getMessage())
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
