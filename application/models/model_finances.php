<?php

class model_finances extends Model
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
            if (!$income->is_planned) {
                array_push($data, $this->splitObjects($income));
            }
        }
        foreach ($outcomes as $income) {
            if (!$income->is_planned) {
                array_push($data, $this->splitObjects($income, -1));
            }
        }
        return $data;
    }


    private function splitObjects($finance, $sign = 1)
    {
        $type = $this->types->get($finance->type_id);
        return array(
            'Date' => $finance->date,
            'Value' => $finance->value*$sign,
            'Description' => $finance->description,
            'Type' => array(
                'Value' => $type->name,
                'Description' => $type->description
            )
        );
    }

    public function createFinance($user)
    {
        $finance = new Finance();
        if (isset($_POST["Date"]) & isset($_POST["Value"]) & isset($_POST["Type"])) {
            $finance->date = $_POST["Date"];
            $finance->value = $_POST["Value"];
            $type = $this->types->getByColumn('name', $_POST["Type"]);
            if($type == null) {
                $type = new Type();
                $type->name = $_POST["Type"];
                $type->description = "";
                $this->types->save($type);
            }
            $finance->type_id = $type_id;
            $finance->user_id = $user->id;
            $finance->is_planned = false;
        } else {
            (new Route())->ErrorPage404();
        }
        if (isset($_POST["Description"])) {
            $finance->description = $_POST["Description"];
        }

        if (isset($_POST["Is_planned"])) {
            $finance->is_planned = $_POST["Is_planned"];
        }
        return $finance;
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