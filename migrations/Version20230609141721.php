<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230609141721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temoignage CHANGE note note VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE voiture ADD image_id INT DEFAULT NULL, DROP photo');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810F3DA5256D ON voiture (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE temoignage CHANGE note note DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F3DA5256D');
        $this->addSql('DROP INDEX IDX_E9E2810F3DA5256D ON voiture');
        $this->addSql('ALTER TABLE voiture ADD photo VARCHAR(255) NOT NULL, DROP image_id');
    }
}
