<?php

namespace LinguaLeo\ExpertSender\Chunks;

use LinguaLeo\ExpertSender\Entities\Column;

class ColumnChunk implements ChunkInterface
{

    const PATTERN = <<<EOD
        <Column>
            %s
        </Column>
EOD;

    /** @var Column */
    private $column;

    /**
     * @param Column $column
     */
    public function __construct(Column $column)
    {
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function getText()
    {
        if (!$this->column->hasValue()) {
            $simpleChunk= new SimpleChunk('Column', $this->column->getName());
            return $simpleChunk->getText();
        }
        $text = array();
        $simpleChunk1 = new SimpleChunk('Name', $this->column->getName());
        $text[] = $simpleChunk1->getText();
        $value = $this->column->getValue();
        if ($value != strip_tags($value)) {
            $value = sprintf('<![CDATA[%s]]>', $value);
        }
        $simpleChunk2 =(new SimpleChunk('Value', $value));
        $text[] = $simpleChunk2->getText();
        return sprintf(self::PATTERN, implode(PHP_EOL, $text));
    }

}