<?php
return [
	'ListItem',
	'name'=>'sex',
	'text'=>'性别',
	'attr_style'=>'width:80px;',
	'event'=>[
		'format'=>function($element,$value){
			$sex=[
				1=>'男',
				2=>'女',
			];
			if(isset($sex[$value]))
			{
				return $sex[$value];
			}
			else
			{
				return '男';
			}
		},
	],	
];
