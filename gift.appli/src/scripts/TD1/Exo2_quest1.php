<?php
namespace gift\app\scripts\TD1;
use gift\app\models\Prestation;
use Illuminate\Database\Capsule\Manager as DB;

class Exo2_quest1 {
    function getQuest(){
        $db = new DB();
        $db->addConnection(parse_ini_file('src/conf/gift.db.conf.ini.dist'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $prestation = Prestation::all();
        $html = <<<END
            <head>
                <link rel="stylesheet" 
                        href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">            
            </head>
            <body>
                <div>
                <h class="title">Question 1</h><br>
            END;
        foreach ($prestation as $presta){
            $html .= <<<END
                libelle de la prestation : $presta->libelle<br>
                description : $presta->description<br>
                tarix : $presta->tarif € 
            END;
            if (!is_null($presta->unite)){
                $html.="pour $presta->unite<br><br>";
            } else {
                $html.= "<br><br>";
            }
        }
        $html .= "</div>";
        return $html;
    }
}