<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/5
 * Time: 10:11
 */

$i = 0;
while (true){
    $hash = hash('sha256', 'Hello World '.$i);
    if(strpos($hash, '0000') === 0){
        echo $hash.' => '.$i.PHP_EOL;
    }
    $i++;
}

/*echo hash('sha256', 'Hello World 0').PHP_EOL;
echo hash('sha256', 'Hello World 1').PHP_EOL;
echo hash('sha256', 'Hello World 2').PHP_EOL;
echo hash('sha256', 'Hello World 3').PHP_EOL;*/
