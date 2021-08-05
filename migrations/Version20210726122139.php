<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726122139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lacet (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chaussure ADD lacet_id INT NOT NULL');
        $this->addSql('ALTER TABLE chaussure ADD CONSTRAINT FK_43D478976D4883EC FOREIGN KEY (lacet_id) REFERENCES lacet (id)');
        $this->addSql('CREATE INDEX IDX_43D478976D4883EC ON chaussure (lacet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chaussure DROP FOREIGN KEY FK_43D478976D4883EC');
        $this->addSql('DROP TABLE lacet');
        $this->addSql('DROP INDEX IDX_43D478976D4883EC ON chaussure');
        $this->addSql('ALTER TABLE chaussure DROP lacet_id');
    }
}
