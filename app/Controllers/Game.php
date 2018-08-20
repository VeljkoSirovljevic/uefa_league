<?php
/**
 * Created by PhpStorm.
 * User: veljko
 * Date: 8/19/2018
 * Time: 2:25 PM
 */

namespace App\Controllers;

use App\Classes\Controller;
use App\Models\GameModel;

class Game extends Controller {

    public function index(){
        $viewModel = new GameModel();
        $this->returnView($viewModel->GameOne(),true);
    }

    public function gametwo(){
        $viewModel = new GameModel();
        $this->returnView($viewModel->GameTwo(),true);
    }

    public function gamethree(){
        $viewModel = new GameModel();
        $this->returnView($viewModel->GameThree(),true);
    }

    public function newteam(){
        $viewModel = new GameModel();
        $this->returnView($viewModel->newTeam(),true);
    }
}