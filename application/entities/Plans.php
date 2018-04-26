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
        $this->date = $plans->date;
        $this->value = $plans->value;
        $this->description = $plans->description;
        $this->is_planned = $plans->is_planned;
        $this->user_id = $plans->user_id;
        $this->goal= $plans->goal;

    }

}