<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220501215722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY movies_contr');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY genre_constr');
        $this->addSql('ALTER TABLE movie_genre CHANGE id_movie id_movie INT DEFAULT NULL, CHANGE id_genre id_genre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD122964F3DBB35F FOREIGN KEY (id_movie) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229646DD572C8 FOREIGN KEY (id_genre) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE admin');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD122964F3DBB35F');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229646DD572C8');
        $this->addSql('ALTER TABLE movie_genre CHANGE id_movie id_movie INT NOT NULL, CHANGE id_genre id_genre INT NOT NULL');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT movies_contr FOREIGN KEY (id_movie) REFERENCES movies (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT genre_constr FOREIGN KEY (id_genre) REFERENCES genre (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
