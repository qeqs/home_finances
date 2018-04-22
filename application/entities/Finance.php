<?php

class Finance
{
    var $id;
    var $date;
    var $value;
    var $description;
    var $type_id;
    var $is_planned;
    var $user_id;

    public function fromFinance($finance){

        $this->date = $finance->date;
        $this->value = $finance->value;
        $this->description = $finance->description;
        $this->is_planned = $finance->is_planned;
        $this->user_id = $finance->user_id;
    }

}