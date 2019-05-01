<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190501140642 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE network ADD network_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE network ADD CONSTRAINT FK_608487BCD04833BA FOREIGN KEY (network_category_id) REFERENCES network_category (id)');
        $this->addSql('CREATE INDEX IDX_608487BCD04833BA ON network (network_category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE network DROP FOREIGN KEY FK_608487BCD04833BA');
        $this->addSql('DROP INDEX IDX_608487BCD04833BA ON network');
        $this->addSql('ALTER TABLE network DROP network_category_id');
    }
}
