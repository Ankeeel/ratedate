<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2017.01.28.
 * Time: 21:17
 */

namespace Models;



use Objects\Seq;
use Phalcon\Mvc\Collection;

class Genders extends Collection
{
    public function create($id = false){
        if($id){
            $found = Genders::findFirst(array("conditions" => array(
                'id' => $id
            )));
            return $found;
        }

        $seq = Seq::createSeq('gender');
        $genders = new Genders();
        $genders->id = $seq->current;
        $genders->save();
        return $genders;
    }
}