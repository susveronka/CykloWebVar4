<?php

namespace App\Controllers;

use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Stage;
use App\Models\Result;
use App\Models\Rider;

class Formular extends BaseController
{
    var $race;
    var $result;
    var $stage;
    var $race_year;
    var $rider;

    public function __construct()
    { 
        $this->race = new Race();
        $this->race_year = new RaceYear();
        $this->result = new Result(); //
        $this->stage = new Stage();
        $this->rider = new Rider();
    }

    public function zmenaVFormulari($idEtapa)
    {
     # $data['rider'] = $this->rider->findAll();
     # $data['stage'] = $this->stage->find($idEtapa);

      $data['poradiMoznosti'] = range(1, 10); // Příklad pro 10 závodníků

      $data['rider'] = $this->rider->select('rider.*, stage.*')
          ->join('stage', 'rider.id = stage.id')
          ->findAll();
      echo view('formular/zmenaVFormulari', $data);
      
      #$data['result'] = $this->result->where('id_stage', $idEtapa)->orderBy('rank', 'ASC')->findAll(10);
      #echo view('formular/zmenaVFormulari', $data);
    }
}
