<?php

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students/create', function () {
    $student = new Student();
    $student->first_name = 'John';
    $student->last_name = 'Doe';
    $student->email = 'johndoe@example.com';
    $student->age = 21;
    $student->save();
    return 'Student Created';
});

Route::get('/students', function () {
    $students = Student::all();
    return $students;
});

Route::get('/students/update', function () {   
    $student = Student::where('email','johndoe@example.com')->first();
    $student->email = 'john.doe@newmail.com';
    $student->save();
    return 'Student updated';
});

Route::get('/students/delete', function () {
    $student = Student::where('email','john.doe@newmail.com')->first();
    $student->delete();
    return 'Student Deleted';
});


Route::get('/course/create',function (){
    $course = new Courses();
    $course->course_name = 'Introduction to Databases';
    $course->save();
    return 'Course Created';
});

Route::get('/course/{id}/students', function ($id) {
    $course = Courses::find($id);
    return $course->students();
});