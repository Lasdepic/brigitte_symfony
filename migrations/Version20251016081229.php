<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016081229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adoptant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employes_cage (employes_id INT NOT NULL, cage_id INT NOT NULL, INDEX IDX_36F0E590F971F91F (employes_id), INDEX IDX_36F0E5905A70E5B7 (cage_id), PRIMARY KEY(employes_id, cage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employes_allee (employes_id INT NOT NULL, allee_id INT NOT NULL, INDEX IDX_9B1C7DA7F971F91F (employes_id), INDEX IDX_9B1C7DA78E6975D2 (allee_id), PRIMARY KEY(employes_id, allee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonctionnalites_cage (fonctionnalites_id INT NOT NULL, cage_id INT NOT NULL, INDEX IDX_999E03386F3D9006 (fonctionnalites_id), INDEX IDX_999E03385A70E5B7 (cage_id), PRIMARY KEY(fonctionnalites_id, cage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie_animal (maladie_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_3BC8CBD7B4B1C397 (maladie_id), INDEX IDX_3BC8CBD78E962C16 (animal_id), PRIMARY KEY(maladie_id, animal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employes_cage ADD CONSTRAINT FK_36F0E590F971F91F FOREIGN KEY (employes_id) REFERENCES employes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employes_cage ADD CONSTRAINT FK_36F0E5905A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employes_allee ADD CONSTRAINT FK_9B1C7DA7F971F91F FOREIGN KEY (employes_id) REFERENCES employes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employes_allee ADD CONSTRAINT FK_9B1C7DA78E6975D2 FOREIGN KEY (allee_id) REFERENCES allee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fonctionnalites_cage ADD CONSTRAINT FK_999E03386F3D9006 FOREIGN KEY (fonctionnalites_id) REFERENCES fonctionnalites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fonctionnalites_cage ADD CONSTRAINT FK_999E03385A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maladie_animal ADD CONSTRAINT FK_3BC8CBD7B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE maladie_animal ADD CONSTRAINT FK_3BC8CBD78E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F2D191E7A');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F87998E');
        $this->addSql('DROP INDEX IDX_6AAB231F2D191E7A ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F87998E ON animal');
        $this->addSql('ALTER TABLE animal ADD menu_id INT DEFAULT NULL, ADD cage_id INT NOT NULL, ADD adoptant_id INT DEFAULT NULL, DROP espece_id, DROP origine_id');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FCCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F5A70E5B7 FOREIGN KEY (cage_id) REFERENCES cage (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231FCCD7E912 ON animal (menu_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F5A70E5B7 ON animal (cage_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F8D8B49F9 ON animal (adoptant_id)');
        $this->addSql('ALTER TABLE cage ADD allee_id INT NOT NULL');
        $this->addSql('ALTER TABLE cage ADD CONSTRAINT FK_56A64E518E6975D2 FOREIGN KEY (allee_id) REFERENCES allee (id)');
        $this->addSql('CREATE INDEX IDX_56A64E518E6975D2 ON cage (allee_id)');
        $this->addSql('ALTER TABLE carnet_sante CHANGE animal_id animal_id INT NOT NULL');
        $this->addSql('ALTER TABLE maladie DROP FOREIGN KEY FK_ADC4024B8E962C16');
        $this->addSql('DROP INDEX IDX_ADC4024B8E962C16 ON maladie');
        $this->addSql('ALTER TABLE maladie DROP animal_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F8D8B49F9');
        $this->addSql('ALTER TABLE employes_cage DROP FOREIGN KEY FK_36F0E590F971F91F');
        $this->addSql('ALTER TABLE employes_cage DROP FOREIGN KEY FK_36F0E5905A70E5B7');
        $this->addSql('ALTER TABLE employes_allee DROP FOREIGN KEY FK_9B1C7DA7F971F91F');
        $this->addSql('ALTER TABLE employes_allee DROP FOREIGN KEY FK_9B1C7DA78E6975D2');
        $this->addSql('ALTER TABLE fonctionnalites_cage DROP FOREIGN KEY FK_999E03386F3D9006');
        $this->addSql('ALTER TABLE fonctionnalites_cage DROP FOREIGN KEY FK_999E03385A70E5B7');
        $this->addSql('ALTER TABLE maladie_animal DROP FOREIGN KEY FK_3BC8CBD7B4B1C397');
        $this->addSql('ALTER TABLE maladie_animal DROP FOREIGN KEY FK_3BC8CBD78E962C16');
        $this->addSql('DROP TABLE adoptant');
        $this->addSql('DROP TABLE employes_cage');
        $this->addSql('DROP TABLE employes_allee');
        $this->addSql('DROP TABLE fonctionnalites_cage');
        $this->addSql('DROP TABLE maladie_animal');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FCCD7E912');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F5A70E5B7');
        $this->addSql('DROP INDEX IDX_6AAB231FCCD7E912 ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F5A70E5B7 ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F8D8B49F9 ON animal');
        $this->addSql('ALTER TABLE animal ADD espece_id INT DEFAULT NULL, ADD origine_id INT DEFAULT NULL, DROP menu_id, DROP cage_id, DROP adoptant_id');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F2D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F87998E FOREIGN KEY (origine_id) REFERENCES origine (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F2D191E7A ON animal (espece_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F87998E ON animal (origine_id)');
        $this->addSql('ALTER TABLE cage DROP FOREIGN KEY FK_56A64E518E6975D2');
        $this->addSql('DROP INDEX IDX_56A64E518E6975D2 ON cage');
        $this->addSql('ALTER TABLE cage DROP allee_id');
        $this->addSql('ALTER TABLE carnet_sante CHANGE animal_id animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maladie ADD animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maladie ADD CONSTRAINT FK_ADC4024B8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('CREATE INDEX IDX_ADC4024B8E962C16 ON maladie (animal_id)');
    }
}
