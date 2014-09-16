<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\OrderBy;

class OrderByChunk implements ChunkInterface
{

    const PATTERN = <<<EOD
        <OrderBy>
            %s
        </OrderBy>
EOD;

    /** @var OrderBy */
    private $orderBy;

    /**
     * @param OrderBy $orderBy
     */
    public function __construct(OrderBy $orderBy)
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @return string
     */
    public function getText()
    {
        $text = array();
        $sc = new SimpleChunk('Column', $this->orderBy->getColumnName());
        $text[] = $sc->getText();
        $sc2 = new SimpleChunk('Direction', $this->orderBy->getDirection());
        $text[] = $sc2->getText();
        return sprintf(self::PATTERN, implode(PHP_EOL, $text));
    }

}