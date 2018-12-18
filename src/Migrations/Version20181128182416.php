<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128182416 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE feature ADD created_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE feature ADD updated_by INT DEFAULT NULL');
        $this->addSql('ALTER TABLE feature ADD created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE feature ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE feature ADD CONSTRAINT FK_1FD77566DE12AB56 FOREIGN KEY (created_by) REFERENCES user_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE feature ADD CONSTRAINT FK_1FD7756616FE72E1 FOREIGN KEY (updated_by) REFERENCES user_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1FD77566DE12AB56 ON feature (created_by)');
        $this->addSql('CREATE INDEX IDX_1FD7756616FE72E1 ON feature (updated_by)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE feature DROP CONSTRAINT FK_1FD77566DE12AB56');
        $this->addSql('ALTER TABLE feature DROP CONSTRAINT FK_1FD7756616FE72E1');
        $this->addSql('DROP INDEX IDX_1FD77566DE12AB56');
        $this->addSql('DROP INDEX IDX_1FD7756616FE72E1');
        $this->addSql('ALTER TABLE feature DROP created_by');
        $this->addSql('ALTER TABLE feature DROP updated_by');
        $this->addSql('ALTER TABLE feature DROP created_at');
        $this->addSql('ALTER TABLE feature DROP updated_at');
    }
}
