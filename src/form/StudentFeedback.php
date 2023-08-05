<?php
return [
	'form',
	[
		'template'=>'row',
		'attr_class'=>'form-control',
		[
			'text',
			'name'=>'title',
			'text'=>'反馈标题',
			
		],
		[
			'text_area',
			'name'=>'content',
			'text'=>'反馈内容',
			'attr_rows'=>'8',
			'attr_cols'=>'30',
		],
	],
	
];
