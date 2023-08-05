<?php
return [
	'ListItem',
	'name'=>'time',
	'text'=>'时间',
	'event'=>[
		'format'=>function($element,$value){
			$times=[
				1=>'上午',
				2=>'下午',
				3=>'晚上',
			];
			if(isset($times[$value]))
			{
				return $times[$value];
			}
			else
			{
				return '上午';
			}
		},
	],	
];