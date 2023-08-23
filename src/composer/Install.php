<?php
namespace xqkeji\app\studyroom\composer;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Command;
use MongoDB\Driver\BulkWrite;
use MongoDB\BSON\ObjectId;
class Install
{
    public static function getRootPath():string
    {
        return dirname(__DIR__,5);
    }
    public static function getRootConfigPath():string
    {
        return dirname(__DIR__,5).DIRECTORY_SEPARATOR.'config';
    }
    public static function postInstall() : void
    {
        $configPath=self::getRootConfigPath();
        $containerFile=$configPath.DIRECTORY_SEPARATOR.'container.php';

        if(is_file($containerFile))
        {
            $config=include($containerFile);
            if(isset($config['db']))
            {
                $db=$config['db'];
                $hostname=$db['hostname'] ?? '';
                $hostport=$db['hostport'] ?? '';
                $database=$db['database'] ?? '';
                $username=$db['username'] ?? '';
                $password=$db['password'] ?? '';
                if(!empty($username))
                {
                    $uri='mongodb://'.$username.':'.$password.'@'.$hostname.':'.$hostport;
                }
                else
                {
                    $uri='mongodb://'.$hostname.':'.$hostport;
                }
                
                $manager = new Manager($uri,['serverSelectionTryOnce'=>false,'serverSelectionTimeoutMS'=>500,'connectTimeoutMS'=>500]);
                //创建学生唯一索引
                $cmd = new Command([
                    // 集合名
                    'createIndexes' => 'studyroom_student',
                    'indexes' => [
                        [
                            // 索引名
                            'name' => 'studyroom_student_unique',
                            // 索引字段数组
                            'key' => [
                                'username' => 1
                            ],
                            'unique'=>true,
                        ],
                    ],
                ]);
                $result = $manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $ok = intval($result[0]->ok);
                    if($ok>0)
                    {
                        echo "创建学生集合username字段唯一索引成功！\r\n";
                    }
                    else
                    {
                        echo "创建学生集合username字段唯一索引失败！\r\n";
                    }
                }
                //创建索引结束
                //创建自习室预约唯一索引
                $cmd = new Command([
                    // 集合名
                    'createIndexes' => 'studyroom_reserve',
                    'indexes' => [
                        [
                            // 索引名
                            'name' => 'studyroom_reserve_unique',
                            // 索引字段数组
                            'key' => [
                                'building_id' => 1,
                                'room_id' => 1,
                                'seat' => 1,
                                'time'=>1,
                                'date'=>1,
                            ],
                            'unique'=>true,
                        ],
                    ],
                ]);
                $result = $manager->executeCommand($database, $cmd)->toArray();
                if (!empty($result)) {
                    $ok = intval($result[0]->ok);
                    if($ok>0)
                    {
                        echo "创建建自习室预约集合多个字段唯一索引成功！\r\n";
                    }
                    else
                    {
                        echo "创建建自习室预约集合多个字段唯一索引失败！\r\n";
                    }
                }
                //创建索引结束
               
                

            }
            else
            {
                throw new \Exception("the config file:\"$containerFile\" can not found 'db' config!" , 404);
            }
        }
        else
        {
            throw new \Exception("the config file:\"$containerFile\" not exists!" , 404);
        }
    }
    
}