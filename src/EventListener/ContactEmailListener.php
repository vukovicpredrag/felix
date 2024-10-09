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
                ->from('predrag.vukovic@etondigtal.com') // Sender's email
                ->to('vukovicpredrag90@gmail.com') // Recipient's email
                ->subject('New Contact Us Submission')
                ->text(sprintf(
                    "You have a new contact form submission:\n\nName: %s\nEmail: %s\nSubject: %s\nMessage: %s",
                    $contactUs->getName(),
                    $contactUs->getEmail(),
                    $contactUs->getSubject(),
                    $contactUs->getMessage()
                ))
                ->html(sprintf(
                    "<p>You have a new contact form submission:</p><ul>
                        <li><strong>Name:</strong> %s</li>
                        <li><strong>Email:</strong> %s</li>
                        <li><strong>Subject:</strong> %s</li>
                        <li><strong>Message:</strong> %s</li>
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
