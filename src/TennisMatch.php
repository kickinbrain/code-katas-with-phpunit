<?php

namespace App;
class TennisMatch
{

    protected $playerOnePoints = 0;
    protected $playerTwoPoints = 0;

    public function score()
    {
        if($this->hasWinner()){
            return "Winner: " . $this->leader();
        }

        if($this->hasAdvantage()){
            return "Advantage: " . $this->leader();
        }

        if($this->isDeuce()){
            return "deuce";
        }

       return sprintf(
           "%s-%s",
           $this->pointsToTerm($this->playerOnePoints),
           $this->pointsToTerm($this->playerTwoPoints)
       );
    }

    public function pointToPLayerOne()
    {
        $this->playerOnePoints++;
    }

    public function pointToPLayerTwo()
    {
        $this->playerTwoPoints++;
    }


    protected function pointsToTerm($points){
        switch ($points){
            case 0:
                return "love";
            case 1:
                return "fifteen";
            case 2:
                return "thirty";
            case 3:
                return "forty";

        }
    }

    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if($this->playerOnePoints > 3 && $this->playerOnePoints >= $this->playerTwoPoints + 2){
            return true;
        }
        if($this->playerTwoPoints > 3 && $this->playerTwoPoints >= $this->playerOnePoints + 2){
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function leader(): string
    {
        return $this->playerOnePoints > $this->playerTwoPoints
            ? "Player 1"
            : "Player 2";
    }

    /**
     * @return bool
     */
    public function isDeuce(): bool
    {
        $canBewWon = $this->canBeWon();

        return $canBewWon && $this->playerOnePoints === $this->playerTwoPoints;
    }

    protected function hasAdvantage()
    {
        if($this->canBeWon()){
            return ! $this->isDeuce();
        }

        return false;
    }

    /**
     * @return bool
     */
    public function canBeWon(): bool
    {
        return $this->playerOnePoints >= 3 && $this->playerTwoPoints >= 3;
    }


}