<?php
/**
 * @file [Have CricketMatch Class]
 */
/**
 * Class CricketMatch create an array of data
 */
class CricketMatch
{
    public $HighestScoringPlayer;
    public $WinnerOfTournament;
    public $MaxScoreInAMatch = array();

    //M=Match, T=Team, P=Player
    public $report = array();

    /**
     * [__construct give values to players and compute highest scorer player]
     */
    function __construct()
    {
        $PlayerMaxScore = 0;
        $Winnings = array(0,0,0,0);
        $m = 1;
        //give runs to each player
        for ($i = 1; $i < 4; $i++) {
            for ($l = $i+1; $l <= 4; $l++) {
                $sum1 = 0;
                $sum2 = 0;
                //score of 1st team
                for ($k = 1; $k <= 11; $k++) {
                    $this->report['M'.$m]['T'.$i]['T'.$i.'P'.$k] = rand(10, 50);
                    $PlayerScore = $this->report['M'.$m]['T'.$i]['T'.$i.'P'.$k];
                    $sum1 += $PlayerScore;
                    if ($PlayerScore > $PlayerMaxScore) {
                        $PlayerMaxScore = $PlayerScore;
                        $this->HighestScoringPlayer = (array) null;
                        array_push($this->HighestScoringPlayer, 'T'.$i.'P'.$k);
                    } elseif ($PlayerScore === $PlayerMaxScore) {
                        array_push($this->HighestScoringPlayer, 'T'.$i.'P'.$k);
                    }
                }
                //score of 2nd team
                for ($k = 1; $k <= 11; $k++) {
                    $this->report['M'.$m]['T'.$l]['T'.$l.'P'.$k] = rand(10, 50);
                    $PlayerScore = $this->report['M'.$m]['T'.$l]['T'.$l.'P'.$k];
                    $sum2 += $PlayerScore;
                    if ($PlayerScore > $PlayerMaxScore) {
                        $PlayerMaxScore = $PlayerScore;
                        $this->HighestScoringPlayer = (array) null;
                        //Highest scoring player
                        array_push($this->HighestScoringPlayer, 'T'.$l.'P'.$k);
                    } elseif ($PlayerScore === $PlayerMaxScore) {
                        array_push($this->HighestScoringPlayer, 'T'.$l.'P'.$k);
                    }
                }
                //Winnings of each game
                ($sum1 < $sum2 ? $Winnings[$l-1]+=1 : $Winnings[$i-1]+=1);

                //Maximum score in a match
                $this->MaxScoreInAMatch[$m] = max($sum1, $sum2);
                $m++;
            }
        }

        //Winnings of the league
        $WinningTeam = 0;
        $j = 1;
        foreach ($Winnings as $value) {
            # code...
            if ($value > $WinningTeam) {
                $this->WinnerOfTournament = $j;
                $WinningTeam = $value;
            }
            $j++;
        }
    }

    /**
     * [giveMaxScoreInAMatch description]
     *
     * @param [int] $MatchNumber [user input]
     *
     * @return [NULL]              []
     */
    function giveMaxScoreInAMatch($MatchNumber)
    {
        echo $this->MaxScoreInAMatch[$MatchNumber-1];
    }

}
?>
