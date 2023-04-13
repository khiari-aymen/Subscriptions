<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411233936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chatmessages CHANGE ChatSessionID ChatSessionID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE chatsessions CHANGE UserID UserID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE feedback CHANGE UserID UserID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE loyaltypointshistory CHANGE UserID UserID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE routes CHANGE Origin Origin INT UNSIGNED DEFAULT NULL, CHANGE Destination Destination INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE routestations CHANGE RouteID RouteID INT UNSIGNED DEFAULT NULL, CHANGE StationID StationID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE userpreferences CHANGE UserID UserID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE LoyaltyPoints LoyaltyPoints INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE usersubscriptions CHANGE UserID UserID INT UNSIGNED DEFAULT NULL, CHANGE SubscriptionID SubscriptionID INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicles CHANGE RouteID RouteID INT UNSIGNED DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE chatmessages CHANGE ChatSessionID ChatSessionID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE chatsessions CHANGE UserID UserID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE feedback CHANGE UserID UserID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE loyaltypointshistory CHANGE UserID UserID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE routes CHANGE Origin Origin INT UNSIGNED NOT NULL, CHANGE Destination Destination INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE routestations CHANGE RouteID RouteID INT UNSIGNED NOT NULL, CHANGE StationID StationID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE userpreferences CHANGE UserID UserID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE LoyaltyPoints LoyaltyPoints INT UNSIGNED DEFAULT 0');
        $this->addSql('ALTER TABLE usersubscriptions CHANGE UserID UserID INT UNSIGNED NOT NULL, CHANGE SubscriptionID SubscriptionID INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE vehicles CHANGE RouteID RouteID INT UNSIGNED NOT NULL');
    }
}
