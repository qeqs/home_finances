<?php

class model_plans extends Model
{
    private $incomes;
    private $outcomes;
    private $types;


    public function getFullTable($user)
    {
        $incomes = $this->incomes->getByColumn("user_id", $user->id);
        $outcomes = $this->outcomes->getByColumn("user_id", $user->id);

        $data = array();
        foreach ($incomes as $income) {
            if ($income->is_planned) {
                array_push($data, $this->splitObjects($income));
            }
        }
        foreach ($outcomes as $income) {
            if ($income->is_planned) {
                array_push($data, $this->splitObjects($income, -1));
            }
        }
        return $data;
    }


    private function splitObjects($plans, $sign = 1)
    {
        $type = $this->types->get($plans->type_id);
        return array(
            'Date' => $plans->date,
            'Value' => $plans->value*$sign,
            'Description' => $plans->description,
            'Type' => array(
                'Value' => $type->name,
                'Description' => $type->description
            )
        );
    }

    /**
     * @return IncomeManager
     */
    public function getIncomes()
    {
        return $this->incomes;
    }

    /**
     * @param IncomeManager $incomes
     */
    public function setIncomes($incomes)
    {
        $this->incomes = $incomes;
    }

    /**
     * @return OutcomeManager
     */
    public function getOutcomes()
    {
        return $this->outcomes;
    }

    /**
     * @param OutcomeManager $outcomes
     */
    public function setOutcomes($outcomes)
    {
        $this->outcomes = $outcomes;
    }

    /**
     * @return TypeManager
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param TypeManager $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }


    public function __construct()
    {
        $this->incomes = new IncomeManager();
        $this->outcomes = new OutcomeManager();
        $this->types = new TypeManager();
    }


}