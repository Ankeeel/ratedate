<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 20:40
 */

namespace Models;


use Phalcon\Mvc\Collection;

class Seqs extends Collection
{
    public $current;
    public $name;

    public function create($name = false){
        if($name){
            return $this->findFirst(['conditions'=>[
                'name'=> $name
            ]]);
        }
        return $this;
    }
}