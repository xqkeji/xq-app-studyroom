<?php
return [
	'text_area',
	'name'=>'content',
	'text'=>'内容',
	'attr_rows'=>'8',
	'attr_cols'=>'30',
	'attr_required'=>true,
	'filters'=>['string'],
	'validators'=>[
		[
			'required',
		]
	],
];