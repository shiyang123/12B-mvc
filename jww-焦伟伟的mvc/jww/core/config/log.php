<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/26
 * Time: 8:29
 * 用来保存我们使用的日志驱动
 */
return array(
    'DRIVE'=>'file',   //日志驱动存储在我们的系统中。
    'OPTION'=>array(
        'PATH'=>JWW.'/log/'
    )
);