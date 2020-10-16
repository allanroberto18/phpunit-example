<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;
use phpDocumentor\Reflection\Types\Float_;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190806235350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create horse database';
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('horse');
        $table->addColumn('id', Type::INTEGER, [ 'autoincrement' => true, 'notnull' => true ]);
        $table->addColumn('speed', Type::FLOAT, []);
        $table->addColumn('endurance', Type::FLOAT, []);
        $table->addColumn('strength', Type::FLOAT, []);

        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema) : void
    {
        $schema->dropTable('horse');
    }
}
