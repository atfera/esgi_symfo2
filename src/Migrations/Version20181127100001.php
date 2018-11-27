<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181127100001 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE users_account_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE assoc_issue_commentaire (id INT NOT NULL, user_id_id INT NOT NULL, issue_id_id INT NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, date_commentaire TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A35AD079D86650F ON assoc_issue_commentaire (user_id_id)');
        $this->addSql('CREATE INDEX IDX_5A35AD07EDCEF704 ON assoc_issue_commentaire (issue_id_id)');
        $this->addSql('CREATE TABLE assoc_issue_notation (id INT NOT NULL, user_id_id INT NOT NULL, issue_id_id INT NOT NULL, note INT DEFAULT NULL, date_notation TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C644AB9B9D86650F ON assoc_issue_notation (user_id_id)');
        $this->addSql('CREATE INDEX IDX_C644AB9BEDCEF704 ON assoc_issue_notation (issue_id_id)');
        $this->addSql('CREATE TABLE issues (id INT NOT NULL, user_id_id INT NOT NULL, state_id_id INT DEFAULT NULL, issue_type_id_id INT DEFAULT NULL, nom_issue VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DA7D7F839D86650F ON issues (user_id_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F83DD71A5B ON issues (state_id_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F83E70062FC ON issues (issue_type_id_id)');
        $this->addSql('CREATE TABLE type_etat (id INT NOT NULL, nom_type_etat VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_issue (id INT NOT NULL, nom_type_issue VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE users_account (id INT NOT NULL, nom_user VARCHAR(255) DEFAULT NULL, prenom_user VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE assoc_issue_commentaire ADD CONSTRAINT FK_5A35AD079D86650F FOREIGN KEY (user_id_id) REFERENCES users_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assoc_issue_commentaire ADD CONSTRAINT FK_5A35AD07EDCEF704 FOREIGN KEY (issue_id_id) REFERENCES issues (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assoc_issue_notation ADD CONSTRAINT FK_C644AB9B9D86650F FOREIGN KEY (user_id_id) REFERENCES users_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE assoc_issue_notation ADD CONSTRAINT FK_C644AB9BEDCEF704 FOREIGN KEY (issue_id_id) REFERENCES issues (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F839D86650F FOREIGN KEY (user_id_id) REFERENCES users_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83DD71A5B FOREIGN KEY (state_id_id) REFERENCES type_etat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83E70062FC FOREIGN KEY (issue_type_id_id) REFERENCES type_issue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE assoc_issue_commentaire DROP CONSTRAINT FK_5A35AD07EDCEF704');
        $this->addSql('ALTER TABLE assoc_issue_notation DROP CONSTRAINT FK_C644AB9BEDCEF704');
        $this->addSql('ALTER TABLE issues DROP CONSTRAINT FK_DA7D7F83DD71A5B');
        $this->addSql('ALTER TABLE issues DROP CONSTRAINT FK_DA7D7F83E70062FC');
        $this->addSql('ALTER TABLE assoc_issue_commentaire DROP CONSTRAINT FK_5A35AD079D86650F');
        $this->addSql('ALTER TABLE assoc_issue_notation DROP CONSTRAINT FK_C644AB9B9D86650F');
        $this->addSql('ALTER TABLE issues DROP CONSTRAINT FK_DA7D7F839D86650F');
        $this->addSql('DROP SEQUENCE assoc_issue_commentaire_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE assoc_issue_notation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE issues_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_etat_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_issue_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_account_id_seq CASCADE');
        $this->addSql('DROP TABLE assoc_issue_commentaire');
        $this->addSql('DROP TABLE assoc_issue_notation');
        $this->addSql('DROP TABLE issues');
        $this->addSql('DROP TABLE type_etat');
        $this->addSql('DROP TABLE type_issue');
        $this->addSql('DROP TABLE users_account');
    }
}
