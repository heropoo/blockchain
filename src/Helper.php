<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/1
 * Time: 10:22
 */

class Helper
{
    /**
     * get micro time
     * @return string
     */
    public static function microTime() {
        $temp = explode(" ", microtime());
        return bcadd($temp[0], $temp[1], 6);
    }
}