<?php
return [
	'ListItem',
	'name'=>'room_id',
	'text'=>'教室号',
	'event'=>[
		'format'=>function($element,$value){
			$model=\xqkeji\mvc\builder\Model::getModel('room');
			$room=$model->find($value);
			$name=$room->getAttr('name');
			return $name;
		},
	],	
];