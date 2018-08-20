<?php
namespace App\Controllers;

use App\Classes\Controller;
use App\Models\PlayerModel;

class Player extends Controller {

    protected function Index(){
        if(isset($_POST['club'])) {
            $_SESSION['club'] = $_POST['club'];
        }
        $viewModel = new PlayerModel();
        $this->returnView($viewModel->index(),true);
    }

    public function autogenerate(){
        $viewModel = new PlayerModel();
        $this->returnView($viewModel->addGeneratedPlayers(),true);
    }

    public function add(){
        $viewModel = new PlayerModel();
        if(count($viewModel->addPlayer()) < 22){
            $this->returnView($viewModel->addPlayer(),true);
        } else {
            $this->teamCompleted();
        }

    }

    public function teamCompleted(){
        $viewModel = new PlayerModel();
        $this->returnView($viewModel->returnPlayers(),true);
    }


}