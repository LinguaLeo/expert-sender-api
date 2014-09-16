<?php

namespace LinguaLeo\ExpertSender\Chunks;

class GroupChunk implements ChunkInterface
{

    /** @var ChunkInterface[] */
    protected $chunks = array();

    /**
     * @param ChunkInterface[] $chunks
     */
    public function __construct(array $chunks = array())
    {
        $this->chunks = $chunks;
    }

    /**
     * @param ChunkInterface $chunk
     */
    public function addChunk(ChunkInterface $chunk)
    {
        $this->chunks[] = $chunk;
    }

    /**
     * @return string
     */
    public function getText()
    {
        $text = array();
        foreach ($this->chunks as $chunk) {
            $text[] = $chunk->getText();
        }
        return implode(PHP_EOL, $text);
    }

}