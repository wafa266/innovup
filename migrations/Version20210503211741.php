<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503211741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bon_de_reception (id INT AUTO_INCREMENT NOT NULL, provider_orders_id INT DEFAULT NULL, INDEX IDX_D9477C6B16608264 (provider_orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(45) DEFAULT NULL, last_name VARCHAR(45) DEFAULT NULL, email VARCHAR(45) DEFAULT NULL, address VARCHAR(45) DEFAULT NULL, phone VARCHAR(45) DEFAULT NULL, tax_number VARCHAR(100) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_orders (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, is_paid TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX product_id_fk_idx (id), INDEX customer_id_fk_idx (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_orders_product (customer_orders_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_BB52421C640362CC (customer_orders_id), INDEX IDX_BB52421C4584665A (product_id), PRIMARY KEY(customer_orders_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_orders_quantity (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, customer_orders_id INT DEFAULT NULL, quantity INT DEFAULT NULL, INDEX IDX_23FD8D6A4584665A (product_id), INDEX IDX_23FD8D6A640362CC (customer_orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(45) NOT NULL, price DOUBLE PRECISION DEFAULT NULL, tva DOUBLE PRECISION DEFAULT NULL, price_excluding_tax DOUBLE PRECISION DEFAULT NULL, price_ttc DOUBLE PRECISION DEFAULT NULL, Benefice_margin DOUBLE PRECISION DEFAULT NULL, barcode VARCHAR(250) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, quantity INT DEFAULT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), INDEX category_id_fk_idx (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(45) DEFAULT NULL, last_name VARCHAR(45) DEFAULT NULL, email VARCHAR(45) DEFAULT NULL, address VARCHAR(45) DEFAULT NULL, phone VARCHAR(45) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_orders (id INT AUTO_INCREMENT NOT NULL, provider_id INT DEFAULT NULL, reference VARCHAR(100) DEFAULT NULL, is_paid TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, INDEX product_id_fk_1_idx (id), INDEX provider_id_fk_idx (provider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_orders_product (provider_orders_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_7AE2B97E16608264 (provider_orders_id), INDEX IDX_7AE2B97E4584665A (product_id), PRIMARY KEY(provider_orders_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider_orders_quantity (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, provider_orders_id INT DEFAULT NULL, quantity INT DEFAULT NULL, INDEX IDX_80803DE54584665A (product_id), INDEX IDX_80803DE516608264 (provider_orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, email VARCHAR(45) NOT NULL, password VARCHAR(250) NOT NULL, phone VARCHAR(45) DEFAULT NULL, roles JSON DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bon_de_reception ADD CONSTRAINT FK_D9477C6B16608264 FOREIGN KEY (provider_orders_id) REFERENCES provider_orders (id)');
        $this->addSql('ALTER TABLE customer_orders ADD CONSTRAINT FK_54EA21BF9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE customer_orders_product ADD CONSTRAINT FK_BB52421C640362CC FOREIGN KEY (customer_orders_id) REFERENCES customer_orders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer_orders_product ADD CONSTRAINT FK_BB52421C4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customer_orders_quantity ADD CONSTRAINT FK_23FD8D6A4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE customer_orders_quantity ADD CONSTRAINT FK_23FD8D6A640362CC FOREIGN KEY (customer_orders_id) REFERENCES customer_orders (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE provider_orders ADD CONSTRAINT FK_B21E1E7EA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE provider_orders_product ADD CONSTRAINT FK_7AE2B97E16608264 FOREIGN KEY (provider_orders_id) REFERENCES provider_orders (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE provider_orders_product ADD CONSTRAINT FK_7AE2B97E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE provider_orders_quantity ADD CONSTRAINT FK_80803DE54584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE provider_orders_quantity ADD CONSTRAINT FK_80803DE516608264 FOREIGN KEY (provider_orders_id) REFERENCES provider_orders (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE customer_orders DROP FOREIGN KEY FK_54EA21BF9395C3F3');
        $this->addSql('ALTER TABLE customer_orders_product DROP FOREIGN KEY FK_BB52421C640362CC');
        $this->addSql('ALTER TABLE customer_orders_quantity DROP FOREIGN KEY FK_23FD8D6A640362CC');
        $this->addSql('ALTER TABLE customer_orders_product DROP FOREIGN KEY FK_BB52421C4584665A');
        $this->addSql('ALTER TABLE customer_orders_quantity DROP FOREIGN KEY FK_23FD8D6A4584665A');
        $this->addSql('ALTER TABLE provider_orders_product DROP FOREIGN KEY FK_7AE2B97E4584665A');
        $this->addSql('ALTER TABLE provider_orders_quantity DROP FOREIGN KEY FK_80803DE54584665A');
        $this->addSql('ALTER TABLE provider_orders DROP FOREIGN KEY FK_B21E1E7EA53A8AA');
        $this->addSql('ALTER TABLE bon_de_reception DROP FOREIGN KEY FK_D9477C6B16608264');
        $this->addSql('ALTER TABLE provider_orders_product DROP FOREIGN KEY FK_7AE2B97E16608264');
        $this->addSql('ALTER TABLE provider_orders_quantity DROP FOREIGN KEY FK_80803DE516608264');
        $this->addSql('DROP TABLE bon_de_reception');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE customer_orders');
        $this->addSql('DROP TABLE customer_orders_product');
        $this->addSql('DROP TABLE customer_orders_quantity');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE provider_orders');
        $this->addSql('DROP TABLE provider_orders_product');
        $this->addSql('DROP TABLE provider_orders_quantity');
        $this->addSql('DROP TABLE user');
    }
}
