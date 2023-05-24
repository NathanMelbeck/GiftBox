<?php
namespace gift\app\scripts\TD1;
use gift\app\models\Prestation;
use Illuminate\Database\Capsule\Manager as DB;

class Exo2_quest2 {
    function getQuest(){
        $db = new DB();
        $db->addConnection(parse_ini_file('/Users/lucarafe/Downloads/gift/gift.appli/src/conf/gift.db.conf.ini.dist'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $prestation = Prestation::with('categorie')->get();

        $html = <<<END
                <div>
                <h class="title">Question 2</h><br>
            END;
        foreach ($prestation as $presta){
            $html .= <<<END
                libelle de la prestation : $presta->libelle<br>
                description : $presta->description<br>
                categorie : {$presta->categorie->libelle}<br>

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