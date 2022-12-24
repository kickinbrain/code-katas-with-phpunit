<?php

namespace App;

class Song
{

    public function sing()
    {
        return $this->verses(99,0);
    }

    public function verses($start = 99, $end = 0)
    {
        return implode("\n",array_map(
            fn($number) => $this->verse($number) . "\n",
            range($start, $end)
        ));
    }

    public function verse($number)
    {
        return match ($number) {
            1 => "1 bottle of beer on the wall, 1 bottle of beer.\n" .
                "Take one down and pass it around, no more bottles of beer on the wall.",
            2 => "2 bottles of beer on the wall, 2 bottles of beer.\n" .
                "Take one down and pass it around, 1 bottle of beer on the wall.",
            0 => "No more bottles of beer on the wall, no more bottles of beer.\n" .
                "Go to the store and buy some more, 99 bottles of beer on the wall.",
            default => "$number bottles of beer on the wall, $number bottles of beer.\n" .
                "Take one down and pass it around, " . $number - 1 . " bottles of beer on the wall.",
        };
    }

}