<?php
return [
	'form',
	[
		'template'=>'row',
		'attr_class'=>'form-control',
		[
			'text',
			'name'=>'title',
			'text'=>'标题',
			'attr_readonly'=>'true',
		],
		[
			'text_area',
			'name'=>'content',
			'text'=>'内容',
			'attr_rows'=>'8',
			'attr_cols'=>'30',
			'attr_readonly'=>'true',
		],
	],
	'foot'=>'FormBackFoot',
	
];
