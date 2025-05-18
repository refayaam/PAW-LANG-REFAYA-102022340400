<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

// TODO: Import the Student model and the StudentResource
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function index()
    {
        // TODO: Retrieve all Student data
        $students = Student::all();

        return new StudentResource(true, 'List of Student Data', $students);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim',
            'major' => 'required|string',
            'faculty' => 'required|string',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profile_photo = $request->file('profile_photo');
        $profile_photo->storeAs('profile_photo', $profile_photo->hashName());

        $students = Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'faculty' => $request->faculty,
            'profile_photo' => $profile_photo->hashName(),
        ]);

        // TODO: Return a StudentResource object
        return new StudentResource(true, 'Student Data Successfully Added!', $students);
    }

    public function show($id)
    {
        // TODO: Search by ID
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return new StudentResource(true, 'Student Details!', $student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        // TODO: Return 404 if not found
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // TODO: Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'nim' => 'required|string|unique:students,nim,' . $student->id,
            'major' => 'required|string',
            'faculty' => 'required|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // TODO: Return 422 if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('profile_photo')) {
            // Delete old image
            Storage::delete('profile_photo/' . basename($student->profile_photo));

            $profile_photo = $request->file('profile_photo');
            $profile_photo->storeAs('profile_photo', $profile_photo->hashName());

            $student->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'major' => $request->major,
                'faculty' => $request->faculty,
                'profile_photo' => $profile_photo->hashName(),
            ]);
        } else {
            $student->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'major' => $request->major,
                'faculty' => $request->faculty,
            ]);
        }

        // TODO: Return updated data
        return new StudentResource(true, 'Student Data Successfully Updated!', $student);
    }

    public function destroy($id)
    {
        $students = Student::find($id);

        if (!$students) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // TODO: Delete the image
        Storage::delete('profile_photo/' . basename($students->profile_photo));

        // TODO: Delete the student data
        $students->delete();

        return new StudentResource(true, 'Student Data Successfully Deleted!', null);
    }
}
