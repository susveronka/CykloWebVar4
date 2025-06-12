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
        $this->result = new Result();
        $this->stage = new Stage();
        $this->rider = new Rider();
    }

    public function zmenaVFormulari($idResult)
    {
        $rider = $this->result
            ->select('result.*, rider.first_name, rider.last_name')
            ->join('rider', 'rider.id = result.id_rider')
            ->where('result.id', $idResult)
            ->first();

        if (!$rider) {
            return redirect()->to('/')->with('error', 'Rider not found.');
        }

        $data['rider'] = $rider;

        echo view('formular/zmenaVFormulari', $data);
    }

    public function zmena()
    {
        $rank = $this->request->getPost('rank');
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $time = $this->request->getPost('cas');
        $idResult = $this->request->getPost('idResult'); 

        if (!$rank || !$firstName || !$lastName || !$time || !$idResult) {
            return redirect()->back()->with('error', 'Všechna pole musí být vyplněna.');
        }

        $resultData = [
            'rank' => $rank,
            'time' => $time,
        ];

        $this->result->update($idResult, $resultData);

        $riderData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];

        $this->rider->update($this->result->find($idResult)->id_rider, $riderData);

        return redirect()->to(base_url('formular/zmenaVFormulari/' . $idResult))->with('success', 'Výsledky byly úspěšně aktualizovány.');
    }
}
