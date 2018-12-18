<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128175137 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE comment_feature (comment_id INT NOT NULL, feature_id INT NOT NULL, PRIMARY KEY(comment_id, feature_id))');
        $this->addSql('CREATE INDEX IDX_ECA41776F8697D13 ON comment_feature (comment_id)');
        $this->addSql('CREATE INDEX IDX_ECA4177660E4B879 ON comment_feature (feature_id)');
        $this->addSql('ALTER TABLE comment_feature ADD CONSTRAINT FK_ECA41776F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment_feature ADD CONSTRAINT FK_ECA4177660E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE comment_feature');
    }
}
