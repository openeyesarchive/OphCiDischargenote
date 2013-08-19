<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcidischargenote_details".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $ready_to_go_home
 * @property integer $checklist_completed_satisfactorily
 * @property integer $able_to_instill_drops
 * @property integer $district_nurse_contacted
 * @property integer $discharged_home_on_id
 * @property integer $information_provided
 * @property integer $following_day_assessment
 * @property integer $follow_up
 * @property string $additional_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property Element_OphCiDischargenote_Details_DischargedHomeOn $discharged_home_on
 */

class Element_OphCiDischargenote_Details extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophcidischargenote_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, ready_to_go_home, checklist_completed_satisfactorily, able_to_instill_drops, district_nurse_contacted, discharged_home_on_id, information_provided, following_day_assessment, follow_up, additional_comments, ', 'safe'),
			array('ready_to_go_home, checklist_completed_satisfactorily, able_to_instill_drops, district_nurse_contacted, discharged_home_on_id, information_provided, following_day_assessment, follow_up, additional_comments, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, ready_to_go_home, checklist_completed_satisfactorily, able_to_instill_drops, district_nurse_contacted, discharged_home_on_id, information_provided, following_day_assessment, follow_up, additional_comments, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'discharged_home_on' => array(self::BELONGS_TO, 'Element_OphCiDischargenote_Details_DischargedHomeOn', 'discharged_home_on_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'ready_to_go_home' => 'Ready to go home',
			'checklist_completed_satisfactorily' => 'Checklist completed satisfactorily and filled in the notes',
			'able_to_instill_drops' => 'Able to instill drops',
			'district_nurse_contacted' => 'District nurse contacted to instill drops',
			'discharged_home_on_id' => 'Discharged home on',
			'information_provided' => 'Information leaflet and contact numbers provided',
			'following_day_assessment' => 'Following day assessment',
			'follow_up' => 'Follow up',
			'additional_comments' => 'Additional comments',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('ready_to_go_home', $this->ready_to_go_home);
		$criteria->compare('checklist_completed_satisfactorily', $this->checklist_completed_satisfactorily);
		$criteria->compare('able_to_instill_drops', $this->able_to_instill_drops);
		$criteria->compare('district_nurse_contacted', $this->district_nurse_contacted);
		$criteria->compare('discharged_home_on_id', $this->discharged_home_on_id);
		$criteria->compare('information_provided', $this->information_provided);
		$criteria->compare('following_day_assessment', $this->following_day_assessment);
		$criteria->compare('follow_up', $this->follow_up);
		$criteria->compare('additional_comments', $this->additional_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>