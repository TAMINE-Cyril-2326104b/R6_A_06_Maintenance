<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260209081303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartient_a (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE appartient_a_epreuve (appartient_a_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_AEBAC55A15BE898B (appartient_a_id), INDEX IDX_AEBAC55AAB990336 (epreuve_id), PRIMARY KEY (appartient_a_id, epreuve_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE appartient_a_sport (appartient_a_id INT NOT NULL, sport_id INT NOT NULL, INDEX IDX_2878FD4815BE898B (appartient_a_id), INDEX IDX_2878FD48AC78BCF8 (sport_id), PRIMARY KEY (appartient_a_id, sport_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE championnat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, sport_id INT NOT NULL, INDEX IDX_AB8C220AC78BCF8 (sport_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, championnat_id INT NOT NULL, INDEX IDX_B50A2CB1627A0DA8 (championnat_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE concerne (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE concerne_epreuve (concerne_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_1659420E6406FEF1 (concerne_id), INDEX IDX_1659420EAB990336 (epreuve_id), PRIMARY KEY (concerne_id, epreuve_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE concerne_competition (concerne_id INT NOT NULL, competition_id INT NOT NULL, INDEX IDX_50C82C936406FEF1 (concerne_id), INDEX IDX_50C82C937B39D312 (competition_id), PRIMARY KEY (concerne_id, competition_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE epreuve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE appartient_a_epreuve ADD CONSTRAINT FK_AEBAC55A15BE898B FOREIGN KEY (appartient_a_id) REFERENCES appartient_a (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartient_a_epreuve ADD CONSTRAINT FK_AEBAC55AAB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartient_a_sport ADD CONSTRAINT FK_2878FD4815BE898B FOREIGN KEY (appartient_a_id) REFERENCES appartient_a (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appartient_a_sport ADD CONSTRAINT FK_2878FD48AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championnat ADD CONSTRAINT FK_AB8C220AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id)');
        $this->addSql('ALTER TABLE concerne_epreuve ADD CONSTRAINT FK_1659420E6406FEF1 FOREIGN KEY (concerne_id) REFERENCES concerne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concerne_epreuve ADD CONSTRAINT FK_1659420EAB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concerne_competition ADD CONSTRAINT FK_50C82C936406FEF1 FOREIGN KEY (concerne_id) REFERENCES concerne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concerne_competition ADD CONSTRAINT FK_50C82C937B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartient_a_epreuve DROP FOREIGN KEY FK_AEBAC55A15BE898B');
        $this->addSql('ALTER TABLE appartient_a_epreuve DROP FOREIGN KEY FK_AEBAC55AAB990336');
        $this->addSql('ALTER TABLE appartient_a_sport DROP FOREIGN KEY FK_2878FD4815BE898B');
        $this->addSql('ALTER TABLE appartient_a_sport DROP FOREIGN KEY FK_2878FD48AC78BCF8');
        $this->addSql('ALTER TABLE championnat DROP FOREIGN KEY FK_AB8C220AC78BCF8');
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1627A0DA8');
        $this->addSql('ALTER TABLE concerne_epreuve DROP FOREIGN KEY FK_1659420E6406FEF1');
        $this->addSql('ALTER TABLE concerne_epreuve DROP FOREIGN KEY FK_1659420EAB990336');
        $this->addSql('ALTER TABLE concerne_competition DROP FOREIGN KEY FK_50C82C936406FEF1');
        $this->addSql('ALTER TABLE concerne_competition DROP FOREIGN KEY FK_50C82C937B39D312');
        $this->addSql('DROP TABLE appartient_a');
        $this->addSql('DROP TABLE appartient_a_epreuve');
        $this->addSql('DROP TABLE appartient_a_sport');
        $this->addSql('DROP TABLE championnat');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE concerne');
        $this->addSql('DROP TABLE concerne_epreuve');
        $this->addSql('DROP TABLE concerne_competition');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
