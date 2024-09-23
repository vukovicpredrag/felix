<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240913104144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_link (id INT AUTO_INCREMENT NOT NULL, link_to VARCHAR(255) DEFAULT NULL, category_title VARCHAR(255) DEFAULT NULL, category_short_description LONGTEXT DEFAULT NULL, category_cta_text LONGTEXT DEFAULT NULL, image VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE category_section (id INT AUTO_INCREMENT NOT NULL, main_categories_section_heading VARCHAR(500) DEFAULT NULL, main_categories_section_subheading VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE about CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE shor_description shor_description VARCHAR(255) DEFAULT NULL, CHANGE long_description long_description VARCHAR(2000) DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE info_text info_text VARCHAR(2000) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hero_section CHANGE main_title_pre_text main_title_pre_text VARCHAR(255) DEFAULT NULL, CHANGE main_title main_title VARCHAR(255) DEFAULT NULL, CHANGE cta1_link cta1_link VARCHAR(255) DEFAULT NULL, CHANGE cta1_title cta1_title VARCHAR(255) DEFAULT NULL, CHANGE cta2_link cta2_link VARCHAR(500) DEFAULT NULL, CHANGE cta2_link_text cta2_link_text VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE background_image background_image VARCHAR(1000) DEFAULT NULL');
        $this->addSql('ALTER TABLE media_object CHANGE file_path file_path VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE main_image main_image VARCHAR(500) DEFAULT NULL, CHANGE keywords keywords JSON DEFAULT NULL, CHANGE slug slug VARCHAR(255) DEFAULT NULL, CHANGE ribbon_indicator ribbon_indicator VARCHAR(255) DEFAULT NULL, CHANGE ribbon_indicator_text ribbon_indicator_text VARCHAR(255) DEFAULT NULL, CHANGE main_price main_price VARCHAR(255) DEFAULT NULL, CHANGE discouted_price discouted_price VARCHAR(255) DEFAULT NULL, CHANGE singe_product_terms_box1_icon singe_product_terms_box1_icon VARCHAR(500) DEFAULT NULL, CHANGE singe_product_terms_box1_text2 singe_product_terms_box1_text2 VARCHAR(500) DEFAULT NULL, CHANGE singe_product_terms_box2_icon singe_product_terms_box2_icon VARCHAR(500) DEFAULT NULL, CHANGE short_description short_description VARCHAR(1000) DEFAULT NULL, CHANGE singe_product_terms_box3_text2 singe_product_terms_box3_text2 VARCHAR(250) DEFAULT NULL, CHANGE single_product_availability_text single_product_availability_text VARCHAR(250) DEFAULT NULL, CHANGE image1 image1 VARCHAR(250) DEFAULT NULL, CHANGE image2 image2 VARCHAR(250) DEFAULT NULL, CHANGE image3 image3 VARCHAR(250) DEFAULT NULL, CHANGE image4 image4 VARCHAR(250) DEFAULT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_link');
        $this->addSql('DROP TABLE category_section');
        $this->addSql('ALTER TABLE about CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE shor_description shor_description VARCHAR(255) DEFAULT \'NULL\', CHANGE long_description long_description VARCHAR(2000) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE article CHANGE picture picture VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE contact CHANGE info_text info_text VARCHAR(2000) DEFAULT \'NULL\', CHANGE phone phone VARCHAR(255) DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\', CHANGE address address VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE hero_section CHANGE main_title_pre_text main_title_pre_text VARCHAR(255) DEFAULT \'NULL\', CHANGE main_title main_title VARCHAR(255) DEFAULT \'NULL\', CHANGE cta1_link cta1_link VARCHAR(255) DEFAULT \'NULL\', CHANGE cta1_title cta1_title VARCHAR(255) DEFAULT \'NULL\', CHANGE cta2_link cta2_link VARCHAR(500) DEFAULT \'NULL\', CHANGE cta2_link_text cta2_link_text VARCHAR(255) DEFAULT \'NULL\', CHANGE type type VARCHAR(255) DEFAULT \'NULL\', CHANGE background_image background_image VARCHAR(1000) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE media_object CHANGE file_path file_path VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE product CHANGE main_image main_image VARCHAR(500) DEFAULT \'NULL\', CHANGE keywords keywords LONGTEXT DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE slug slug VARCHAR(255) DEFAULT \'NULL\', CHANGE ribbon_indicator ribbon_indicator VARCHAR(255) DEFAULT \'NULL\', CHANGE ribbon_indicator_text ribbon_indicator_text VARCHAR(255) DEFAULT \'NULL\', CHANGE main_price main_price VARCHAR(255) DEFAULT \'NULL\', CHANGE discouted_price discouted_price VARCHAR(255) DEFAULT \'NULL\', CHANGE singe_product_terms_box1_icon singe_product_terms_box1_icon VARCHAR(500) DEFAULT \'NULL\', CHANGE singe_product_terms_box1_text2 singe_product_terms_box1_text2 VARCHAR(500) DEFAULT \'NULL\', CHANGE singe_product_terms_box2_icon singe_product_terms_box2_icon VARCHAR(500) DEFAULT \'NULL\', CHANGE short_description short_description VARCHAR(1000) DEFAULT \'NULL\', CHANGE singe_product_terms_box3_text2 singe_product_terms_box3_text2 VARCHAR(250) DEFAULT \'NULL\', CHANGE single_product_availability_text single_product_availability_text VARCHAR(250) DEFAULT \'NULL\', CHANGE image1 image1 VARCHAR(250) DEFAULT \'NULL\', CHANGE image2 image2 VARCHAR(250) DEFAULT \'NULL\', CHANGE image3 image3 VARCHAR(250) DEFAULT \'NULL\', CHANGE image4 image4 VARCHAR(250) DEFAULT \'NULL\', CHANGE title title VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
