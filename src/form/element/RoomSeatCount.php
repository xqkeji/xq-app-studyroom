<?php
return [
	'number',
	'name'=>'seat_count',
	'text'=>'座位数',
	'defaultValue'=>0,
	'attr_required'=>true,
	'filters'=>['int'],
	'validators'=>[
		[
			'between',
			"minimum" => 1,
			"maximum" => 9999,
		]
	],
];