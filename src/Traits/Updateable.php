<?php

namespace PedramDavoodi\MultiUpdate\Traits;

use Illuminate\Support\Facades\DB;

Trait MultiUpdateable{

    /**
     * Perform a multi-row update on the model's table based on the given parameters.
     *
     * @param array $params An associative array where the keys are the names of the columns to update,
     *                      and the values are nested associative arrays where the keys are the new values to set,
     *                      and the values are the conditions to match for each new value.
     * @return int|bool The number of rows affected by the update query, or false if an error occurred.
     */
    public static function updateMultipleRows($params)
    {
        try {
            $table = (new static)->getTable();
            $query = "UPDATE $table SET";
            foreach ($params as $field => $param) {
                $query .= " $field = CASE";
                foreach ($param as $value => $condition) {
                    $query .= " WHEN $condition THEN '$value' ";
                }
                $query .= " ELSE $field END,";
            }
            return DB::update(rtrim($query, ','));
        } catch (\Throwable $exception) {
            return false;
        }
    }
}
