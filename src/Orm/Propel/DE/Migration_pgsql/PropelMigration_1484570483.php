<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1484570483.
 * Generated on 2017-01-16 12:41:23 by vagrant
 */
class PropelMigration_1484570483
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        // ALTER TABLE "spy_product_abstract_country" DROP CONSTRAINT "spy_product_abstract_country_fk_41de46";

        return array (
  'zed' => '
BEGIN;

DROP TABLE IF EXISTS "spy_product_abstract_country_lookup" CASCADE;

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_de8863"
    FOREIGN KEY ("country_id")
    REFERENCES "spy_country" ("id_country");

COMMIT;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'zed' => '
BEGIN;

CREATE TABLE "spy_product_abstract_country_lookup"
(
    "id" INTEGER NOT NULL,
    "country_name" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id"),
    CONSTRAINT "spy_product_abstract_country_lookup-unique-name" UNIQUE ("country_name")
);

ALTER TABLE "spy_product_abstract_country" DROP CONSTRAINT "spy_product_abstract_country_fk_de8863";

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_41de46"
    FOREIGN KEY ("country_id")
    REFERENCES "spy_product_abstract_country_lookup" ("id");

COMMIT;
',
);
    }

}
