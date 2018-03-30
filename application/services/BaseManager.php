<?php

/**
 * Class BaseManager
 * contains basic db access methods
 * should be extended for each class type
 *
 * don't forget about if(is_string($value)) $val = "\'".$value."\'";
 */
class BaseManager
{
    protected $db;
    protected $table;
    protected $Class;

    protected function __construct($table, $class)
    {
        $this->Class = $class;
        $this->table = $table;
        $this->db = DataBase::getInstance();
    }


    /**
     *
     * Select single object by id from db
     *
     * @param $id
     * @return mixed|null
     */
    public function get($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id={$id}";
        return $this->executeQuery($sql);
    }

    /**
     *
     * Select all objects from db
     *
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $objects = $this->executeQueryForClassArray($sql, $this->Class);
        return $objects;
    }

    /**
     *
     * Insert or update specified object in db
     * Also updates its id
     *
     * @param $object
     * @return bool|mysqli_result
     */
    public function save($object)
    {
        if ($object == null) return false;
        $withId = isset($object->id);
        $sql = "INSERT INTO {$this->table}(";
        $sql .= $this->getColumnsAsString($object, $withId) . ") ";
        $sql .= "VALUES(" . $this->getValuesAsString($object, $withId) . ") ";
        $sql .= 'ON DUPLICATE KEY UPDATE '; // MySQL
        $sql .= $this->getColumnsWithValuesAsString($object, $withId);
        $res = $this->execute($sql);
        if (!$withId)
            $object->id = $this->db->insert_id;
        return $res;
    }

    /**
     *
     * Delete object by id
     *
     * @param $id
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id={$id}";
        $this->execute($sql);
    }

    /**
     *
     * Select all object by specified column - value
     *
     * @param $column
     * @param $value
     * @return array
     */
    public function getByColumn($column, $value){
        $val = $value;
        if(is_string($value))
            $val = "'".$value."'";
        $sql = "SELECT * FROM {$this->table} where {$column} = {$val}";
        $objects = $this->executeQueryForClassArray($sql, $this->Class);
        return $objects;
    }

    /**
     *
     * Execute specified query
     * Return object
     *
     * @param $sql
     * @return mixed|null
     */
    final protected function executeQuery($sql)
    {
        return $this->executeQueryForClass($sql, $this->Class);
    }

    /**
     *
     * Execute specified query manually
     *
     * @param $sql
     * @return bool|mysqli_result
     */
    final protected function execute($sql)
    {
        error_log("SQL: " . $sql);
        return $this->db->query($sql);
    }

    /**
     * @param $sql
     * @param $class
     * @return mixed|null
     */
    final protected function executeQueryForClass($sql, $class)
    {
        $arr = $this->executeQueryForClassArray($sql, $class);
        if (count($arr) > 0) {
            return $arr[0];
        }
        return null;
    }

    /**
     * @param $sql
     * @param $class
     * @return array
     * Returns simple array of objects
     * @throws DatabaseException
     */
    final protected function executeQueryForClassArray($sql, $class)
    {
        $Objects = array();
        if ($rst = $this->execute($sql)) {
            while ($Object = $rst->fetch_object($class)) {
                $Objects[] = $Object;
            }
            $rst->free();
        } else {
            throw new DatabaseException($sql, $this->db->error, $this->db->errno);
        }
        return $Objects;
    }

    /**
     * @param $sql
     * @return array
     * Returns simple array
     * @throws DatabaseException
     */
    final protected function executeQueryArrayNum($sql)
    {
        $res = array();
        if ($rst = $this->execute($sql)) {
            if ($arr = $rst->fetch_all(MYSQLI_NUM)) {
                foreach ($arr as $ar)
                    foreach ($ar as $obj)
                        $res[] = $obj;
                $rst->free();
            } else {
                throw new DatabaseException($sql, $this->db->error, $this->db->errno);
            }
        } else {
            throw new DatabaseException($sql, $this->db->error, $this->db->errno);
        }
        return $res;
    }

    /**
     * @param $sql
     * @return mixed
     * Returns associative array
     * @throws DatabaseException
     */
    final protected function executeQueryArrayAssoc($sql)
    {
        if ($rst = $this->execute($sql)) {
            if ($arr = $rst->fetch_all(MYSQLI_ASSOC)) {
                $rst->free();
            } else {
                throw new DatabaseException($sql, $this->db->error, $this->db->errno);
            }
        } else {
            throw new DatabaseException($sql, $this->db->error, $this->db->errno);
        }
        return $arr;
    }

    //Reflection methods

    /**
     * @param $object
     * @param array $excludes
     * @return array
     */
    final protected function getColumns($object, $excludes = array())
    {
        $reflect = new ReflectionClass($object);
        $columns = array();
        foreach ($reflect->getProperties() as $prop) {
            if (!in_array($prop->getName(), $excludes)) {
                $val = $prop->getValue($object);
                $columns[$prop->getName()] = is_string($val) ? "'" . $val . "'" : $val;
            }
        }
        return $columns;
    }

    /**
     * @param $object
     * @param $withId
     * @return bool|string
     */
    final protected function getColumnsWithValuesAsString($object, $withId)
    {
        $sql = "";
        $columns = $this->getColumns($object);
        foreach ($columns as $key => $value) {
            if ($withId | $key != "id") {
                $sql .= ", {$key}={$value} ";
            }
        }
        return substr($sql, 1);
    }

    /**
     * @param $object
     * @param $withId
     * @return bool|string
     */
    final protected function getColumnsAsString($object, $withId)
    {
        $sql = "";
        $columns = $this->getColumns($object);
        foreach ($columns as $key => $value) {
            if ($withId | $key != "id") {
                $sql .= ", {$key} ";
            }
        }
        return substr($sql, 1);
    }

    /**
     * @param $object
     * @param $withId
     * @return bool|string
     */
    final protected function getValuesAsString($object, $withId)
    {
        $sql = "";
        $columns = $this->getColumns($object);
        foreach ($columns as $key => $value) {
            if ($withId | $key != "id") {
                $sql .= ", {$value} ";
            }
        }
        return substr($sql, 1);
    }

    public function getClass()
    {
        return $this->Class;
    }

    public function getTable()
    {
        return $this->table;
    }
}
