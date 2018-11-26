<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126183716 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE assoc_issue_commentaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE assoc_issue_notation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE issues_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_etat_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_issue_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE assoc_issue_commentaire (id INT NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, date_commentaire TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE assoc_issue_notation (id INT NOT NULL, note INT DEFAULT NULL, date_notation TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE issues (id INT NOT NULL, nom_issue VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_etat (id INT NOT NULL, nom_type_etat VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_issue (id INT NOT NULL, nom_type_issue VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, nom_user VARCHAR(255) DEFAULT NULL, prenom_user VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE assoc_issue_commentaire_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE assoc_issue_notation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE issues_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_etat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_issue_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE assoc_issue_commentaire');
        $this->addSql('DROP TABLE assoc_issue_notation');
        $this->addSql('DROP TABLE issues');
        $this->addSql('DROP TABLE type_etat');
        $this->addSql('DROP TABLE type_issue');
        $this->addSql('DROP TABLE users');
    }
}
