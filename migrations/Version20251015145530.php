<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015145530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cage (id INT AUTO_INCREMENT NOT NULL, num_cage INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carnet_sante (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, vaccins VARCHAR(255) NOT NULL, date_vaccination DATE NOT NULL, date_future_vaccination DATE NOT NULL, UNIQUE INDEX UNIQ_A7801B4F8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employes (id INT AUTO_INCREMENT NOT NULL, nom_employe VARCHAR(255) NOT NULL, prenom_employe VARCHAR(255) NOT NULL, num_employe VARCHAR(255) NOT NULL, sexe_employe VARCHAR(255) NOT NULL, ville_employe VARCHAR(255) NOT NULL, type_poste VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, famille_id INT DEFAULT NULL, nom_espece VARCHAR(50) NOT NULL, INDEX IDX_1A2A1B197A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, ordre_id INT DEFAULT NULL, nom_famille VARCHAR(50) NOT NULL, INDEX IDX_2473F2139291498C (ordre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonctionnalites (id INT AUTO_INCREMENT NOT NULL, num_fonctionnalite INT NOT NULL, type_fonctionnalite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, animal_id INT DEFAULT NULL, nom_maladie VARCHAR(50) NOT NULL, INDEX IDX_ADC4024B8E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, type_menu VARCHAR(255) NOT NULL, quantite_viande INT NOT NULL, quantite_legume INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordre (id INT AUTO_INCREMENT NOT NULL, nom_ordre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origine (id INT AUTO_INCREMENT NOT NULL, pays VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carnet_sante ADD CONSTRAINT FK_A7801B4F8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE espece ADD CONSTRAINT FK_1A2A1B197A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F2139291498C FOREIGN KEY (ordre_id) REFERENCES ordre (id)');
        $this->addSql('ALTER TABLE maladie ADD CONSTRAINT FK_ADC4024B8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE animal ADD espece_id INT DEFAULT NULL, ADD origine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F2D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F87998E FOREIGN KEY (origine_id) REFERENCES origine (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F2D191E7A ON animal (espece_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F87998E ON animal (origine_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F2D191E7A');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F87998E');
        $this->addSql('ALTER TABLE carnet_sante DROP FOREIGN KEY FK_A7801B4F8E962C16');
        $this->addSql('ALTER TABLE espece DROP FOREIGN KEY FK_1A2A1B197A77B84');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F2139291498C');
        $this->addSql('ALTER TABLE maladie DROP FOREIGN KEY FK_ADC4024B8E962C16');
        $this->addSql('DROP TABLE cage');
        $this->addSql('DROP TABLE carnet_sante');
        $this->addSql('DROP TABLE employes');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE fonctionnalites');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('DROP TABLE origine');
        $this->addSql('DROP INDEX IDX_6AAB231F2D191E7A ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F87998E ON animal');
        $this->addSql('ALTER TABLE animal DROP espece_id, DROP origine_id');
    }
}
