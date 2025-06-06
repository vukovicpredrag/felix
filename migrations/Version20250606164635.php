<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250606164635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nasa_prica ADD image VARCHAR(500) DEFAULT NULL, DROP sale_section_link, DROP sale_section_link_title, DROP image1, DROP image2, DROP image3, DROP image4, DROP hide, CHANGE sale_section_title our_story_title VARCHAR(255) DEFAULT NULL, CHANGE sale_section_paragraph our_story_paragraph VARCHAR(1000) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nasa_prica ADD sale_section_link_title VARCHAR(500) DEFAULT NULL, ADD image1 VARCHAR(500) DEFAULT NULL, ADD image2 VARCHAR(500) DEFAULT NULL, ADD image3 VARCHAR(500) DEFAULT NULL, ADD image4 VARCHAR(500) DEFAULT NULL, ADD hide TINYINT(1) DEFAULT NULL, CHANGE our_story_title sale_section_title VARCHAR(255) DEFAULT NULL, CHANGE our_story_paragraph sale_section_paragraph VARCHAR(1000) DEFAULT NULL, CHANGE image sale_section_link VARCHAR(500) DEFAULT NULL');
    }
}
