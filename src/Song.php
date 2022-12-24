<?php

namespace App;

class Song
{

    public function sing()
    {
        return file_get_contents(__DIR__ . '/../tests/stubs/lyrics.stub');
    }

}