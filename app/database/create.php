<?php

function create(string $table, array $data)
{

    try {
        if (array_is_list($data)) {
            throw new Exception("O array não é associativo no create!");
        }

        $sql = "INSERT INTO {$table}";
        $sql .= "(" . implode(', ', array_keys($data)) . ") ";
        $sql .= "VALUES(:" . implode(', :', array_keys($data)) . ");";

        $connect = connect();
        $prepared = $connect->prepare($sql);

        return $prepared->execute($data);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}