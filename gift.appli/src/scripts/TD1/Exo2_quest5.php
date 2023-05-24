<?php
namespace gift\app\scripts\TD1;
use gift\app\models\Box;
use Illuminate\Database\Capsule\Manager as DB;

class Exo2_quest5 {
    function getQuest(){
        $db = new DB();
        $db->addConnection(parse_ini_file('/Users/lucarafe/Downloads/gift/gift.appli/src/conf/gift.db.conf.ini.dist'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $box = Box::where('id', '360bb4cc-e092-3f00-9eae-774053730cb2')->first();
        $prestation = $box->possedePrestation()->get();

        $html = <<<END
                <div>
                <h class="title">Question 5</h><br>
            END;
        $html .= <<<END
                libelle de la prestation : $box->libelle<br>
                description : $box->description<br>
                tarix : $box->montant €<br><br>
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