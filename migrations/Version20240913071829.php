<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240913071829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, shor_description VARCHAR(255) DEFAULT NULL, long_description VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, info_text VARCHAR(2000) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE home_page (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, main_description LONGTEXT DEFAULT NULL, main_image VARCHAR(500) DEFAULT NULL, keywords JSON DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, ribbon_indicator VARCHAR(255) DEFAULT NULL, ribbon_indicator_text VARCHAR(255) DEFAULT NULL, main_price VARCHAR(255) DEFAULT NULL, discouted_price VARCHAR(255) DEFAULT NULL, singe_product_terms_box1_icon VARCHAR(500) DEFAULT NULL, singe_product_terms_box1_text1 LONGTEXT DEFAULT NULL, singe_product_terms_box1_text2 VARCHAR(500) DEFAULT NULL, singe_product_terms_box2_icon VARCHAR(500) DEFAULT NULL, short_description VARCHAR(1000) DEFAULT NULL, singe_product_terms_box2_text1 LONGTEXT DEFAULT NULL, singe_product_terms_box2_text2 LONGTEXT DEFAULT NULL, singe_product_terms_box3_icon LONGTEXT DEFAULT NULL, singe_product_terms_box3_text1 LONGTEXT DEFAULT NULL, singe_product_terms_box3_text2 VARCHAR(250) DEFAULT NULL, single_product_availability_text VARCHAR(250) DEFAULT NULL, image1 VARCHAR(250) DEFAULT NULL, image2 VARCHAR(250) DEFAULT NULL, image3 VARCHAR(250) DEFAULT NULL, image4 VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE about');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE home_page');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
