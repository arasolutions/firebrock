<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191108215444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fir_product_code_promotion ADD stripe_plan_tarifaire_id VARCHAR(256) DEFAULT NULL');
        $this->addSql('ALTER TABLE fir_product ADD stripe_plan_tarifaire_id VARCHAR(256) DEFAULT NULL');
        $this->addSql('DROP INDEX site_domain_idx ON fir_site');
        $this->addSql('CREATE INDEX site_domain_idx ON fir_site (domain)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fir_product DROP stripe_plan_tarifaire_id');
        $this->addSql('ALTER TABLE fir_product_code_promotion DROP stripe_plan_tarifaire_id');
        $this->addSql('DROP INDEX site_domain_idx ON fir_site');
        $this->addSql('CREATE INDEX site_domain_idx ON fir_site (domain)');
    }
}
