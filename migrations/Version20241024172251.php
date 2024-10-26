<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241024172251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, info VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE citation (id INT AUTO_INCREMENT NOT NULL, contenu_original VARCHAR(300) NOT NULL, contenu_traduit VARCHAR(300) NOT NULL, auteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE citations (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(255) DEFAULT NULL, contenu1 VARCHAR(300) NOT NULL, contenu_traduit VARCHAR(350) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_post (id INT AUTO_INCREMENT NOT NULL, c_post_id INT DEFAULT NULL, auteur_c_id INT DEFAULT NULL, contenu_c VARCHAR(300) NOT NULL, follow INT NOT NULL, INDEX IDX_B372A8DFD90494F7 (c_post_id), INDEX IDX_B372A8DF2D93C55D (auteur_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coran (id INT AUTO_INCREMENT NOT NULL, souarte VARCHAR(255) NOT NULL, numero INT NOT NULL, numero_page INT NOT NULL, langue VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doua (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu_ar VARCHAR(255) NOT NULL, contenu_fr VARCHAR(255) NOT NULL, signification VARCHAR(255) NOT NULL, date_ajout DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_event DATE NOT NULL, lieu VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, date_ajout DATE NOT NULL, passee TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire_priere (id INT AUTO_INCREMENT NOT NULL, priere VARCHAR(255) NOT NULL, heure TIME NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, region VARCHAR(255) NOT NULL, iso3166 VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, numero_page INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_AC634F9960BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moderateur (id INT AUTO_INCREMENT NOT NULL, email_id INT NOT NULL, autorisation TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6DDC3554A832C1C9 (email_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE muezzin (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, mosque VARCHAR(255) NOT NULL, audio VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_3EE1A7DB67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, contenu VARCHAR(400) NOT NULL, date DATE NOT NULL, INDEX IDX_5A8A6C8D60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qran_audio (id INT AUTO_INCREMENT NOT NULL, qari_id INT DEFAULT NULL, sourate VARCHAR(255) NOT NULL, audio VARCHAR(255) DEFAULT NULL, numero INT NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C01B81B448E7CF1A (qari_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quari (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, autorisation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_post ADD CONSTRAINT FK_B372A8DFD90494F7 FOREIGN KEY (c_post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE commentaire_post ADD CONSTRAINT FK_B372A8DF2D93C55D FOREIGN KEY (auteur_c_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id)');
        $this->addSql('ALTER TABLE moderateur ADD CONSTRAINT FK_6DDC3554A832C1C9 FOREIGN KEY (email_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE muezzin ADD CONSTRAINT FK_3EE1A7DB67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE qran_audio ADD CONSTRAINT FK_C01B81B448E7CF1A FOREIGN KEY (qari_id) REFERENCES quari (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire_post DROP FOREIGN KEY FK_B372A8DFD90494F7');
        $this->addSql('ALTER TABLE commentaire_post DROP FOREIGN KEY FK_B372A8DF2D93C55D');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE moderateur DROP FOREIGN KEY FK_6DDC3554A832C1C9');
        $this->addSql('ALTER TABLE muezzin DROP FOREIGN KEY FK_3EE1A7DB67B3B43D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D60BB6FE6');
        $this->addSql('ALTER TABLE qran_audio DROP FOREIGN KEY FK_C01B81B448E7CF1A');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE citation');
        $this->addSql('DROP TABLE citations');
        $this->addSql('DROP TABLE commentaire_post');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE coran');
        $this->addSql('DROP TABLE doua');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE horaire_priere');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE moderateur');
        $this->addSql('DROP TABLE muezzin');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE qran_audio');
        $this->addSql('DROP TABLE quari');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
