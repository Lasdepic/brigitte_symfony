<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016082246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adoptant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD adoptant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F8D8B49F9 ON animal (adoptant_id)');
        $this->addSql('ALTER TABLE espece ADD famille_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE espece ADD CONSTRAINT FK_1A2A1B197A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('CREATE INDEX IDX_1A2A1B197A77B84 ON espece (famille_id)');
        $this->addSql('ALTER TABLE famille ADD ordre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F2139291498C FOREIGN KEY (ordre_id) REFERENCES ordre (id)');
        $this->addSql('CREATE INDEX IDX_2473F2139291498C ON famille (ordre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F8D8B49F9');
        $this->addSql('DROP TABLE adoptant');
        $this->addSql('DROP INDEX IDX_6AAB231F8D8B49F9 ON animal');
        $this->addSql('ALTER TABLE animal DROP adoptant_id');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F2139291498C');
        $this->addSql('DROP INDEX IDX_2473F2139291498C ON famille');
        $this->addSql('ALTER TABLE famille DROP ordre_id');
        $this->addSql('ALTER TABLE espece DROP FOREIGN KEY FK_1A2A1B197A77B84');
        $this->addSql('DROP INDEX IDX_1A2A1B197A77B84 ON espece');
        $this->addSql('ALTER TABLE espece DROP famille_id');
    }
}
