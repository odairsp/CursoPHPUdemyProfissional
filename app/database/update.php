<?php

function update(string $table, array $fields, array $where)
{
    try {
        if (array_is_list($fields) || array_is_list($where)) {
            throw new Exception("O array não é associativo no update!");
        }

        $sql = "UPDATE {$table} SET ";
        foreach (array_keys($fields) as $field) {
            $sql .= $field . " = :" . $field . ", ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE " . array_keys($where)[0] . " = :" . array_keys($where)[0];


        $data = array_merge($fields, $where);

        $connect = connect();
        $prepared = $connect->prepare($sql);


        $prepared->execute($data);
        return $prepared->rowCount();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}