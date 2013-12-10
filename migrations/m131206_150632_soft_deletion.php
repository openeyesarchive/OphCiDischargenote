<?php

class m131206_150632_soft_deletion extends CDbMigration
{
	public function up()
	{
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
		$this->dropColumn('et_ophcidischargenote_details_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_checklist_completed','deleted');
		$this->dropColumn('et_ophcidischargenote_details_checklist_completed_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_district_nurse_contacted','deleted');
		$this->dropColumn('et_ophcidischargenote_details_district_nurse_contacted_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_follow_up','deleted');
		$this->dropColumn('et_ophcidischargenote_details_follow_up_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_following_day_assessment','deleted');
		$this->dropColumn('et_ophcidischargenote_details_following_day_assessment_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_information_leaflet','deleted');
		$this->dropColumn('et_ophcidischargenote_details_information_leaflet_version','deleted');
		$this->dropColumn('et_ophcidischargenote_details_ready_to_go_home','deleted');
		$this->dropColumn('et_ophcidischargenote_details_ready_to_go_home_version','deleted');
	}
}
