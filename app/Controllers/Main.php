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
var $zavod;
var $rokZavodu;
var $vysledek;
var $etapa;

    public function __construct()
    {
        $this->zavod = new Race();
        $this->rokZavodu = new RaceYear();
        $this->vysledek = new Result();
        $this->etapa = new Stage();
    }

    public function index(): string
    {
        return view('welcome_message');
        // join race year a race - pomocí race_id
        $zavod->join('rokZavodu', 'race_id', 'inner')->where('race_id', 83)->findAll();
    }

    public function soupisEtap()
    
    {


    }

    public function etapa()
    {

    }
}


?>