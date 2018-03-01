<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/20
 * Time: 17:36
 */

declare(ticks=1);

/**
 * Class SimpleBlock
*/
class SimpleBlock
{
    protected $index;
    protected $timestamp;
    protected $data;
    protected $previous_hash;
    protected $hash;

    public function __construct(int $index, string $data, string $previous_hash)
    {
        $this->index = $index;
        $this->data = $data;
        $this->previous_hash = $previous_hash;
        $this->timestamp = microtime(true);
        $this->hash = $this->calcHash();
    }

    /**
     * @return string
     */
    public function calcHash(): string
    {
        $sha = hash_init('sha256');
        hash_update($sha, $this->index . $this->timestamp . $this->data . $this->previous_hash);
        return hash_final($sha);
    }

    /**
     * @param string $data
     * @param string $previous_hash
     * @return static
     */
    public static function first(string $data = 'ainiyiwannian', string $previous_hash = '0'): SimpleBlock
    {
        return new static(0, $data, $previous_hash);
    }

    /**
     * @param SimpleBlock $previous
     * @param string $data
     * @return static
     */
    public static function next(SimpleBlock $previous, string $data): SimpleBlock
    {
        return new static($previous->index + 1, $data, $previous->hash);
    }
}

$b0 = SimpleBlock::first('Genesis block');
$b1 = SimpleBlock::next($b0, 'Hello, I am block 1');
$b2 = SimpleBlock::next($b1, 'Hello, I am block 2');
$b3 = SimpleBlock::next($b2, 'Hello, I am block 3');
$b4 = SimpleBlock::next($b3, 'Hello, I am block 4');

$blockchain = [$b0, $b1, $b2, $b3, $b4];

var_dump($blockchain);





