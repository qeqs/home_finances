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
        $date = $finance->date;
        $value = $finance->value;
        $description = $finance->description;
        $is_planned = $finance->is_planned;
        $user_id = $finance->user_id;
    }

}