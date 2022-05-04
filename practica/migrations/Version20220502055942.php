<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502055942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre CHANGE active active INT NOT NULL');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD122964F3DBB35F');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229646DD572C8');
        $this->addSql('DROP INDEX fk_fd122964f3dbb35f ON movie_genre');
        $this->addSql('CREATE INDEX movies_contr ON movie_genre (id_movie)');
        $this->addSql('DROP INDEX fk_fd1229646dd572c8 ON movie_genre');
        $this->addSql('CREATE INDEX genre_constr ON movie_genre (id_genre)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD122964F3DBB35F FOREIGN KEY (id_movie) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229646DD572C8 FOREIGN KEY (id_genre) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movies ADD release_year INT NOT NULL, ADD running_time VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD short_summary VARCHAR(255) NOT NULL, ADD quality INT NOT NULL, ADD age_restiction INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE genre CHANGE active active INT DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD122964F3DBB35F');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229646DD572C8');
        $this->addSql('DROP INDEX genre_constr ON movie_genre');
        $this->addSql('CREATE INDEX FK_FD1229646DD572C8 ON movie_genre (id_genre)');
        $this->addSql('DROP INDEX movies_contr ON movie_genre');
        $this->addSql('CREATE INDEX FK_FD122964F3DBB35F ON movie_genre (id_movie)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD122964F3DBB35F FOREIGN KEY (id_movie) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229646DD572C8 FOREIGN KEY (id_genre) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movies DROP release_year, DROP running_time, DROP country, DROP short_summary, DROP quality, DROP age_restiction');
    }
}
