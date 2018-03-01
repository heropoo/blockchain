<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/1
 * Time: 14:40
 */

class Blockchain implements Countable, JsonSerializable
{
    protected $blocks = [];

    public function __construct($blocks = null)
    {
        if (!is_null($blocks)) {
            $this->blocks = array_merge($blocks, $this->blocks);
        }
    }

    public function add(Block $block)
    {
        $this->blocks[] = $block;
    }

    public function count(): int
    {
        return count($this->blocks);
    }

    public function jsonSerialize(): array
    {
        return $this->blocks;
    }
}