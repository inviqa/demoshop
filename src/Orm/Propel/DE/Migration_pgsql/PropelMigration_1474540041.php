<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1474540041.
 * Generated on 2016-09-22 10:27:21 by vagrant
 */
class PropelMigration_1474540041
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
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
CREATE SEQUENCE "pyz_lottery_pk_seq";

CREATE TABLE "pyz_lottery"
(
    "id_lottery" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "first_name" VARCHAR(128) NOT NULL,
    "last_name" VARCHAR(128) NOT NULL,
    "email" VARCHAR(128) NOT NULL,
    "status" VARCHAR(64),
    "description" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_lottery"),
    CONSTRAINT "pyz_lottery-email" UNIQUE ("email")
);

ALTER TABLE "pyz_lottery" ADD CONSTRAINT "pyz_lottery-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");
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
DROP TABLE IF EXISTS "pyz_lottery" CASCADE;

DROP SEQUENCE "pyz_lottery_pk_seq";
',
);
    }

}