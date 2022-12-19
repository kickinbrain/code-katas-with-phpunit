<?php

namespace App;
class TennisMatch
{

    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;

    public function score()
    {
        if($this->playerOnePoints > $this->playerTwoPoints + 2){
            return 'forty-love';
        }
        if($this->playerOnePoints > $this->playerTwoPoints + 1){
            return 'thirty-love';
        }

        if($this->playerOnePoints > $this->playerTwoPoints){
            return 'fifteen-love';
        }

        return 'love-love';
    }

    public function pointToPLayerOne()
    {
        $this->playerOnePoints++;
    }

}