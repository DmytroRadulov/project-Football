<?php

function dbSelect(Tables $table, string $columns = '*', string $conditions = null, string $order = null, bool $isSingle = false)
{
    $query  = "SELECT {$columns} FROM {$table->value}";
    $query .= $conditions ? " WHERE {$conditions}" : "";
    $query .= $order ? " ORDER BY {$order}" : "";

    $query = DB::connect()->prepare($query);
    $query->execute();

    return $isSingle ? $query->fetch() : $query->fetchAll();
}

function dbFind(Tables $table, string $id)
{
    $query = DB::connect()->prepare("SELECT * FROM {$table->value} WHERE id = :id");
    $query->bindParam('id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch();
}


