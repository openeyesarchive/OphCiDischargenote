<?php 
class m130819_135949_event_type_OphCiDischargenote extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiDischargenote'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiDischargenote', 'name' => 'Discharge Note','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiDischargenote'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Details',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Details','class_name' => 'Element_OphCiDischargenote_Details', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Details'))->queryRow();

		// element lookup table ophcidischargenote_details_discharged_home_on
		$this->createTable('ophcidischargenote_details_discharged_home_on', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophcidischargenote_details_discharged_home_on_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophcidischargenote_details_discharged_home_on_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophcidischargenote_details_discharged_home_on_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophcidischargenote_details_discharged_home_on_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Maxidex for 2 weeks then BD for 2 weeks then stop','display_order'=>1));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Chloramphenicol QID for 6 days then stop','display_order'=>2));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Prednisole QID for 4 weeks then stop','display_order'=>3));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Chloramphenicol QID for 2 weeks then stop','display_order'=>4));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Cyclopentolate TID for 1-2 weeks then stop','display_order'=>5));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Maxitrol QID for 4 weeks then stop','display_order'=>6));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Maxitrol x6 for 4 weeks then stop','display_order'=>7));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'G Maxitrol QID for 2 weeks then BD for 2 weeks then stop','display_order'=>8));
		$this->insert('ophcidischargenote_details_discharged_home_on',array('name'=>'Other','display_order'=>9));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcidischargenote_details', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'ready_to_go_home' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Ready to go home
				'checklist_completed_satisfactorily' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Checklist completed satisfactorily and filled in the notes
				'able_to_instill_drops' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Able to instill drops
				'district_nurse_contacted' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // District nurse contacted to instill drops
				'discharged_home_on_id' => 'int(10) unsigned NOT NULL', // Discharged home on
				'information_provided' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Information leaflet and contact numbers provided
				'following_day_assessment' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Following day assessment
				'follow_up' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Follow up
				'additional_comments' => 'text COLLATE utf8_bin DEFAULT \'\'', // Additional comments
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_cui_fk` (`created_user_id`)',
				'KEY `et_ophcidischargenote_details_ev_fk` (`event_id`)',
				'KEY `ophcidischargenote_details_discharged_home_on_fk` (`discharged_home_on_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophcidischargenote_details_discharged_home_on_fk` FOREIGN KEY (`discharged_home_on_id`) REFERENCES `ophcidischargenote_details_discharged_home_on` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophcidischargenote_details');


		$this->dropTable('ophcidischargenote_details_discharged_home_on');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCiDischargenote'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphCiDischargenote does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

