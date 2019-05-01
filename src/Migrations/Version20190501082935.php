<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190501082935 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE automatic_network_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, url TINYTEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_BF3631DC2C2AC5D3 (translatable_id), UNIQUE INDEX automatic_network_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE automatic_network_translation ADD CONSTRAINT FK_BF3631DC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES automatic_network (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE automatic_network ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE automatic_network_translation');
        $this->addSql('ALTER TABLE automatic_network DROP created_at, DROP updated_at');
    }
}
