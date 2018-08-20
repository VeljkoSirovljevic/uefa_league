<?php
namespace App\Models;

use App\Classes\Model;

class GameModel extends Model {

    public function GameOne(){

        $result = [];

        $squad = $this->defensive();

        $squadQuality = $this->calculateQuality($squad);

        $firstGameResult = $this->calculateFirstGameResult($squadQuality);

        $injuredPLayer = $this->calculateInjuredPlayer($squad);

        $result['team'] = $squad;
        $result['result'] = $firstGameResult;
        $result['injured'] = $injuredPLayer;

        return $result;
    }

    public function GameTwo(){
        $result = [];

        $squad = $this->neutral();

        $squadQuality = $this->calculateQuality($squad);

        $secondGameResult = $this->calculateSecondGameResult($squadQuality);

        $injuredPLayer = $this->calculateInjuredPlayer($squad);

        $result['team'] = $squad;
        $result['result'] = $secondGameResult;
        $result['injured'] = $injuredPLayer;

        return $result;
    }

    public function GameThree(){
        $result = [];

        $squad = $this->attacking();

        $squadQuality = $this->calculateQuality($squad);

        $thirdGameResult = $this->calculateThirdGameResult($squadQuality);

        $injuredPLayer = $this->calculateInjuredPlayer($squad);

        $result['team'] = $squad;
        $result['result'] = $thirdGameResult;
        $result['injured'] = $injuredPLayer;

        return $result;

    }

    public function newTeam(){
        $this->query('TRUNCATE table players');
        $this->execute();

        unset($_SESSION['club']);
        session_destroy();
        // Redirect
        header('Location: '.ROOT_URL);
    }

    private function defensive(){


        $this->query('SELECT * FROM players WHERE position = "G" ORDER BY skill DESC LIMIT 1');
        $goalie = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "D" ORDER BY skill DESC LIMIT 5');
        $defenders = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "M" ORDER BY skill DESC LIMIT 4');
        $midfielders = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "S" ORDER BY speed DESC LIMIT 1');
        $striker = $this->resultSet();

        $team = array_merge($goalie,$defenders,$midfielders,$striker);

        return $team;
    }

    private function neutral(){
        $this->query('SELECT * FROM players WHERE position = "G" AND is_injured=0 ORDER BY skill DESC LIMIT 1');
        $goalie = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "D" AND is_injured=0 ORDER BY skill DESC LIMIT 4');
        $defenders = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "M" AND is_injured=0 ORDER BY skill DESC LIMIT 4');
        $midfielders = $this->resultSet();


        $this->query('SELECT * FROM players WHERE position = "S" AND is_injured=0 ORDER BY skill DESC LIMIT 2');
        $strikers = $this->resultSet();

        $team = array_merge($goalie,$defenders,$midfielders,$strikers);

        return $team;
    }

    private function attacking(){

        $this->query('SELECT * FROM players WHERE position = "M" AND is_injured=0 ORDER BY skill DESC LIMIT 5');
        $midfielders = $this->resultSet();

        $this->query('SELECT * FROM players WHERE position = "G" AND is_injured=0 ORDER BY skill DESC LIMIT 1');
        $goalie = $this->resultSet();

        if(empty($goalie)){
            $goalie = $midfielders[4];
        }

        $this->query('SELECT * FROM players WHERE position = "S" AND is_injured=0 ORDER BY skill DESC LIMIT 3');
        $strikers = $this->resultSet();

        if(count($strikers) < 3){
            $strikers[] = $midfielders[4];
        }

        $this->query('SELECT * FROM players WHERE position = "D" AND is_injured=0 ORDER BY skill DESC LIMIT 3');
        $defenders = $this->resultSet();

        array_pop($midfielders);

        $team = array_merge($goalie,$defenders,$midfielders,$strikers);

        return $team;
    }

    private function calculateQuality($squad) {

         $overAllQuality = 0;
        foreach ($squad as $player) {
            $overAllQuality += $player['skill']  * 7;
            $overAllQuality += $player['speed']  * 3;
        }

        return $overAllQuality;
    }

    private function calculateFirstGameResult($squadQuality){
        $homeQuality = $squadQuality;
        $awayQuality = $squadQuality + rand(50,200);

        $gameMax = 1.3 * ($homeQuality + $awayQuality);

        $homeChance = round((100 * $homeQuality)/$gameMax);
        $awayChance = round((100 * $awayQuality)/$gameMax);

        $awayLimit = 100-$awayChance;

        $score = rand(0,100);

        if ($score<$homeChance){
            $winnerStatus = $_SESSION['club'] . " wins";
        } elseif ($score>$awayLimit){
            $winnerStatus = "Real Madrid wins";
        } else {
            $winnerStatus = "Game finished draw";
        }

        return $winnerStatus;
    }

    private function calculateSecondGameResult($squadQuality) {
        $homeQuality = $squadQuality;
        $awayQuality = $squadQuality;
        $gameMax = 1.4 * $squadQuality * 2;

        $homeChance = round((100 * $homeQuality)/$gameMax);
        $awayChance = round((100 * $awayQuality)/$gameMax);

        $awayLimit = 100-$awayChance;

        $score = rand(0,100);

        if ($score<$homeChance){
            $winnerStatus = $_SESSION['club'] . " wins";
        } elseif ($score>$awayLimit){
            $winnerStatus = "Cska Moscow wins";
        } else {
            $winnerStatus = "Game finished draw";
        }

        return $winnerStatus;
    }

    private function calculateThirdGameResult($squadQuality){
        $homeQuality = $squadQuality + rand(50,200);
        $awayQuality = $squadQuality;

        $gameMax = 1.3 * ($homeQuality + $awayQuality);

        $homeChance = round((100 * $homeQuality)/$gameMax);
        $awayChance = round((100 * $awayQuality)/$gameMax);

        $awayLimit = 100-$awayChance;

        $score = rand(0,100);

        if ($score<$homeChance){
            $winnerStatus = $_SESSION['club'] . " wins";
        } elseif ($score>$awayLimit){
            $winnerStatus = "Salzburg wins";
        } else {
            $winnerStatus = "Game finished draw";
        }

        return $winnerStatus;
    }

    private function calculateInjuredPlayer($squad){

        $injured = rand(0,10);

        $injuredPlayer = $squad[$injured];

        $injuredPlayerID = $injuredPlayer['id'];

        $this->query('UPDATE players SET is_injured=1 WHERE id = :injured');
        $this->bind(':injured',$injuredPlayerID);
        $this->execute();

        return $injuredPlayer;
    }

}