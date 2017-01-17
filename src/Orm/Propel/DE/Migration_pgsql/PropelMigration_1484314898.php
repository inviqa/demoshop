<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1484314898.
 * Generated on 2017-01-13 13:41:38 by vagrant
 */
class PropelMigration_1484314898
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
        return array (
  'zed' => '
BEGIN;

CREATE SEQUENCE "spy_product_abstract_country_pk_seq";

CREATE TABLE "spy_product_abstract_country"
(
    "id" INTEGER NOT NULL,
    "product_id" INTEGER NOT NULL,
    "country_id" INTEGER NOT NULL,
    PRIMARY KEY ("id"),
    CONSTRAINT "spy_product_abstract_country-unique-product" UNIQUE ("product_id")
);

CREATE SEQUENCE "spy_product_abstract_country_lookup_pk_seq";

CREATE TABLE "spy_product_abstract_country_lookup"
(
    "id" INTEGER NOT NULL,
    "country_name" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id"),
    CONSTRAINT "spy_product_abstract_country_lookup-unique-name" UNIQUE ("country_name")
);

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(255);

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_9252df"
    FOREIGN KEY ("product_id")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_41de46"
    FOREIGN KEY ("country_id")
    REFERENCES "spy_product_abstract_country_lookup" ("id");

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

DROP TABLE IF EXISTS "spy_product_abstract_country" CASCADE;

DROP SEQUENCE "spy_product_abstract_country_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_country_lookup" CASCADE;

DROP SEQUENCE "spy_product_abstract_country_lookup_pk_seq";

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);

COMMIT;
',
);
    }

}