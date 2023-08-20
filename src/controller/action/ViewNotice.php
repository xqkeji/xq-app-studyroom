<?php
return [
    'edit',
    'modelName'=>'notice',
    'formName'=>'student_notice',
    'pickView'=>'edit',
    'event'=>[
        'beforePost'=>function($action){
            return false;
        }
    ],
];