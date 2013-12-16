<?php

class m131205_105222_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`checklist_completed_id` int(10) unsigned NOT NULL,
	`ready_to_go_home_id` int(10) unsigned NOT NULL,
	`district_nurse_contacted_id` int(10) unsigned NOT NULL,
	`comments` text COLLATE utf8_bin,
	`following_day_assessment_id` int(10) unsigned NOT NULL,
	`follow_up_id` int(10) unsigned NOT NULL,
	`information_leaflet_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcidischargenote_details_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcidischargenote_details_cui_fk` (`created_user_id`),
	KEY `acv_et_ophcidischargenote_details_ev_fk` (`event_id`),
	KEY `acv_et_ophcidischargenote_details_checklist_completed_fk` (`checklist_completed_id`),
	KEY `acv_et_ophcidischargenote_details_ready_to_go_home_fk` (`ready_to_go_home_id`),
	KEY `acv_et_ophcidischargenote_details_district_nurse_contacted_fk` (`district_nurse_contacted_id`),
	KEY `acv_et_ophcidischargenote_details_following_day_assessment_fk` (`following_day_assessment_id`),
	KEY `acv_et_ophcidischargenote_details_follow_up_fk` (`follow_up_id`),
	KEY `acv_et_ophcidischargenote_details_information_leaflet_fk` (`information_leaflet_id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_checklist_completed_fk` FOREIGN KEY (`checklist_completed_id`) REFERENCES `et_ophcidischargenote_details_checklist_completed` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_ready_to_go_home_fk` FOREIGN KEY (`ready_to_go_home_id`) REFERENCES `et_ophcidischargenote_details_ready_to_go_home` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_district_nurse_contacted_fk` FOREIGN KEY (`district_nurse_contacted_id`) REFERENCES `et_ophcidischargenote_details_district_nurse_contacted` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_following_day_assessment_fk` FOREIGN KEY (`following_day_assessment_id`) REFERENCES `et_ophcidischargenote_details_following_day_assessment` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_follow_up_fk` FOREIGN KEY (`follow_up_id`) REFERENCES `et_ophcidischargenote_details_follow_up` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_information_leaflet_fk` FOREIGN KEY (`information_leaflet_id`) REFERENCES `et_ophcidischargenote_details_information_leaflet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_version');

		$this->createIndex('et_ophcidischargenote_details_aid_fk','et_ophcidischargenote_details_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_aid_fk','et_ophcidischargenote_details_version','id','et_ophcidischargenote_details','id');

		$this->addColumn('et_ophcidischargenote_details_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_checklist_completed_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcidischargenote_details_checklist_completed_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcidischargenote_details_checklist_completed_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_checklist_completed_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_checklist_completed_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_checklist_completed_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_checklist_completed_version');

		$this->createIndex('et_ophcidischargenote_details_checklist_completed_aid_fk','et_ophcidischargenote_details_checklist_completed_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_checklist_completed_aid_fk','et_ophcidischargenote_details_checklist_completed_version','id','et_ophcidischargenote_details_checklist_completed','id');

		$this->addColumn('et_ophcidischargenote_details_checklist_completed_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_checklist_completed_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_checklist_completed_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_checklist_completed_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_district_nurse_contacted_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phcidischargenote_details_district_nurse_contacted_lmui_fk` (`last_modified_user_id`),
	KEY `acv_phcidischargenote_details_district_nurse_contacted_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phcidischargenote_details_district_nurse_contacted_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phcidischargenote_details_district_nurse_contacted_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_district_nurse_contacted_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_district_nurse_contacted_version');

		$this->createIndex('et_ophcidischargenote_details_district_nurse_contacted_aid_fk','et_ophcidischargenote_details_district_nurse_contacted_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_district_nurse_contacted_aid_fk','et_ophcidischargenote_details_district_nurse_contacted_version','id','et_ophcidischargenote_details_district_nurse_contacted','id');

		$this->addColumn('et_ophcidischargenote_details_district_nurse_contacted_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_district_nurse_contacted_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_district_nurse_contacted_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_district_nurse_contacted_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_follow_up_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcidischargenote_details_follow_up_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcidischargenote_details_follow_up_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_follow_up_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_follow_up_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_follow_up_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_follow_up_version');

		$this->createIndex('et_ophcidischargenote_details_follow_up_aid_fk','et_ophcidischargenote_details_follow_up_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_follow_up_aid_fk','et_ophcidischargenote_details_follow_up_version','id','et_ophcidischargenote_details_follow_up','id');

		$this->addColumn('et_ophcidischargenote_details_follow_up_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_follow_up_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_follow_up_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_follow_up_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_following_day_assessment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_phcidischargenote_details_following_day_assessment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_phcidischargenote_details_following_day_assessment_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_phcidischargenote_details_following_day_assessment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phcidischargenote_details_following_day_assessment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_following_day_assessment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_following_day_assessment_version');

		$this->createIndex('et_ophcidischargenote_details_following_day_assessment_aid_fk','et_ophcidischargenote_details_following_day_assessment_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_following_day_assessment_aid_fk','et_ophcidischargenote_details_following_day_assessment_version','id','et_ophcidischargenote_details_following_day_assessment','id');

		$this->addColumn('et_ophcidischargenote_details_following_day_assessment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_following_day_assessment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_following_day_assessment_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_following_day_assessment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_information_leaflet_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcidischargenote_details_information_leaflet_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcidischargenote_details_information_leaflet_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_information_leaflet_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_information_leaflet_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_information_leaflet_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_information_leaflet_version');

		$this->createIndex('et_ophcidischargenote_details_information_leaflet_aid_fk','et_ophcidischargenote_details_information_leaflet_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_information_leaflet_aid_fk','et_ophcidischargenote_details_information_leaflet_version','id','et_ophcidischargenote_details_information_leaflet','id');

		$this->addColumn('et_ophcidischargenote_details_information_leaflet_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_information_leaflet_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_information_leaflet_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_information_leaflet_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophcidischargenote_details_ready_to_go_home_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophcidischargenote_details_ready_to_go_home_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophcidischargenote_details_ready_to_go_home_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_ready_to_go_home_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophcidischargenote_details_ready_to_go_home_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcidischargenote_details_ready_to_go_home_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcidischargenote_details_ready_to_go_home_version');

		$this->createIndex('et_ophcidischargenote_details_ready_to_go_home_aid_fk','et_ophcidischargenote_details_ready_to_go_home_version','id');
		$this->addForeignKey('et_ophcidischargenote_details_ready_to_go_home_aid_fk','et_ophcidischargenote_details_ready_to_go_home_version','id','et_ophcidischargenote_details_ready_to_go_home','id');

		$this->addColumn('et_ophcidischargenote_details_ready_to_go_home_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcidischargenote_details_ready_to_go_home_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcidischargenote_details_ready_to_go_home_version','version_id');
		$this->alterColumn('et_ophcidischargenote_details_ready_to_go_home_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophcidischargenote_details','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_checklist_completed','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_checklist_completed_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_district_nurse_contacted','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_district_nurse_contacted_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_follow_up','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_follow_up_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_following_day_assessment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_following_day_assessment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_information_leaflet','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_information_leaflet_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_ready_to_go_home','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcidischargenote_details_ready_to_go_home_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcidischargenote_details','deleted');
		$this->dropColumn('et_ophcidischargenote_details_checklist_completed','deleted');
		$this->dropColumn('et_ophcidischargenote_details_district_nurse_contacted','deleted');
		$this->dropColumn('et_ophcidischargenote_details_follow_up','deleted');
		$this->dropColumn('et_ophcidischargenote_details_following_day_assessment','deleted');
		$this->dropColumn('et_ophcidischargenote_details_information_leaflet','deleted');
		$this->dropColumn('et_ophcidischargenote_details_ready_to_go_home','deleted');

		$this->dropTable('et_ophcidischargenote_details_version');
		$this->dropTable('et_ophcidischargenote_details_checklist_completed_version');
		$this->dropTable('et_ophcidischargenote_details_district_nurse_contacted_version');
		$this->dropTable('et_ophcidischargenote_details_follow_up_version');
		$this->dropTable('et_ophcidischargenote_details_following_day_assessment_version');
		$this->dropTable('et_ophcidischargenote_details_information_leaflet_version');
		$this->dropTable('et_ophcidischargenote_details_ready_to_go_home_version');
	}
}
