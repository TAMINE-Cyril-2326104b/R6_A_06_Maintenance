<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260209082735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartient_a (id INT AUTO_INCREMENT NOT NULL, sport_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_8CBD3017AC78BCF8 (sport_id), INDEX IDX_8CBD3017AB990336 (epreuve_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE concerne (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_37FF4F7B7B39D312 (competition_id), INDEX IDX_37FF4F7BAB990336 (epreuve_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE appartient_a ADD CONSTRAINT FK_8CBD3017AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE appartient_a ADD CONSTRAINT FK_8CBD3017AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id)');
        $this->addSql('ALTER TABLE concerne ADD CONSTRAINT FK_37FF4F7B7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE concerne ADD CONSTRAINT FK_37FF4F7BAB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartient_a DROP FOREIGN KEY FK_8CBD3017AC78BCF8');
        $this->addSql('ALTER TABLE appartient_a DROP FOREIGN KEY FK_8CBD3017AB990336');
        $this->addSql('ALTER TABLE concerne DROP FOREIGN KEY FK_37FF4F7B7B39D312');
        $this->addSql('ALTER TABLE concerne DROP FOREIGN KEY FK_37FF4F7BAB990336');
        $this->addSql('DROP TABLE appartient_a');
        $this->addSql('DROP TABLE concerne');
    }
}
