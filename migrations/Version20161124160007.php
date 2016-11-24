<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161124160007 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE busket_content (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, vat_type_id INT NOT NULL, busket_id INT NOT NULL, price NUMERIC(10, 2) NOT NULL, vat NUMERIC(4, 3) NOT NULL, qty INT NOT NULL, INDEX IDX_4EDCECFC4584665A (product_id), INDEX IDX_4EDCECFC3A5C664C (vat_type_id), INDEX IDX_4EDCECFCE310C483 (busket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, description VARCHAR(255) DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE busket (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vat_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, value NUMERIC(4, 3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE busket_content ADD CONSTRAINT FK_4EDCECFC4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE busket_content ADD CONSTRAINT FK_4EDCECFC3A5C664C FOREIGN KEY (vat_type_id) REFERENCES vat_type (id)');
        $this->addSql('ALTER TABLE busket_content ADD CONSTRAINT FK_4EDCECFCE310C483 FOREIGN KEY (busket_id) REFERENCES busket (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE busket_content DROP FOREIGN KEY FK_4EDCECFC4584665A');
        $this->addSql('ALTER TABLE busket_content DROP FOREIGN KEY FK_4EDCECFCE310C483');
        $this->addSql('ALTER TABLE busket_content DROP FOREIGN KEY FK_4EDCECFC3A5C664C');
        $this->addSql('DROP TABLE busket_content');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE busket');
        $this->addSql('DROP TABLE vat_type');
    }
}
