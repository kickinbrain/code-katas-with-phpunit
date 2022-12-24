<?php

use App\Song;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{

    /** @test */
    function it_gets_the_lyrics()
    {
        $expected = file_get_contents(__DIR__ . '/stubs/lyrics.stub');
        $result = (new Song)->sing();

        $this->assertEquals($result, $expected);

    }

}
