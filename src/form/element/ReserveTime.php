<?php
return [
    'select',
    'name'=>'time',
    'text'=>'时间',
	'attr_class'=>'form-select',
    'event'=>[
        'beforeRender'=>function($element){
			$options=[];
            $hour=date('H');
			if($hour<12)
			{
				$options[1]='上午';
			}
			if($hour<18)
			{
				$options[2]='下午';
			}
			if($hour<22)
			{
				$options[3]='晚上';
			}
			
			$element->setOptions($options);
			
		},
    ],
];
