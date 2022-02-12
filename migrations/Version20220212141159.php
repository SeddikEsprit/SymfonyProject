<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212141159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bien_immoblier (num_immo INT NOT NULL, numprop INT DEFAULT NULL, satut VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, etat TINYINT(1) NOT NULL, date DATE NOT NULL, INDEX IDX_144A98E2F282DDBE (numprop), PRIMARY KEY(num_immo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (numprop INT NOT NULL, nom VARCHAR(255) NOT NULL, numtel INT NOT NULL, PRIMARY KEY(numprop)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien_immoblier ADD CONSTRAINT FK_144A98E2F282DDBE FOREIGN KEY (numprop) REFERENCES proprietaire (numprop)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien_immoblier DROP FOREIGN KEY FK_144A98E2F282DDBE');
        $this->addSql('DROP TABLE bien_immoblier');
        $this->addSql('DROP TABLE proprietaire');
    }
}
