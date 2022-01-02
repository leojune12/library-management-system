<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DropdownService
{
    public function __construct()
    {
    }

    public static function get_static($name, $key = false)
    {
        $result = [];

        switch ($name) {

            case 'boolean':
                $result = [
                    '1' => 'Yes',
                    '0' => 'No',
                ];
                break;

            case 'gender':
                $result = [
                    // '0' => 'Select Gender',
                    '1' => 'Male',
                    '2' => 'Female',
                ];
                break;

            default:
                $result = [];
        }

        if ($key !== false) {

            return $key ? $result[$key] : "N/A";
        } else {

            return $result;
        }
    }

    public static function get_dynamic($table, $id, $field = "name")
    {
        $query = DB::table($table)->whereNull('deleted_at');

        $row = $query->find($id);

        return $row->$field;
    }
}
