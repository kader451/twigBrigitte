<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016184305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cage_employer (id INT AUTO_INCREMENT NOT NULL, cage_id INT DEFAULT NULL, employer_id INT DEFAULT NULL, INDEX IDX_571E3D525A70E5B7 (cage_id), INDEX IDX_571E3D5241CD9E7A (employer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cage_employer ADD CONSTRAINT FK_571E3D525A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage_employer ADD CONSTRAINT FK_571E3D5241CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE cage_employee DROP FOREIGN KEY FK_D4CDB8955A70E5B7');
        $this->addSql('ALTER TABLE cage_employee DROP FOREIGN KEY FK_D4CDB8958C03F15C');
        $this->addSql('DROP TABLE cage_employee');
        $this->addSql('ALTER TABLE animals ADD adoptant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('CREATE INDEX IDX_966C69DD8D8B49F9 ON animals (adoptant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cage_employee (id INT AUTO_INCREMENT NOT NULL, cage_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, INDEX IDX_D4CDB8955A70E5B7 (cage_id), INDEX IDX_D4CDB8958C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cage_employee ADD CONSTRAINT FK_D4CDB8955A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage_employee ADD CONSTRAINT FK_D4CDB8958C03F15C FOREIGN KEY (employee_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE cage_employer DROP FOREIGN KEY FK_571E3D525A70E5B7');
        $this->addSql('ALTER TABLE cage_employer DROP FOREIGN KEY FK_571E3D5241CD9E7A');
        $this->addSql('DROP TABLE cage_employer');
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD8D8B49F9');
        $this->addSql('DROP INDEX IDX_966C69DD8D8B49F9 ON animals');
        $this->addSql('ALTER TABLE animals DROP adoptant_id');
    }
}
