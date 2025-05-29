<?php

namespace App\Controllers;

use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Result;
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
#-  příjmení
#-  čas a pořadí v etapě

class Main extends BaseController
{
var $race;
var $race_year;
var $result;
var $stage;

    public function __construct()
    {
        $this->race = new Race();
        $this->race_year = new RaceYear();
        $this->result = new Result();
        $this->stage = new Stage();
    }

    public function index()
    {
        
        // join race year a race - pomocí race_id
        $data = $this->race->join('race_year', 'race.id = race_year.id_race', 'inner')->where('race.id', 83)->findAll();

        echo view("index", $data);
    }

    public function soupisEtap()
    
    {

echo view('soupisEtap');

    }

    public function etapa()
    {

    }
}


?>