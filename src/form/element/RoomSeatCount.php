<?php
return [
	'number',
	'name'=>'seat_count',
	'text'=>'座位数',
	'defaultValue'=>0,
	'filters'=>['int'],
	'validators'=>[
		[
			'between',
			"minimum" => 1,
			"maximum" => 9999,
		]
	],
];