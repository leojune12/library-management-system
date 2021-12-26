<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ApiService
{
    public function __construct()
    {
        //
    }

    public static function tableItems(
        $table = '',
        $search = '',
        $field = 'name',
        $isFullName = false,
        $defaultValue = null
    ) {
        $fullNameFields = [
            'first_name',
            'middle_name',
            'last_name'
        ];

        if (!!$defaultValue) {

            $query = DB::table($table);

            if ($isFullName) {

                $query->selectRaw('id, first_name, CONCAT(first_name, " ", middle_name, " ", last_name) as full_name');
            } else {

                $query->select(['id', $field]);
            }

            $query->whereNull('deleted_at');

            $item = [$query->find($defaultValue)];

            return $item;
        } else {

            $orderBy = $isFullName ? 'first_name' : $field;
            $orderType = "ASC";
            $limit = 12;
            $query = DB::table($table);
            $search = '%' . $search . '%';

            if ($isFullName) {

                if (!!$search) {

                    foreach ($fullNameFields as $key => $value) {

                        if (!$key) {

                            $query->where($value, 'like', $search);
                        } else {

                            $query->orWhere($value, 'like', $search);
                        }
                    }
                }

                $query->selectRaw('id, first_name, CONCAT(first_name, " ", middle_name, " ", last_name) as full_name');
            } else {

                if (!!$search) {

                    $query->where($field, 'like', $search);
                }

                $query->select(['id', $field]);
            }

            $query->orderBy($orderBy, $orderType);
            $query->limit($limit);
            // $query->groupBy($field);
            $query->whereNull('deleted_at');

            return $query->get();
        }
    }

    // public static function dropdownItems($array = '')
    // {
    //     $data = [];

    //     foreach (DropdownService::get_static($array) as $key => $value) {
    //         array_push($data, [
    //             'id' => $key,
    //             'value' => $value,
    //         ]);
    //     }

    //     return $data;
    // }

    public static function tableDropdownItems($table = null, $primaryKey = null, $field = null, $whereColumn = null, $whereColumnId = null)
    {
        if ($table) {

            $pk = $primaryKey ? $primaryKey . ' as id' : 'id';

            $query = DB::table($table);

            if ($whereColumn && $whereColumnId) {

                $query->where($whereColumn, $whereColumnId);
            }

            if ($field) {

                $query->select([$pk, $field . ' as value']);
                $query->orderBy($field, 'ASC');
            } else {

                $query->select([$pk, 'name as value']);
                $query->orderBy('name', 'ASC');
            }

            if (Schema::hasColumn($table, 'deleted_at')) {

                $query->whereNull('deleted_at');
            }

            return $query->get();
        }
    }
}
