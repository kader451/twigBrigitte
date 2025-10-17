<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251017125228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptant DROP FOREIGN KEY FK_7B42F2A132B9E58');
        $this->addSql('DROP INDEX IDX_7B42F2A132B9E58 ON adoptant');
        $this->addSql('ALTER TABLE adoptant CHANGE animals_id animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adoptant ADD CONSTRAINT FK_7B42F2A8E962C16 FOREIGN KEY (animal_id) REFERENCES animals (id)');
        $this->addSql('CREATE INDEX IDX_7B42F2A8E962C16 ON adoptant (animal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptant DROP FOREIGN KEY FK_7B42F2A8E962C16');
        $this->addSql('DROP INDEX IDX_7B42F2A8E962C16 ON adoptant');
        $this->addSql('ALTER TABLE adoptant CHANGE animal_id animals_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adoptant ADD CONSTRAINT FK_7B42F2A132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('CREATE INDEX IDX_7B42F2A132B9E58 ON adoptant (animals_id)');
    }
}
