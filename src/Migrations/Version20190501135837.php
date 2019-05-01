<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190501135837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE isotope ADD element_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE isotope ADD CONSTRAINT FK_A0A71E4C1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('CREATE INDEX IDX_A0A71E4C1F1F2A24 ON isotope (element_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE isotope DROP FOREIGN KEY FK_A0A71E4C1F1F2A24');
        $this->addSql('DROP INDEX IDX_A0A71E4C1F1F2A24 ON isotope');
        $this->addSql('ALTER TABLE isotope DROP element_id');
    }
}
