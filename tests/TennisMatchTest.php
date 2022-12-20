<?php

use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /** @test
     * @dataProvider scores
     */
    function it_scores_a_tennis_match($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch();

        for($i = 0; $i < $playerOnePoints; $i++){
            $match->pointToPLayerOne();
        }
        for($i = 0; $i < $playerTwoPoints; $i++){
            $match->pointToPLayerTwo();
        }

        $this->assertEquals($score, $match->score());
    }

    public function scores()
    {
        return [
          [0, 0, 'love-love'],
          [1, 0, 'fifteen-love'],
          [1, 1, 'fifteen-fifteen'],
          [2, 0, 'thirty-love'],
          [2,2, 'thirty-thirty'],
          [3, 0, 'forty-love'],
          [10,10, 'deuce'],
          [4,3,'Advantage: Player 1'],
          [3,4,'Advantage: Player 2'],
          [4, 0, 'Winner: Player 1'],
          [0, 4, 'Winner: Player 2'],
          [3,3, 'deuce']
        ];
    }
}
