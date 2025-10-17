<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016120011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, sexe VARCHAR(50) NOT NULL, data_naissance DATE DEFAULT NULL, age INT DEFAULT NULL, numero_identification INT DEFAULT NULL, adoptable TINYINT(1) DEFAULT NULL, date_arrive DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage (id INT AUTO_INCREMENT NOT NULL, capacite INT DEFAULT NULL, numero INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage_employee (id INT AUTO_INCREMENT NOT NULL, cage_id INT DEFAULT NULL, employee_id INT DEFAULT NULL, INDEX IDX_D4CDB8955A70E5B7 (cage_id), INDEX IDX_D4CDB8958C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cage_fonctionnalite (id INT AUTO_INCREMENT NOT NULL, cage_id INT DEFAULT NULL, fonctionnalite_id INT DEFAULT NULL, INDEX IDX_8E0D45BF5A70E5B7 (cage_id), INDEX IDX_8E0D45BF4477C5D8 (fonctionnalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carnet_sante (id INT AUTO_INCREMENT NOT NULL, numero_carnet INT DEFAULT NULL, date_creation_carnet DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, age INT DEFAULT NULL, sexe VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonctionnalite_cage (id INT AUTO_INCREMENT NOT NULL, nom_fonctionnalite_cage VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, description LONGTEXT DEFAULT NULL, nombre_contraction INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie_animal (id INT AUTO_INCREMENT NOT NULL, animals_id INT DEFAULT NULL, maladie_id INT DEFAULT NULL, INDEX IDX_3BC8CBD7132B9E58 (animals_id), INDEX IDX_3BC8CBD7B4B1C397 (maladie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays_origine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refuge (id INT AUTO_INCREMENT NOT NULL, fonctionalite VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relation_affiliation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(55) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin_carnet (id INT AUTO_INCREMENT NOT NULL, carnet_id INT DEFAULT NULL, vaccin_id INT DEFAULT NULL, INDEX IDX_53E7112DFA207516 (carnet_id), INDEX IDX_53E7112D9B14AC76 (vaccin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cage_employee ADD CONSTRAINT FK_D4CDB8955A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage_employee ADD CONSTRAINT FK_D4CDB8958C03F15C FOREIGN KEY (employee_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE cage_fonctionnalite ADD CONSTRAINT FK_8E0D45BF5A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE cage_fonctionnalite ADD CONSTRAINT FK_8E0D45BF4477C5D8 FOREIGN KEY (fonctionnalite_id) REFERENCES fonctionnalite_cage (id)');
        $this->addSql('ALTER TABLE maladie_animal ADD CONSTRAINT FK_3BC8CBD7132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE maladie_animal ADD CONSTRAINT FK_3BC8CBD7B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id)');
        $this->addSql('ALTER TABLE vaccin_carnet ADD CONSTRAINT FK_53E7112DFA207516 FOREIGN KEY (carnet_id) REFERENCES carnet_sante (id)');
        $this->addSql('ALTER TABLE vaccin_carnet ADD CONSTRAINT FK_53E7112D9B14AC76 FOREIGN KEY (vaccin_id) REFERENCES vaccin (id)');
        $this->addSql('ALTER TABLE alimentation_animal ADD CONSTRAINT FK_6B0F803D132B9E58 FOREIGN KEY (animals_id) REFERENCES animals (id)');
        $this->addSql('ALTER TABLE alimentation_animal ADD CONSTRAINT FK_6B0F803D8441D4D9 FOREIGN KEY (alimentation_id) REFERENCES alimentation (id)');
        $this->addSql('ALTER TABLE allee_employee ADD CONSTRAINT FK_FA6384958E6975D2 FOREIGN KEY (allee_id) REFERENCES allee (id)');
        $this->addSql('ALTER TABLE allee_employee ADD CONSTRAINT FK_FA63849541CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alimentation_animal DROP FOREIGN KEY FK_6B0F803D132B9E58');
        $this->addSql('ALTER TABLE allee_employee DROP FOREIGN KEY FK_FA63849541CD9E7A');
        $this->addSql('ALTER TABLE cage_employee DROP FOREIGN KEY FK_D4CDB8955A70E5B7');
        $this->addSql('ALTER TABLE cage_employee DROP FOREIGN KEY FK_D4CDB8958C03F15C');
        $this->addSql('ALTER TABLE cage_fonctionnalite DROP FOREIGN KEY FK_8E0D45BF5A70E5B7');
        $this->addSql('ALTER TABLE cage_fonctionnalite DROP FOREIGN KEY FK_8E0D45BF4477C5D8');
        $this->addSql('ALTER TABLE maladie_animal DROP FOREIGN KEY FK_3BC8CBD7132B9E58');
        $this->addSql('ALTER TABLE maladie_animal DROP FOREIGN KEY FK_3BC8CBD7B4B1C397');
        $this->addSql('ALTER TABLE vaccin_carnet DROP FOREIGN KEY FK_53E7112DFA207516');
        $this->addSql('ALTER TABLE vaccin_carnet DROP FOREIGN KEY FK_53E7112D9B14AC76');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE cage');
        $this->addSql('DROP TABLE cage_employee');
        $this->addSql('DROP TABLE cage_fonctionnalite');
        $this->addSql('DROP TABLE carnet_sante');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fonctionnalite_cage');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE maladie_animal');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('DROP TABLE pays_origine');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE refuge');
        $this->addSql('DROP TABLE relation_affiliation');
        $this->addSql('DROP TABLE vaccin');
        $this->addSql('DROP TABLE vaccin_carnet');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE alimentation_animal DROP FOREIGN KEY FK_6B0F803D8441D4D9');
        $this->addSql('ALTER TABLE allee_employee DROP FOREIGN KEY FK_FA6384958E6975D2');
    }
}
