<?php
return [
	'ListItem',
	'name'=>'student_name',
	'text'=>'姓名',
	'attr_style'=>'width:220px;',
	'event'=>[
		'format'=>function($element,$value){
			$form=$element->getForm();
			$entity=$form->getEntity();
			$student_id=$entity->getAttr('student_id');
			$model=\xqkeji\mvc\builder\Model::getModel('student');
			$student=$model->find($student_id);
			$name=$student->getAttr('fullname');
			return $name;
		},
	],	
];