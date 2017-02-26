<?php

namespace Search;
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.20.
 * Time: 21:21
 */

class SearchBase
{
    public $model;
    public $id;
    public $object;
    public $excludedIds;


    protected function _readSearch(){
        $params=[];
        if($this->id){
            $params['id']=$this->id;
        }
        if(!empty($this->excludedIds)){
            $params['id'] = array('$nin'=>$this->excludedIds);
        }
        return $params;
    }

    public function find(){
        $params = array('conditions'=>$this->_readSearch());
        $results = $this->model->find($params);
        return $results;
    }

    public function findFirst(){
        $params = array('conditions'=>$this->_readSearch());
        $result = $this->model->findFirst($params);
        return $result;
    }

    public function create($id = false){
        $result = !$id?$this->model->create():$this->model->create($id);
        return $result?$this->object->generate($result):false;
    }
}