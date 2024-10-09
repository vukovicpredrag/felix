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

        $email = (new Email())
            ->from('sender@example.com')
            ->to('pedja0023@live.com')
            ->subject('Subject Here')
            ->text('Email body here');

        try {
            // Try to send the email
            $this->mailer->send($email);
            echo "Email sent successfully!";
        } catch (TransportExceptionInterface $e) {
            // Handle transport exceptions (e.g., authentication issues)
            echo "Failed to send email: " . $e->getMessage();
        } catch (\Exception $e) {
            // Handle any other exceptions
            echo "An error occurred: " . $e->getMessage();
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
