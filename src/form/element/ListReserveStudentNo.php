<?php
return [
	'ListItem',
	'name'=>'student_id',
	'text'=>'学号',
	'attr_style'=>'width:220px;',
	'event'=>[
		'format'=>function($element,$value){
			
			$model=\xqkeji\mvc\builder\Model::getModel('student');
			$student=$model->find($value);
			if($student)
			{
				$no=$student->getAttr('username');
				return $no;
			}
			else
			{
				return '';
			}
		},
	],	
];