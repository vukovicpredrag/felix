<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250604170729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE raznovrsni_stilovi_podaci (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, subtitle VARCHAR(500) DEFAULT NULL, image VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE raznovrsni_stilovi_uvod (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, sub_title VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE raznovrsni_stilovi_podaci');
        $this->addSql('DROP TABLE raznovrsni_stilovi_uvod');
    }
}
