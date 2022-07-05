<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705054412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__bicycle AS SELECT id, name, cost, wheel_diameter, brake_type, frame_material FROM bicycle');
        $this->addSql('DROP TABLE bicycle');
        $this->addSql('CREATE TABLE bicycle (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cost NUMERIC(10, 2) NOT NULL, wheel_diameter INTEGER NOT NULL, brake_type INTEGER NOT NULL, frame_material INTEGER NOT NULL)');
        $this->addSql('INSERT INTO bicycle (id, name, cost, wheel_diameter, brake_type, frame_material) SELECT id, name, cost, wheel_diameter, brake_type, frame_material FROM __temp__bicycle');
        $this->addSql('DROP TABLE __temp__bicycle');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bicycle ADD COLUMN frame_type INTEGER NOT NULL');
    }
}
