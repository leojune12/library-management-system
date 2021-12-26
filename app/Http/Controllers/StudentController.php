<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class StudentController extends Controller
{
    public $title = 'Student';

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajaxHandler($request);
        }

        return view('pages.student.index', [
            'title' => $this->title,
        ]);
    }

    public function ajaxHandler($request)
    {
        $query = Student::whereNull('deleted_at');

        $this->queryHandler($query, $request);

        $query->orderBy($request->orderBy ?? 'id', $request->orderType ?? 'DESC');

        return $query->paginate($request->perPage);
    }

    public function queryHandler($query, $request)
    {
        $query->when($request->id_number != 'null', function ($query) use ($request) {
            return $query->where('id_number', 'like', '%' . $request->id_number . '%');
        });

        $query->when($request->first_name != 'null', function ($query) use ($request) {
            return $query->where('first_name', 'like', '%' . $request->first_name . '%');
        });

        $query->when($request->last_name != 'null', function ($query) use ($request) {
            return $query->where('last_name', 'like', '%' . $request->last_name . '%');
        });
    }

    public function create()
    {
        return view('pages.student.form', [
            'title' => $this->title,
            'method' => 'Create',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'title' => 'Whoops!',
                'message' => 'Please complete the form.',
                'errors' => $validator->errors(),
                'old' => $request->all(),
            ]);
        }

        DB::beginTransaction();

        try {

            $model = Student::create($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Item successfully created.'
            ]);
        } catch (Throwable $e) {

            //return $e;
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'title' => 'Something went wrong!',
                'message' => 'Please try again.'
            ]);
        }
    }

    public function show($id)
    {
        $model = Student::findOrFail($id);

        return view('pages.student.show', [
            'title' => $this->title,
            'model' => $model,
        ]);
    }

    public function edit($id)
    {
        $model = Student::findOrFail($id);

        return view('pages.student.form', [
            'title' => $this->title,
            'method' => 'Update',
            'model' => $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Student::findOrFail($id);

        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'title' => 'Whoops!',
                'message' => 'Please complete the form.',
                'errors' => $validator->errors(),
                'old' => $request->all(),
            ]);
        }

        DB::beginTransaction();

        try {

            $model->update($request->all());

            DB::commit();

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Item successfully created.'
            ]);
        } catch (Throwable $e) {

            // return $e;
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'title' => 'Something went wrong!',
                'message' => 'Please try again.'
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            Student::destroy($request->id_array);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Item deleted successfully.'
            ]);
        } catch (Throwable $e) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Whoops! Something went wrong. Please try again.'
            ]);
        }
    }
}
