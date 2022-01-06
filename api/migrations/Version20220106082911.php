<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106082911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "users" (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "wishes" (id SERIAL NOT NULL, user_id SERIAL NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DD0FA368A76ED395 ON "wishes" (user_id)');
        $this->addSql('ALTER TABLE "wishes" ADD CONSTRAINT FK_DD0FA368A76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "wishes" DROP CONSTRAINT FK_DD0FA368A76ED395');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE "wishes"');
    }
}
