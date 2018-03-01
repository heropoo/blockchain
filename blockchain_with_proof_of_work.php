<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/1
 * Time: 10:50
 */

require 'vendor/autoload.php';

$b0 = Block::first('Genesis block');
$b1 = Block::next($b0, 'Hello, I am block 1');
$b2 = Block::next($b1, 'Hello, I am block 2');
$b3 = Block::next($b2, 'Hello, I am block 3');
$b4 = Block::next($b3, 'Hello, I am block 4');

$blockchain = [$b0, $b1, $b2, $b3, $b4];

var_dump($blockchain);

