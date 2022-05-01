<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220501122105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, order_date DATE NOT NULL, odbiorca VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_invoice_item (invoice_id INT NOT NULL, invoice_item_id INT NOT NULL, INDEX IDX_A219680F2989F1FD (invoice_id), INDEX IDX_A219680FE0B6648D (invoice_item_id), PRIMARY KEY(invoice_id, invoice_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice_item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice_invoice_item ADD CONSTRAINT FK_A219680F2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice_invoice_item ADD CONSTRAINT FK_A219680FE0B6648D FOREIGN KEY (invoice_item_id) REFERENCES invoice_item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE invoice_invoice_item DROP FOREIGN KEY FK_A219680F2989F1FD');
        $this->addSql('ALTER TABLE invoice_invoice_item DROP FOREIGN KEY FK_A219680FE0B6648D');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_invoice_item');
        $this->addSql('DROP TABLE invoice_item');
    }
}
