<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505001904 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exit_voucher (id INT AUTO_INCREMENT NOT NULL, customer_orders_id INT DEFAULT NULL, INDEX IDX_D80486E640362CC (customer_orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exit_voucher ADD CONSTRAINT FK_D80486E640362CC FOREIGN KEY (customer_orders_id) REFERENCES customer_orders (id)');
        $this->addSql('ALTER TABLE customer_orders ADD reference VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE exit_voucher');
        $this->addSql('ALTER TABLE customer_orders DROP reference');
    }
}
