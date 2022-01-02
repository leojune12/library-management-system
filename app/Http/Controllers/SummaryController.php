<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public $title = 'Summary of Enrollment';

    public function index(Request $request)
    {
        $academic_year = $request->academic_year_id && $request->academic_year_id != 'null' ? $request->academic_year_id : AcademicYear::get('id')->last()['id'];

        $semester = $request->semester_id && $request->semester_id != 'null' ? $request->semester_id : Semester::get('id')->last()['id'];

        $items = [];

        $courses = Course::all();

        foreach ($courses as $course) {

            $year_levels = YearLevel::all();

            foreach ($year_levels as $year_level) {

                $male_students = Student::where("year_level_id", $year_level->id)
                    ->where("course_id", $course->id)
                    ->where("gender_id", 1)
                    ->where("academic_year_id", $academic_year)
                    ->where("semester_id", $semester)
                    ->count();

                $female_students = Student::where("year_level_id", $year_level->id)
                    ->where("course_id", $course->id)
                    ->where("gender_id", 2)
                    ->where("academic_year_id", $academic_year)
                    ->where("semester_id", $semester)
                    ->count();

                $items[$course->name][$year_level->name] = [
                    "male" => $male_students,
                    "female" => $female_students,
                    "total" => $male_students + $female_students
                ];
            }
        }

        $total["males"] = Student::where("gender_id", 1)
            ->where("academic_year_id", $academic_year)
            ->where("semester_id", $semester)
            ->count();
        $total["females"] = Student::where("gender_id", 2)
            ->where("academic_year_id", $academic_year)
            ->where("semester_id", $semester)
            ->count();
        $total["students"] = Student::where("academic_year_id", $academic_year)
            ->where("semester_id", $semester)
            ->count();

        $academic_year_collection = AcademicYear::find($academic_year);
        $semester_collection = Semester::find($semester);

        return view('pages.summary.index', [
            'title' => $this->title,
            'courses' => $items,
            'total' => $total,
            'academic_year' => $academic_year_collection->name,
            'semester' => $semester_collection->name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
