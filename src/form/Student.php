<?php
return [
	'form',
	[
		'template'=>'row',
		'attr_class'=>'form-control',
		'StudentNo',
		'StudentName',
		'StudentPassword',
		'StudentSex',
		'StudentAge',
		'StudentCollege',
		'StudentClass',
		'Switch',
		'Csrf',
	],
	'event'=>[
		'beforeBind'=>function($form){
			$controller=\xqkeji\App::getController();
			$actionName=$controller->getActionName();
			$data=$form->getData();
			
			if($actionName=='edit')
			{
				if(empty($data['password']))
				{
					unset($data['password']);
				}
			}

			$form->setData($data);
		}
	],
];
