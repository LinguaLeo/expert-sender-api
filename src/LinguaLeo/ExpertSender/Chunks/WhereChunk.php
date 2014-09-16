<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Where;

class WhereChunk implements ChunkInterface
{

    const PATTERN = <<<EOD
        <Where>
            %s
        </Where>
EOD;

    /** @var Where */
    private $where;

    /**
     * @param Where $where
     */
    public function __construct(Where $where)
    {
        $this->where = $where;
    }

    /**
     * @return string
     */
    public function getText()
    {
        $text = array();
        $sc1 = new SimpleChunk('ColumnName', $this->where->getColumnName());
        $text[] = $sc1->getText();
        $sc2 = new SimpleChunk('Operator', $this->where->getOperator());
        $text[] = $sc2->getText();
        $sc3 = new SimpleChunk('Value', $this->where->getValue());
        $text[] = $sc3->getText();
        return sprintf(self::PATTERN, implode(PHP_EOL, $text));
    }

} 