<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727124143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Set up a first user';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO `users` SET `username`="johndoe", `password`="dy9mTWFQQ3V5bEE2d0I4Rw$0k2q7RVUjHTX0Mk4SLrKXEUITW7gDoElPMfeAn7+lPU", `roles`=\'["ROLE_ADMIN"]\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM `users` WHERE `username`="johndoe"');
    }
}
