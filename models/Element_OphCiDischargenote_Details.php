<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophcidischargenote_details".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $checklist_completed_id
 * @property integer $ready_to_go_home_id
 * @property integer $district_nurse_contacted_id
 * @property string $comments
 * @property integer $following_day_assessment_id
 * @property integer $follow_up_id
 * @property integer $information_leaflet_id
 *
 * The followings are the available model relations:
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
			array('event_id, checklist_completed_id, ready_to_go_home_id, district_nurse_contacted_id, comments, following_day_assessment_id, follow_up_id, information_leaflet_id, ', 'safe'),
			array('checklist_completed_id, ready_to_go_home_id, district_nurse_contacted_id, following_day_assessment_id, follow_up_id, information_leaflet_id, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, checklist_completed_id, ready_to_go_home_id, district_nurse_contacted_id, comments, following_day_assessment_id, follow_up_id, information_leaflet_id, ', 'safe', 'on' => 'search'),
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
						'checklist_completed' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsChecklistCompleted', 'checklist_completed_id'),
						'ready_to_go_home' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsReadyToGoHome', 'ready_to_go_home_id'),
						'district_nurse_contacted' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsDistrictNurseContacted', 'district_nurse_contacted_id'),
						'following_day_assessment' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsFollowingDayAssessment', 'following_day_assessment_id'),
						'follow_up' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsFollowUp', 'follow_up_id'),
						'information_leaflet' => array(self::BELONGS_TO, 'EtOphcidischargenoteDetailsInformationLeaflet', 'information_leaflet_id'),
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
'checklist_completed_id' => 'Checklist completed satisfactorily',
'ready_to_go_home_id' => 'Ready to go home',
'district_nurse_contacted_id' => 'District nurse contacted to instill drops',
'comments' => 'Additional comments',
'following_day_assessment_id' => 'Following day assessment',
'follow_up_id' => 'Follow up',
'information_leaflet_id' => 'Information leaflet and contact numbers provided',
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

$criteria->compare('checklist_completed_id', $this->checklist_completed_id);
$criteria->compare('ready_to_go_home_id', $this->ready_to_go_home_id);
$criteria->compare('district_nurse_contacted_id', $this->district_nurse_contacted_id);
$criteria->compare('comments', $this->comments);
$criteria->compare('following_day_assessment_id', $this->following_day_assessment_id);
$criteria->compare('follow_up_id', $this->follow_up_id);
$criteria->compare('information_leaflet_id', $this->information_leaflet_id);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
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