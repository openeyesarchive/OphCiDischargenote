<?php 
class m120615_152452_event_type_OphCiDischargenote extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Discharge note'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Clinical events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCiDischargenote', 'name' => 'Discharge note','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Discharge note'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

				// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Details',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Details','class_name' => 'Element_OphCiDischargenote_Details', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name', array(':name'=>'Details'))->queryRow();
				
				// element lookup table et_ophcidischargenote_details_checklist_completed
		$this->createTable('et_ophcidischargenote_details_checklist_completed', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_checklist_completed_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_checklist_completed_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_checklist_completed_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_checklist_completed_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_checklist_completed',array('name'=>'Yes','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_checklist_completed',array('name'=>'No','display_order'=>2));
									// element lookup table et_ophcidischargenote_details_ready_to_go_home
		$this->createTable('et_ophcidischargenote_details_ready_to_go_home', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_ready_to_go_home_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_ready_to_go_home_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_ready_to_go_home_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_ready_to_go_home_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_ready_to_go_home',array('name'=>'Yes','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_ready_to_go_home',array('name'=>'No','display_order'=>2));
									// element lookup table et_ophcidischargenote_details_district_nurse_contacted
		$this->createTable('et_ophcidischargenote_details_district_nurse_contacted', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_district_nurse_contacted_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_district_nurse_contacted_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_district_nurse_contacted_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_district_nurse_contacted_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_district_nurse_contacted',array('name'=>'Yes','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_district_nurse_contacted',array('name'=>'No','display_order'=>2));
									// element lookup table et_ophcidischargenote_details_following_day_assessment
		$this->createTable('et_ophcidischargenote_details_following_day_assessment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_following_day_assessment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_following_day_assessment_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_following_day_assessment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_following_day_assessment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_following_day_assessment',array('name'=>'Telephone','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_following_day_assessment',array('name'=>'Home visit','display_order'=>2));
						$this->insert('et_ophcidischargenote_details_following_day_assessment',array('name'=>'Cataract Unit / Ward','display_order'=>3));
									// element lookup table et_ophcidischargenote_details_follow_up
		$this->createTable('et_ophcidischargenote_details_follow_up', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_follow_up_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_follow_up_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_follow_up_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_follow_up_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_follow_up',array('name'=>'Doctor clinic 1-2 weeks','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_follow_up',array('name'=>'Nurse led clinic 1-2 weeks','display_order'=>2));
						$this->insert('et_ophcidischargenote_details_follow_up',array('name'=>'Nurse led clinic 4 weeks','display_order'=>3));
						$this->insert('et_ophcidischargenote_details_follow_up',array('name'=>'Optometrist only','display_order'=>4));
									// element lookup table et_ophcidischargenote_details_information_leaflet
		$this->createTable('et_ophcidischargenote_details_information_leaflet', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
								'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_information_leaflet_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_information_leaflet_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophcidischargenote_details_information_leaflet_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_information_leaflet_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						$this->insert('et_ophcidischargenote_details_information_leaflet',array('name'=>'Yes','display_order'=>1));
						$this->insert('et_ophcidischargenote_details_information_leaflet',array('name'=>'No','display_order'=>2));
							
				
		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophcidischargenote_details', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'checklist_completed_id' => 'int(10) unsigned NOT NULL', // Checklist completed satisfactorily
			'ready_to_go_home_id' => 'int(10) unsigned NOT NULL', // Ready to go home
			'district_nurse_contacted_id' => 'int(10) unsigned NOT NULL', // District nurse contacted to instill drops
			'comments' => 'text DEFAULT \'\'', // Additional comments
			'following_day_assessment_id' => 'int(10) unsigned NOT NULL', // Following day assessment
			'follow_up_id' => 'int(10) unsigned NOT NULL', // Follow up
			'information_leaflet_id' => 'int(10) unsigned NOT NULL', // Information leaflet and contact numbers provided
							'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcidischargenote_details_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcidischargenote_details_cui_fk` (`created_user_id`)',
				'KEY `et_ophcidischargenote_details_ev_fk` (`event_id`)',
								'KEY `et_ophcidischargenote_details_checklist_completed_fk` (`checklist_completed_id`)',
								'KEY `et_ophcidischargenote_details_ready_to_go_home_fk` (`ready_to_go_home_id`)',
								'KEY `et_ophcidischargenote_details_district_nurse_contacted_fk` (`district_nurse_contacted_id`)',
								'KEY `et_ophcidischargenote_details_following_day_assessment_fk` (`following_day_assessment_id`)',
								'KEY `et_ophcidischargenote_details_follow_up_fk` (`follow_up_id`)',
								'KEY `et_ophcidischargenote_details_information_leaflet_fk` (`information_leaflet_id`)',
								'CONSTRAINT `et_ophcidischargenote_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcidischargenote_details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_checklist_completed_fk` FOREIGN KEY (`checklist_completed_id`) REFERENCES `et_ophcidischargenote_details_checklist_completed` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_ready_to_go_home_fk` FOREIGN KEY (`ready_to_go_home_id`) REFERENCES `et_ophcidischargenote_details_ready_to_go_home` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_district_nurse_contacted_fk` FOREIGN KEY (`district_nurse_contacted_id`) REFERENCES `et_ophcidischargenote_details_district_nurse_contacted` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_following_day_assessment_fk` FOREIGN KEY (`following_day_assessment_id`) REFERENCES `et_ophcidischargenote_details_following_day_assessment` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_follow_up_fk` FOREIGN KEY (`follow_up_id`) REFERENCES `et_ophcidischargenote_details_follow_up` (`id`)',
								'CONSTRAINT `et_ophcidischargenote_details_information_leaflet_fk` FOREIGN KEY (`information_leaflet_id`) REFERENCES `et_ophcidischargenote_details_information_leaflet` (`id`)',
							), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

						}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
				$this->dropTable('et_ophcidischargenote_details');

		
				$this->dropTable('et_ophcidischargenote_details_checklist_completed');
				$this->dropTable('et_ophcidischargenote_details_ready_to_go_home');
				$this->dropTable('et_ophcidischargenote_details_district_nurse_contacted');
				$this->dropTable('et_ophcidischargenote_details_following_day_assessment');
				$this->dropTable('et_ophcidischargenote_details_follow_up');
				$this->dropTable('et_ophcidischargenote_details_information_leaflet');
		
		
		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('name=:name', array(':name'=>'Discharge note'))->queryRow();

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
?>
