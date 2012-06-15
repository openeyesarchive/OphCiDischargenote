
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<div class="view">

			<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('checklist_completed_id')); ?>:</b>
				<?php  echo $element->checklist_completed ? $element->checklist_completed->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('ready_to_go_home_id')); ?>:</b>
				<?php  echo $element->ready_to_go_home ? $element->ready_to_go_home->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('district_nurse_contacted_id')); ?>:</b>
				<?php  echo $element->district_nurse_contacted ? $element->district_nurse_contacted->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('comments')); ?>:</b>
				<?php  echo $element->comments ?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('following_day_assessment_id')); ?>:</b>
				<?php  echo $element->following_day_assessment ? $element->following_day_assessment->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('follow_up_id')); ?>:</b>
				<?php  echo $element->follow_up ? $element->follow_up->name : 'None'?>				<br />
			</div>
								<div class="view">
				<b><?php  echo CHtml::encode($element->getAttributeLabel('information_leaflet_id')); ?>:</b>
				<?php  echo $element->information_leaflet ? $element->information_leaflet->name : 'None'?>				<br />
			</div>
					</div>

