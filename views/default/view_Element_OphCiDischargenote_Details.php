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
?>

<section class="element element-data">
	<h3 class="data-title"><?php echo $element->elementType->name ?></h3>

	<div class="element-data">
		<div class="row">
			<div class="large-12 column data-value highlight">
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('ready_to_go_home'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->ready_to_go_home ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('checklist_completed_satisfactorily'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->checklist_completed_satisfactorily ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('able_to_instill_drops'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->able_to_instill_drops ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('district_nurse_contacted'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->district_nurse_contacted ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('discharged_home_on_id'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->discharged_home_on ? $element->discharged_home_on->name : 'None'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('information_provided'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->information_provided ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('following_day_assessment'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->following_day_assessment ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('follow_up'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->follow_up ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('additional_comments'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo CHtml::encode($element->additional_comments)?></div>
					</div>
				</div>
			</div>
		</div>
</section>
