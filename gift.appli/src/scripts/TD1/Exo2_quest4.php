<?php
namespace gift\app\scripts\TD1;
use gift\app\models\Box;
use Illuminate\Database\Capsule\Manager as DB;

class Exo2_quest4 {
    function getQuest(){
        $db = new DB();
        $db->addConnection(parse_ini_file('/Users/lucarafe/Downloads/gift/gift.appli/src/conf/gift.db.conf.ini.dist'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $box = Box::where('id', '360bb4cc-e092-3f00-9eae-774053730cb2')->first();


        $html = <<<END
                <div>
                <h class="title">Question 4</h><br>
            END;
        $html .= <<<END
                libelle de la prestation : $box->libelle<br>
                description : $box->description<br>
                tarix : $box->montant €<br><br>
            END;
        $html .= "</div>";
        return $html;
    }
}