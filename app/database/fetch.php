<?php

function all($table, $fields = "*")
{
    try {
        $connect = connect();
        $query = $connect->query("select {$fields} from {$table}");

        return $query->fetchAll();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function findBy($table, $field, $value, $fields = '*')
{
    try {
        $connect = connect();

        $prepared = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
        $prepared->execute([
            $field => $value
        ]);
        return $prepared->fetch();
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}
