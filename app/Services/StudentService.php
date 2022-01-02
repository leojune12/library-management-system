<?php

namespace App\Services;

use App\Models\StudentSubject;
use Illuminate\Support\Facades\DB;

class StudentService
{
    public function __construct()
    {
    }

    public static function updateStudentSubjects($student_subjects, $delete_subject_ids)
    {
        if (!empty($student_subjects)) {

            foreach ($student_subjects as $student_subject) {

                if (!empty(array_filter($student_subject['pivot']))) {

                    $student_subject_collection = StudentSubject::find($student_subject['pivot']['id'] ?? 0);

                    if (isset($student_subject_collection)) {

                        StudentService::updateStudentSubjectItem($student_subject_collection, $student_subject['pivot']);
                    } else {

                        StudentService::createStudentSubjectItem($student_subject['pivot']);
                    }
                }
            }
        }

        StudentSubject::destroy($delete_subject_ids);
    }

    private static function createStudentSubjectItem($student_subject)
    {
        StudentSubject::create($student_subject);
    }

    private static function updateStudentSubjectItem($student_subject_collection, $student_subject)
    {
        $student_subject_collection->fill($student_subject);

        if ($student_subject_collection->isDirty()) {

            $student_subject_collection->save();
        }
    }
}
