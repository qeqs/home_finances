<?php

class Plans
{
    var $id;
    var $date;
    var $value;
    var $description;
    var $type_id;
    var $is_planned;
    var $user_id;
    var $goal;

    public function fromPlans($plans){
        $date = $plans->date;
        $value = $plans->value;
        $description = $plans->description;
        $is_planned = $plans->is_planned;
        $user_id = $plans->user_id;
        $goal = $plans ->goal;

    }

}