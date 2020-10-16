<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190807072157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'create horse race detail table';
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('horse_race_detail');
        $table->addColumn('id', Type::INTEGER, [ 'autoincrement' => true, 'notnull' => true ]);
        $table->addColumn('race_id', Type::INTEGER, []);
        $table->addColumn('horse_id', Type::INTEGER, []);
        $table->addColumn('speed_calculated', Type::FLOAT, []);
        $table->addColumn('endurance_calculated', Type::FLOAT, []);
        $table->addColumn('strength_calculated', Type::FLOAT, []);
        $table->addColumn('time_calculated', Type::FLOAT, []);

        $table->setPrimaryKey(['id']);

        $fkRace = $schema->getTable('race');
        $table->addForeignKeyConstraint($fkRace, ['race_id'], ['id'], [ 'cascade'=> 'all' ], 'fk_race_detail');

        $fkHorse = $schema->getTable('horse');
        $table->addForeignKeyConstraint($fkHorse, ['horse_id'], ['id'], [ 'cascade'=> 'all' ], 'fk_horse_detail');
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    public function down(Schema $schema) : void
    {
        $table = $schema->getTable('horse_race_detail');
        $table->removeForeignKey('fk_race_detail');
        $table->removeForeignKey('fk_horse_detail');

        $schema->dropTable('horse_race_detail');
    }
}
