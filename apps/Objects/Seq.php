<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2016.12.23.
 * Time: 20:44
 */

namespace Objects;


use Models\Seqs;

class Seq
{
    public $current;

    public $name;

    public static function createSeq($name){
        $sModel = new Seqs();
        $seq = $sModel->create($name);

        if(!$seq){
            $seq = new Seqs();
            $seq->name = $name;
            $seq->current = 1;
            $seq->save();
        }else{
            $seq->current += 1;
            $seq->save();
        }
        $call = new Seq();
        return $call->generate($seq);
    }

    public function generate($obj)
    {
        $seq = new Seqs();
        $seq->name = $obj->name;
        $seq->current = $obj->current;
        return $seq;
    }

    public function delete()
    {
        $model = new Seqs();
        $seq = $model->create($this->name);
        if ($seq->delete()) {
            unset($this);
            return true;
        } else {
            return false;
        }
    }

}