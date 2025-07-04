<?php

namespace App\Controllers;

use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Result;
use App\Models\Rider;
use App\Models\Stage;

#Vypište všechny ročníky závodu La Tropicale Amissa Bongo(id race=83), které máme v databázi. 
#U každého ročníku bude uvedena celková délka závodu (součet délek všech etap), datum začátku a konce.
#a následně odkaz na jednotlivé  etapy, kam vložíte start a cíl etapy, datum etapy, délku etapy a výsledky prvních deseti závodníků  etapě.

#Vytvoříte rovněž formulář, který umožní editovat výsledky etapy
# - bude možno měnit jméno a příjmení závodníka, čas závodníka v etapě a pořadí v etapě (to poslední dropdownem)


#1 - index.php - tabůlka -  s roky závodu u nich délka závodu (součet všech etap), datum začátku a konce
#2 rozklik na na seznam etap vybraného roku
#3 jednotlivá etapa 
#-  start etapy
#-  cíl etapy
#-  datum etapy, délku etapy s výsledek prvních 10 závodníků

#4 - formulář na editování výsledku etapy  -změny
# -  jména
#-  čas 
# pořadí v etapě

class Main extends BaseController
{
    var $race;
    var $race_year;
    var $result;
    var $stage;
    var $rider;

    public function __construct()
    {
        $this->race = new Race();
        $this->race_year = new RaceYear();
        $this->result = new Result();
        $this->stage = new Stage();
        $this->rider = new Rider();
    }

    public function index()
    {

        $race_year = $this->race_year->where('id_race', 83)->orderBy('year','asc')->findAll();
        $stage = $this->stage->findAll();

        $data = [
            'race_year' => $race_year,
            'stage' => $stage,
        ];

        echo view("index", $data);
    }

    public function soupisEtap($idRocnik)
    
    {
        $stage = $this->stage->where('id_race_year', $idRocnik)->findAll();
        $race_year = $this->race_year->find($idRocnik);

        $data = [
            'stage' => $stage,
            'race_year' => $race_year,
        ];

        echo view('soupisEtap', $data);

    }

public function etapa($idEtapa) {
    $stage = $this->stage->find($idEtapa);
    $result = $this->result
        ->select('result.*, rider.first_name, rider.last_name')
        ->join('rider', 'rider.id = result.id_rider')
        ->where('result.id_stage', $idEtapa)
        ->where('result.type_result', 1)
        ->orderBy('result.rank', 'ASC')
        ->findAll(10);

    if (!$stage) {
        return redirect()->to('/soupisEtap')->with('error', 'Stage not found');
    }

    $data = [
        'stage' => [$stage],
        'result' => $result,
    ];

    echo view('etapa', $data);
}
}
