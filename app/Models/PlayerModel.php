<?php
namespace App\Models;

use App\Classes\Model;
use App\Classes\Messages;

class PlayerModel extends Model {

    public function index(){
        return $this->returnPlayers();
    }

    public function addGeneratedPlayers(){

        if(!count($this->returnPlayers())){
            $this->query('INSERT INTO players (firstname, lastname, position, skill, speed, is_injured) VALUES
                      ("Milan","Borjan", "G" , 9, 6 , 0 ),
                      ("Zoran","Popovic", "G" , 7, 6 , 0 ),
                      ("Filip","Stojkovic", "D" , 9, 6 , 0 ),
                      ("Vujadin","Savic", "D" , 8, 6 , 0 ),
                      ("Marko","Gobeljic", "D" , 7, 7 , 0 ),
                      ("Milos","Degenek", "D" , 8, 7 , 0 ),
                      ("Marko","Gobeljic", "D" , 7, 7 , 0 ),
                      ("Srdjan","Babic", "D" , 6, 6 , 0 ),
                      ("Slavoljub","Srnic", "M" , 8, 8 , 0 ),
                      ("Nemanja","Milic", "M" , 8, 6 , 0 ),
                      ("Branko","Jovicic", "M" , 8, 6 , 0 ),
                      ("Nemanja","Radonjic", "M" , 9, 9 , 0 ),
                      ("Nenad","Krsticic", "M" , 8, 7 , 0 ),
                      ("Lorenzo","Ebecilio", "M" , 10, 6 , 0 ),
                      ("Veljko","Simic", "M" , 8, 7 , 0 ),
                      ("Ivan","Ilic", "M" , 6, 8 , 0 ),
                      ("Milan","Jevtovic", "M" , 7, 5 , 0 ),
                      ("Dusan","Jovancic", "M" , 6, 6 , 0 ),
                      ("El Fardou","Ben", "S" , 9, 7 , 0 ),
                      ("Milan","Pavkov", "S" , 8, 9 , 0 ),
                      ("Dejan","Joveljic", "S" , 7, 6 , 0 ),
                      ("Veljko","Sirovljevic", "S" , 5, 5 , 0 )
                      ');
            $this->execute();
        }

        return $this->returnPlayers();
    }


    public function addPlayer(){

            if(count($this->returnPlayers()) < 22){
                if( !empty($_POST) && $_POST['submit']){
                    switch($_POST['position']) {
                        case "G":
                        $this->query('SELECT * FROM players WHERE position = "G"');
                            $rows = $this->resultSet();
                            if (count($rows) < 2) {
                               $this->query('INSERT INTO players (firstname, lastname, position, skill, speed, is_injured) VALUES
                                            (:fname,:lname,:pos,:skill,:speed, 0)');
                                $this->bind(':fname', $_POST['fname']);
                                $this->bind(':lname', $_POST['lname']);
                                $this->bind(':pos', $_POST['position']);
                                $this->bind(':skill', $_POST['skill']);
                                $this->bind(':speed', $_POST['speed']);
                                $this->execute();
                            } else {
                            Messages::setMsg('You have reached max number of goalies', 'error');
                            }
                        break;
                        case "D" :
                            $this->query('SELECT * FROM players WHERE position = "D"');
                            $rows = $this->resultSet();
                            if (count($rows) < 6) {
                                $this->query('INSERT INTO players (firstname, lastname, position, skill, speed, is_injured) VALUES
                                            (:fname,:lname,:pos,:skill,:speed, 0)');
                                $this->bind(':fname', $_POST['fname']);
                                $this->bind(':lname', $_POST['lname']);
                                $this->bind(':pos', $_POST['position']);
                                $this->bind(':skill', $_POST['skill']);
                                $this->bind(':speed', $_POST['speed']);
                                $this->execute();
                            } else {
                                Messages::setMsg('You have reached max number of defenders', 'error');
                            }
                            break;
                        case "M":
                            $this->query('SELECT * FROM players WHERE position = "M"');
                            $rows = $this->resultSet();
                            if (count($rows) < 10) {
                                $this->query('INSERT INTO players (firstname, lastname, position, skill, speed, is_injured) VALUES
                                            (:fname,:lname,:pos,:skill,:speed, 0)');
                                $this->bind(':fname', $_POST['fname']);
                                $this->bind(':lname', $_POST['lname']);
                                $this->bind(':pos', $_POST['position']);
                                $this->bind(':skill', $_POST['skill']);
                                $this->bind(':speed', $_POST['speed']);
                                $this->execute();
                            } else {
                                Messages::setMsg('You have reached max number of midfielders', 'error');
                            }
                            break;
                        case "S":
                            $this->query('SELECT * FROM players WHERE position = "S"');
                            $rows = $this->resultSet();
                            if (count($rows) < 4) {
                                $this->query('INSERT INTO players (firstname, lastname, position, skill, speed, is_injured) VALUES
                                            (:fname,:lname,:pos,:skill,:speed, 0)');
                                $this->bind(':fname', $_POST['fname']);
                                $this->bind(':lname', $_POST['lname']);
                                $this->bind(':pos', $_POST['position']);
                                $this->bind(':skill', $_POST['skill']);
                                $this->bind(':speed', $_POST['speed']);
                                $this->execute();
                            } else {
                                Messages::setMsg('You have reached max number of strikers', 'error');
                            }
                            break;
                    }
                }
            } else {
                if (!isset($_SESSION['teamCompleted'])) {
                    $_SESSION['teamCompleted'] = true;
                }
            }
        return $this->returnPlayers();
    }

    public function returnPlayers(){
        $this->query('SELECT * FROM players ORDER BY position DESC');
        $rows = $this->resultSet();
        return $rows;
    }

}