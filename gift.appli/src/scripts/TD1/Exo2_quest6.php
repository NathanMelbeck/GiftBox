<?php
namespace gift\app\scripts\TD1;
use gift\app\models\Box;
use Illuminate\Database\Capsule\Manager as DB;

class Exo2_quest6 {
    function getQuest(){
        $db = new DB();
        $db->addConnection(parse_ini_file('/Users/lucarafe/Downloads/gift/gift.appli/src/conf/gift.db.conf.ini.dist'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $box = new Box;
        $box->nom = 'Ma box';
        $box->description = 'Description de ma box';
        $box->prix = 99.99;
        $box->save();


        $html = <<<END
                <div>
                <h class="title">Question 6</h><br>
            END;


        $html .= "</div>";
        return $html;
    }
}