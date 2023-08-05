<?php
return [
	'ListItem',
	'name'=>'operation',
	'text'=>'操作',
	'attr_style'=>'width:120px;',
	[
		[
			'button',
			'attr_class'=>'btn btn-primary btn-sm xq-view',
			'attr_style'=>'margin-right:5px;',
			'attr_value'=>'查看详情',
			'event'=>[
				'beforeRender'=>function($element){
					$form=$element->getForm();
					$entity=$form->getEntity();
					$key=(string)$entity->getKey();
					$url=xq_url('student/view_notice',[$key]);
					$element->setAttr('xq-url',$url);
					
				},
			],
		],
	],
];


