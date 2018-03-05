<?php
/**
 * Created by PhpStorm.
 * User: ttt
 * Date: 2018/3/1
 * Time: 14:16
 */

class Block implements JsonSerializable
{
    protected $index;
    protected $timestamp;
    protected $data;
    protected $previous_hash;
    protected $hash;
    protected $nonce;

    public function __construct(int $index, string $data, string $previous_hash)
    {
        $this->index = $index;
        $this->data = $data;
        $this->previous_hash = $previous_hash;
        $this->timestamp = microtime(true);
        $res = $this->computeHashWithProofOfWork();
        $this->nonce = $res[0];
        $this->hash = $res[1];
    }

    /**
     * @param string $difficulty
     * @return array
     */
    public function computeHashWithProofOfWork(string $difficulty = "000"): array
    {
        $nonce = 0;
        while (true) {
            $hash = $this->calcHashWithNonce($nonce);
            if (strpos($hash, $difficulty) === 0) {
                return [$nonce, $hash];
            } else {
                $nonce++;
            }
        }
    }

    /**
     * @param int $nonce
     * @return string
     */
    public function calcHashWithNonce(int $nonce = 0): string
    {
        $sha = hash_init('sha256');
        hash_update($sha, $nonce . $this->index . $this->timestamp . $this->data . $this->previous_hash);
        return hash_final($sha);
    }

    /**
     * first block
     * @param string $data
     * @param string $previous_hash
     * @return static
     */
    public static function first(string $data = 'Genesis block', string $previous_hash = '0'): Block
    {
        return new static(0, $data, $previous_hash);
    }

    /**
     * next block
     * @param Block $previous
     * @param string $data
     * @return static
     */
    public static function next(Block $previous, string $data): Block
    {
        return new static($previous->index + 1, $data, $previous->hash);
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getTimestamp(): float
    {
        return $this->timestamp;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getPreviousHash(): string
    {
        return $this->previous_hash;
    }

    public function getNonce(): int
    {
        return $this->nonce;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function jsonSerialize(): array
    {
        return [
            'index' => $this->index,
            'timestamp' => $this->timestamp,
            'data' => $this->data,
            'previous_hash' => $this->previous_hash,
            'hash' => $this->hash,
            'nonce' => $this->nonce
        ];
    }

}