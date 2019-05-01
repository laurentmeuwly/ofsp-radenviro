<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190427145621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE element_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_1ECF1DC22C2AC5D3 (translatable_id), UNIQUE INDEX element_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE isotope (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, code VARCHAR(10) NOT NULL, z INT DEFAULT NULL, a BIGINT DEFAULT NULL, decay_mode VARCHAR(40) DEFAULT NULL, half_life VARCHAR(20) DEFAULT NULL, seconds DOUBLE PRECISION DEFAULT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE isotope_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_8C1D71692C2AC5D3 (translatable_id), UNIQUE INDEX isotope_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, symbol VARCHAR(20) NOT NULL, z INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE element_translation ADD CONSTRAINT FK_1ECF1DC22C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE isotope_translation ADD CONSTRAINT FK_8C1D71692C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES isotope (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE isotope_translation DROP FOREIGN KEY FK_8C1D71692C2AC5D3');
        $this->addSql('ALTER TABLE element_translation DROP FOREIGN KEY FK_1ECF1DC22C2AC5D3');
        $this->addSql('DROP TABLE element_translation');
        $this->addSql('DROP TABLE isotope');
        $this->addSql('DROP TABLE isotope_translation');
        $this->addSql('DROP TABLE element');
    }
}
