<?php

namespace App\Http\Controllers\Usermanagement;

use App\Models\User;
use App\Models\Student;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    use ApiResponses;

    public function index()
    {
        // $user  = User::find(2);
        // $user->delete();
        $users = User::all();
        $user = User::withTrashed()->find(2);
        $user->restore();
        // $user = User::create([
        //     'name' => 'Jane Doe',
        //     'email' => 'jane@gmail.com',
        //     'password' => Hash::make('jane')
        // ]);


        return $this->success($user);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'adm_no' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'arm_id' => 'required|exists:arms,id',
            'personal_info' => 'nullable|json',
            'health_data' => 'nullable|json',
            'academic_performance' => 'nullable|json',
        ]);

        $student = Student::create($validatedData);
        return $this->success($student, 'Student record stored successfully', 201);
    }

    public function show(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return $this->error('student not found!', 404);
        }
        return $this->success($student);
    }


    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'adm_no' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'arm_id' => 'required|exists:arms,id',
            'personal_info' => 'nullable|json',
            'health_data' => 'nullable|json',
            'academic_performance' => 'nullable|json',
        ]);

        $student = Student::find($id);
        if (!$student) {
            return $this->error('student not found!', 404);
        }

        $student->update($validatedData);
        return $this->success($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return $this->error('student not found!', 404);
        }

        $student->delete();
        return $this->success(null, 204);
    }
}
