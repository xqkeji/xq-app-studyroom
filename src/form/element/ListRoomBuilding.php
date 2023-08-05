<?php
return [
	'ListItem',
	'name'=>'building_id',
	'text'=>'教学楼',
	'event'=>[
		'format'=>function($element,$value){
			
			$model=\xqkeji\mvc\builder\Model::getModel('building');
			$building=$model->find($value);
			$name=$building->getAttr('name');
			return $name;
		},
	],	
];