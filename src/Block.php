<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/2/20
 * Time: 18:22
 */

class Block
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
    public static function first(string $data = 'ainiyiwannian', string $previous_hash = '0'): Block
    {
        return new static(0, $data, $previous_hash);
    }

    /**
     * @param Block $previous
     * @param string $data
     * @return static
     */
    public static function next(Block $previous, string $data): Block
    {
        return new static($previous->index + 1, $data, $previous->hash);
    }
}