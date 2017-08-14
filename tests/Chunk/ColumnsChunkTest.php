<?php

namespace Citilink\ExpertSenderApi\Tests\Chunk;

use Citilink\ExpertSenderApi\Chunk\ColumnChunk;
use Citilink\ExpertSenderApi\Chunk\ColumnsChunk;

class ColumnsChunkTest extends \PHPUnit_Framework_TestCase
{

    public function testGetText()
    {
        $columnsChunks = [
            new ColumnChunk('name', 'Alex<br/>Aksef'),
            new ColumnChunk('sex', 'male'),
            new ColumnChunk('age', 22)
        ];

        $columnsChunk = new ColumnsChunk($columnsChunks);
        $text = $columnsChunk->toXml();
        $this->assertContains('<Columns>', $text);
        $this->assertContains('<Column>', $text);
        $this->assertContains('<Name>name</Name>', $text);
        $this->assertContains('<Value><![CDATA[Alex<br/>Aksef]]></Value>', $text);
        $this->assertContains('<Name>sex</Name>', $text);
        $this->assertContains('<Value>male</Value>', $text);
        $this->assertContains('<Name>age</Name>', $text);
        $this->assertContains('<Value>22</Value>', $text);
    }

}
 