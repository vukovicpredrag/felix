<?php

namespace App\Command;

use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Command for creating superadmin users
 */
#[AsCommand(
    name: 'app:create-superadmin',
    description: 'Creates superadmin user.'
)]
class TestCommand extends Command
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
        parent::__construct();

    }



    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        try {
            // Create the email
            $email = (new Email())
                ->from('predrag.vukovic@etondigtal.com') // Sender's email
                ->to('vukovicpredrag90@gmail.com') // Recipient's email
                ->subject('New Contact Us Submission')
                ->text(sprintf(
                    "You have a new contact form submission:\n\nName: %s\nEmail: %s\nSubject: %s\nMessage: %s",
                    'a',
                    'b',
                    'c',
                    'd'
                ))
                ->html(sprintf(
                    "<p>You have a new contact form submission:</p><ul>
                        <li><strong>Name:</strong> %s</li>
                        <li><strong>Email:</strong> %s</li>
                        <li><strong>Subject:</strong> %s</li>
                        <li><strong>Message:</strong> %s</li>
                    </ul>",
                   'a',
                    'b',
                    'c',
                    'd'
                ));

            // Send the email
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            // Log the error
            $this->logger->error('Email sending failed: ' . $e->getMessage());

            // Optionally log to error log
            error_log('Email sending failed: ' . $e->getMessage());
        }

        return 1;
    }

    /**
     * @inheritDoc
     */
    protected function configure(): void
    {

    }

}
