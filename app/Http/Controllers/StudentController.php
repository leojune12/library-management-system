<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Services\StudentService;
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
        $query->with([
            'course',
            'yearLevel'
        ]);

        $query->when($request->id_number != 'null', function ($query) use ($request) {
            return $query->where('id_number', 'like', '%' . $request->id_number . '%');
        });

        $query->when($request->name != 'null', function ($query) use ($request) {
            return $query->where('first_name', 'like', '%' . $request->name . '%')->orWhere('last_name', 'like', '%' . $request->name . '%');
        });

        $query->when($request->gender_id != 'null', function ($query) use ($request) {
            return $query->where('gender_id', '=', $request->gender_id);
        });

        $query->when($request->year_level_id != 'null', function ($query) use ($request) {
            return $query->where('year_level_id', '=', $request->year_level_id);
        });

        $query->when($request->course_id != 'null', function ($query) use ($request) {
            return $query->where('course_id', '=', $request->course_id);
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
            'id_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender_id' => 'required',
            'academic_year_id' => 'required',
            'semester_id' => 'required',
            'year_level_id' => 'required',
            'course_id' => 'required',
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
            'id_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender_id' => 'required',
            'academic_year_id' => 'required',
            'semester_id' => 'required',
            'year_level_id' => 'required',
            'course_id' => 'required',
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

            if ($request->reset_subjects) {

                $model->subjects()->detach();
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'title' => 'Success!',
                'message' => 'Item successfully updated.'
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

    public function editStudentSubject($id)
    {
        $model = Student::findOrFail($id);

        return view('pages.student.student_subject', [
            'title' => "Student Subject",
            'method' => 'Update',
            'model' => $model,
        ]);
    }

    public function updateStudentSubject(Request $request, $id)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'subjects.*.pivot.subject_id' => 'required',
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

                $model = Student::findOrFail($id);

                StudentService::updateStudentSubjects($request->subjects, $request->delete_subject_ids);

                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'title' => 'Success!',
                    'message' => 'Subject/s successfully added.'
                ]);
            } catch (Throwable $e) {
                dd($e);
                DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'title' => 'Something went wrong!',
                    'message' => 'Please try again.'
                ]);
            }
        }
    }
}
