<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1484743162.
 * Generated on 2017-01-18 12:39:22 by vagrant
 */
class PropelMigration_1484743162
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

DROP TABLE IF EXISTS "spy_product_abstract_country" CASCADE;

CREATE SEQUENCE "pyz_product_abstract_country_pk_seq";

CREATE TABLE "pyz_product_abstract_country"
(
    "id_product_abstract_country" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_country" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_abstract_country"),
    CONSTRAINT "pyz_product_abstract_country-unique-product" UNIQUE ("fk_product_abstract")
);

ALTER TABLE "pyz_product_abstract_country" ADD CONSTRAINT "pyz_product_abstract_country_fk_371a4f"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "pyz_product_abstract_country" ADD CONSTRAINT "pyz_product_abstract_country_fk_28d90b"
    FOREIGN KEY ("fk_country")
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

DROP TABLE IF EXISTS "pyz_product_abstract_country" CASCADE;

DROP SEQUENCE "pyz_product_abstract_country_pk_seq";

CREATE TABLE "spy_product_abstract_country"
(
    "id" INTEGER NOT NULL,
    "product_id" INTEGER NOT NULL,
    "country_id" INTEGER NOT NULL,
    PRIMARY KEY ("id"),
    CONSTRAINT "spy_product_abstract_country-unique-product" UNIQUE ("product_id")
);

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_9252df"
    FOREIGN KEY ("product_id")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract_country" ADD CONSTRAINT "spy_product_abstract_country_fk_de8863"
    FOREIGN KEY ("country_id")
    REFERENCES "spy_country" ("id_country");

COMMIT;
',
);
    }

}