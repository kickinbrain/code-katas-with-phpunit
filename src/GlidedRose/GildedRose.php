<?php

namespace App\GlidedRose;

use App\GlidedRose\Brie;
use App\GlidedRose\Sulfuras;
use App\GlidedRose\BackstagePasses;

class GildedRose
{

    private static $itemTypes = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePasses::class,
        'Conjured Mana Cake' => ManaKake::class,
    ];

    public static function of($name, $quality, $sellIn)
    {
        if(!array_key_exists($name, self::$itemTypes)){
            throw new \InvalidArgumentException('Item type does not exists');
        }

        $class = self::$itemTypes[$name];

        return new $class($quality,$sellIn);
    }
}