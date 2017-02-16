<?php
/**
 * Created by PhpStorm.
 * User: Richárd
 * Date: 2017.01.28.
 * Time: 21:21
 */

namespace Objects;


use Models\Genders;

class Gender
{
    public $id;
    public $type;
    public $name;

    public function generate($obj)
    {
        $gender = new Gender();
        $gender->id = $obj->id;
        $gender->type = $obj->type;
        $gender->name = $obj->name;
    }

    public function save()
    {
        $model = new Genders();
        $gender = $model->create($this->id);
        $gender->type = $this->type;
        $gender->name = $this->name;
    }
}