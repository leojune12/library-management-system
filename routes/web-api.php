<?php

use App\Models\CityMunicipality;
use App\Models\Course;
use App\Models\Department;
use App\Models\EducationalLevel;
use App\Models\Province;
use App\Models\Region;
use App\Models\YearLevel;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::prefix('api')->group(function () {

        Route::post('table-items',  function (Request $request) {

            return ApiService::tableItems(
                $request->table,
                $request->search,
                $request->field,
                $request->isFullName,
                $request->defaultValue
            );
        });

        Route::post('dropdown-items',  function (Request $request) {

            return ApiService::dropdownItems(
                $request->array
            );
        });

        Route::post('table-dropdown-items',  function (Request $request) {

            return ApiService::tableDropdownItems(
                $request->table,
                $request->primaryKey,
                $request->field,
                $request->whereColumn,
                $request->whereColumnId,
            );
        });

        Route::post('table-multi-where-dropdown-items',  function (Request $request) {

            return ApiService::tableMultiWhereDropdownItems(
                $request->table,
                $request->field,
                $request->whereQuery,
            );
        });
    });
});
