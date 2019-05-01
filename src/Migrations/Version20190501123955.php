<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190501123955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, latitude NUMERIC(20, 15) NOT NULL, longitude NUMERIC(20, 15) NOT NULL, zoom INT NOT NULL, nlatitude NUMERIC(20, 15) NOT NULL, slatitude NUMERIC(20, 15) NOT NULL, elongitude NUMERIC(20, 15) NOT NULL, wlongitude NUMERIC(20, 15) NOT NULL, position INT NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_type_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_C8A633D02C2AC5D3 (translatable_id), UNIQUE INDEX site_type_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_5F477ADF2C2AC5D3 (translatable_id), UNIQUE INDEX site_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_type (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, color VARCHAR(20) DEFAULT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE site_type_translation ADD CONSTRAINT FK_C8A633D02C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES site_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_translation ADD CONSTRAINT FK_5F477ADF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES site (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE site_translation DROP FOREIGN KEY FK_5F477ADF2C2AC5D3');
        $this->addSql('ALTER TABLE site_type_translation DROP FOREIGN KEY FK_C8A633D02C2AC5D3');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE site_type_translation');
        $this->addSql('DROP TABLE site_translation');
        $this->addSql('DROP TABLE site_type');
    }
}
