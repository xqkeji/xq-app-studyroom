<?php
/*
 * xqkeji.cn
 * @copyright 2023 新齐科技 (http://www.xqkeji.cn/)
 * @author 张文豪  <support@xqkeji.cn>
 */
namespace xqkeji\app\studyroom\event;
use xqkeji\mvc\action\Add;
use xqkeji\mvc\builder\Model;
use xqkeji\App;
class Reserve 
{
	public static function beforeInsert($model)
	{

		$flash=App::getFlash();
		$auth=App::getAuth();
		$building_id=$model->getAttr('building_id');
		$room_id=$model->getAttr('room_id');
		$time=$model->getAttr('time');
		$room=Model::getModel('room')->find($room_id);
		$seat_count=$room->getAttr('seat_count');
		$today=date('Y-m-d');
		$reserve=Model::getModel('reserve');
		$student_id=$auth->getAuthId('student');
		$conditions=[
			['time','=',$time],
			['date','=',$today],
			['student_id','=',$student_id],
		];
		$exists=$reserve->where($conditions)->find();
		if($exists)
		{
			$flash->error('您在该时间段已经有预约记录');
			return false;
		}
		else
		{
			$conditions=[
				['building_id','=',$building_id],
				['room_id','=',$room_id],
				['time','=',$time],
				['date','=',$today],
			];
			$rows=$reserve->where($conditions)->select()->all();
			$seats=[];
			if(!empty($rows))
			{
				$count=count($rows);
				if($count>=$seat_count)
				{
					$flash->error('该教室的座位已满，无法完成预约');
					return false;
				}
				else
				{
					foreach($rows as $row)
					{
						$seats[$row->getAttr('seat')]=1;
					}
					while(true)
					{
						$rand_seat=rand(1,$seat_count);
						if(!isset($seats[$rand_seat]))
						{
							break;
						}
					}
					$model->setAttr('seat',$rand_seat);
					$model->setAttr('date',$today);
					return true;
				}
			}
			else
			{
				$rand_seat=rand(1,$seat_count);
				$model->setAttr('seat',$rand_seat);
				$model->setAttr('date',$today);
				return true;
			}
		}
		

	}
	
}