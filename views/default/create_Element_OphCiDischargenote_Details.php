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
 ?>
<div class="<?php echo $element->elementType->class_name?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>

	
		<?php echo $form->dropDownList($element, 'checklist_completed_id', CHtml::listData(EtOphcidischargenoteDetailsChecklistCompleted::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	
		<?php echo $form->dropDownList($element, 'ready_to_go_home_id', CHtml::listData(EtOphcidischargenoteDetailsReadyToGoHome::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	
		<?php echo $form->dropDownList($element, 'district_nurse_contacted_id', CHtml::listData(EtOphcidischargenoteDetailsDistrictNurseContacted::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	
		<?php echo $form->textArea($element, 'comments', array('rows' => 6, 'cols' => 80)); ?>
	
		<?php echo $form->dropDownList($element, 'following_day_assessment_id', CHtml::listData(EtOphcidischargenoteDetailsFollowingDayAssessment::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	
		<?php echo $form->dropDownList($element, 'follow_up_id', CHtml::listData(EtOphcidischargenoteDetailsFollowUp::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	
		<?php echo $form->dropDownList($element, 'information_leaflet_id', CHtml::listData(EtOphcidischargenoteDetailsInformationLeaflet::model()->findAll(),'id','name'),array('empty'=>'- Please select -')); ?>
	</div>
