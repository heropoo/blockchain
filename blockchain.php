<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/20
 * Time: 17:36
 */

declare(ticks=1);

include 'vendor/autoload.php';

$b0 = Block::first('ainiyiwannian');
$b1 = Block::next($b0, '1');
$b2 = Block::next($b1, '2');
$b3 = Block::next($b2, '3');
$b4 = Block::next($b3, '4');

$blockchain = [$b0, $b1, $b2, $b3, $b4];

var_dump($blockchain);





