<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2017.01.28.
 * Time: 21:22
 */

namespace Search;


use Models\Genders;
use Objects\Gender;

class GenderSearch extends SearchBase
{
    public $id;
    public $type;
    public $name;

    public static function createGenderSearch(){
        $GenderSearch = new GenderSearch();
        $GenderSearch->model = new Genders();
        $GenderSearch->object = new Gender();
        return $GenderSearch;
    }

    public function _readSearch(){
        $params=parent::_readSearch();
        if($this->type){
            $params['type']=$this->type;
        }
        if($this->name){
            $params['name']=$this->name;
        }
        return $params;

    }
}
