<?php

function delete(string $table, array $where)
{

    try {
        if (array_is_list($where)) {
            throw new Exception("O array não é associativo no delete!");
        }
        $sql = "DELETE FROM {$table} WHERE ";
        $sql .= array_keys($where)[0] . " = :" . array_keys($where)[0];

        $connect = connect();
        $prepared = $connect->prepare($sql);
        $prepared->execute($where);

        return $prepared->rowCount();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}