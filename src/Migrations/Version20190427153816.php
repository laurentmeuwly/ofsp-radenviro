<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190427153816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE method (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, zoom INT DEFAULT NULL, default_zoom INT DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_FF7092FE2C2AC5D3 (translatable_id), UNIQUE INDEX type_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station_type (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network_category (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE automatic_network (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(10) NOT NULL, position INT NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station_type_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, description TEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_AB615C022C2AC5D3 (translatable_id), UNIQUE INDEX station_type_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_7667EB372C2AC5D3 (translatable_id), UNIQUE INDEX network_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, description TEXT DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_B755402E2C2AC5D3 (translatable_id), UNIQUE INDEX station_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network_category_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_79A0D5362C2AC5D3 (translatable_id), UNIQUE INDEX network_category_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result_unit (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE laboratory (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE automatic_network_station (id INT AUTO_INCREMENT NOT NULL, latitude NUMERIC(20, 15) NOT NULL, longitude NUMERIC(20, 15) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE type_translation ADD CONSTRAINT FK_FF7092FE2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE station_type_translation ADD CONSTRAINT FK_AB615C022C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES station_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE network_translation ADD CONSTRAINT FK_7667EB372C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES network (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE station_translation ADD CONSTRAINT FK_B755402E2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE network_category_translation ADD CONSTRAINT FK_79A0D5362C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES network_category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE station_translation DROP FOREIGN KEY FK_B755402E2C2AC5D3');
        $this->addSql('ALTER TABLE network_translation DROP FOREIGN KEY FK_7667EB372C2AC5D3');
        $this->addSql('ALTER TABLE station_type_translation DROP FOREIGN KEY FK_AB615C022C2AC5D3');
        $this->addSql('ALTER TABLE network_category_translation DROP FOREIGN KEY FK_79A0D5362C2AC5D3');
        $this->addSql('ALTER TABLE type_translation DROP FOREIGN KEY FK_FF7092FE2C2AC5D3');
        $this->addSql('DROP TABLE method');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE network');
        $this->addSql('DROP TABLE type_translation');
        $this->addSql('DROP TABLE station_type');
        $this->addSql('DROP TABLE network_category');
        $this->addSql('DROP TABLE automatic_network');
        $this->addSql('DROP TABLE station_type_translation');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE network_translation');
        $this->addSql('DROP TABLE station_translation');
        $this->addSql('DROP TABLE network_category_translation');
        $this->addSql('DROP TABLE result_unit');
        $this->addSql('DROP TABLE laboratory');
        $this->addSql('DROP TABLE automatic_network_station');
    }
}
