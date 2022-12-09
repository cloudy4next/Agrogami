<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\School;
use App\Models\Branch;
use Response;




class StudentController extends Controller
{

    public function admissionFrom(Request $request)
    {
        $branches = Branch::all();

        return view('admin.admission', compact('branches'));
    }


    public function admissionFromSave(Request $request)
    {

        $response = [
            'errorStatus' => false,
            'message' => '',
            'errors' => [
                'error' => ''
            ]
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'f_mobile' => 'required',
            'mother_name' => 'required',
            'm_mobile' => 'required',
            'permanent_address' => 'required',
            'local_address' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'gender' => 'required',
            'school_name' => 'required',
            'roll' => 'required',
            'shift' => 'required',
            'ssc_roll' => 'required',
            'registration' => 'required',
            'passing_year' => 'required',

        ]);

        if ($validator->fails()) {
            return [
                'errorStatus' => true,
                'message' => 'The field is required',
                'errors' => [
                    'error' => ''
                ]
            ];
        }


        $uploadFiles = $request->file('fileToUpload');
        $attachments = [];

        if ($uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                $destinationPath    = 'uploads/studentPhoto';
                $file_name          = $destinationPath . '/' . time() . '-' . str_replace(' ', '', $uploadFile->getClientOriginalName());
                $attachments[] = $file_name;
                $uploadFile->move($destinationPath, $file_name);
            }
        }


        $newStudent = new Student();
        $newStudent->name = $request->name;
        $newStudent->dob = $request->dob;
        $newStudent->uuid = Str::uuid();
        $newStudent->gender = $request->gender;
        $newStudent->father_name = $request->father_name;
        $newStudent->mother_name = $request->mother_name;
        $newStudent->f_mobile = $request->f_mobile;
        $newStudent->m_mobile = $request->m_mobile;
        $newStudent->permanent_address = $request->permanent_address;
        $newStudent->local_address = $request->local_address;
        $newStudent->religion = $request->religion;
        $newStudent->blood_group = $request->blood_group;
        $newStudent->branch_id = 1; //$request->branch_id;
        $newStudent->path = json_encode($attachments);
        $newStudent->save();


        $newStudentId = $newStudent->id;


        $newStudentSchool = new School();
        $newStudentSchool->student_id = $newStudentId;
        $newStudentSchool->name = $request->school_name;
        $newStudentSchool->roll = $request->roll;
        $newStudentSchool->shift = $request->shift;
        $newStudentSchool->ssc_roll = $request->ssc_roll;
        $newStudentSchool->registration = $request->registration;
        $newStudentSchool->passing_year = $request->passing_year;
        $newStudentSchool->save();

        return $response;
        // dd($request->all());
    }
}
