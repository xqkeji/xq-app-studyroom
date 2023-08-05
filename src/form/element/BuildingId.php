<?php
return [
	'select',
	'name'=>'building_id',
	'text'=>'教学楼',
	'attr_class'=>'form-select',
	'event'=>[
		'beforeRender'=>function($element){
			$model=\xqkeji\mvc\builder\Model::getModel('building');
			$default_building_id='';
			$building=$model->where('status',1)->select();
			$items=$building->all();
			$rows=[];
			if(!empty($items))
			{
				foreach($items as $item)
				{
					$key=(string)$item->getKey();
					if(empty($default_building_id))
					{
						$default_building_id=$key;
					}
					$val=$item->getAttr('name');
					$rows[$key]=$val;
				}
			}
			$element->setOptions($rows);

			//自动显示该教学楼的所有教室号列表
			$form=$element->getForm();
			if($form->has('room_id'))
			{
				$room_element=$form->get('room_id');
				$conditions=[
					['status','=',1],
					['building_id','=',$default_building_id]
				];
				$model=\xqkeji\mvc\builder\Model::getModel('room');
	
				$room=$model->where($conditions)->order('ordernum','asc')->select();
				$items=$room->all();
				$rows=[];
				if(!empty($items))
				{
					foreach($items as $item)
					{
						$key=(string)$item->getKey();
						$val=$item->getAttr('name');
						$rows[$key]=$val;
					}
				}
				$room_element->setOptions($rows);
				$element->setAttr('onchange','buildingChange(this);');
			}
		},
	],	
];