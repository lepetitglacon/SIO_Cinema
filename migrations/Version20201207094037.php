<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201207094037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cinema (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, nombre_salles INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, synopsys LONGTEXT NOT NULL, duree INT NOT NULL, realisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, salle_id INT NOT NULL, INDEX IDX_741D53CDDC304035 (salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projection (id INT AUTO_INCREMENT NOT NULL, film_id INT NOT NULL, jour DATE NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_8004C826567F5183 (film_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, cinema_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nombre_places INT NOT NULL, INDEX IDX_4E977E5CB4CB84B6 (cinema_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, projection_id INT NOT NULL, heure TIME NOT NULL, INDEX IDX_DF7DFD0E5ECF66BD (projection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, seance_id INT NOT NULL, nom_acheteur VARCHAR(255) NOT NULL, moyen_payment VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, reserve TINYINT(1) NOT NULL, INDEX IDX_97A0ADA3E3797A94 (seance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, localisation_id INT NOT NULL, nom VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_43C3D9C3C68BE09C (localisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE projection ADD CONSTRAINT FK_8004C826567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CB4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinema (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E5ECF66BD FOREIGN KEY (projection_id) REFERENCES projection (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CB4CB84B6');
        $this->addSql('ALTER TABLE projection DROP FOREIGN KEY FK_8004C826567F5183');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3C68BE09C');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E5ECF66BD');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDDC304035');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3E3797A94');
        $this->addSql('DROP TABLE cinema');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE projection');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE ville');
    }
}
