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
     * @param string ...$conditions A variable-length argument list of conditions to apply to the update statement Each condition should be a string in the format of a valid SQL WHERE clause.
     * @return int|bool The number of rows affected by the update query, or false if an error occurred.
     */
    public static function updateMultipleRows(array $params , string ...$conditions)
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
            $query = rtrim($query, ',');

            $where = '';
            foreach ($conditions as $condition)
                $where .= $condition .' AND ';
            $where = rtrim($where, ' AND ');

            return DB::update(empty($where) ? $query : $query . " WHERE " . $where);
        } catch (\Throwable $exception) {
            return false;
        }
    }
}
