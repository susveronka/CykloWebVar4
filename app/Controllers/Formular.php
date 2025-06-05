<?php

namespace App\Controllers;

use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Stage;
use App\Models\Result;

class Formular extends BaseController
{
    var $race;
    var $result;
    var $stage;
    var $race_year;

    public function __construct()
    { 
        $this->race = new Race();
        $this->race_year = new RaceYear();
        $this->result = new Result(); //
        $this->stage = new Stage();
    }

    public function zmenaVFormulari($idEtapa)
    {
      $data['result'] = $this->result->where('id_stage', $idEtapa)->orderBy('rank', 'ASC')->findAll(10);
        echo view('formular/zmenaVFormulari', $data);
    }
}
