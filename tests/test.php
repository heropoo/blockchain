<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/1
 * Time: 15:01
 */

require_once dirname(__DIR__).'/vendor/autoload.php';

$b0 = Block::first('Genesis block');

$blockchain = new Blockchain([$b0]);

for($i = 1; $i <= 1000; $i++){
    $previous_block = $b0;
    $previous_block = Block::next($previous_block, 'Hello, I am block '.$i);
    echo $previous_block->getHash().PHP_EOL;
    $blockchain->add($previous_block);
}

var_dump($blockchain);
var_dump($blockchain->count());
echo $str = json_encode($blockchain).PHP_EOL;
var_dump(json_decode($str, 1));