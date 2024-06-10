<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TimelinePostController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('user-dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    // my courses retrive
    Route::get('/courses/my', [CourseController::class, 'myCourses'])->name('courses.myCourses');

    // Display the form to create a new course
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');

    // Store a new course in the database
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

    // Display the form to edit a course
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

    Route::get('/courses/{id}/timeline', [CourseController::class, 'edit'])->name('courses.timeline');

    // Update a specific course in the database (PUT/PATCH)
    Route::match(['put', 'patch'], '/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

    // Delete a specific course from the database
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // timeline post by course id
    Route::get('timeline_posts/course/{courseId}/my', [TimelinePostController::class, 'myPostsByCourse'])
        ->name('timeline_posts.byCourse.my');

    // timeline post by course id
    Route::get('timeline_posts/course/{courseId}', [TimelinePostController::class, 'postsByCourse'])
        ->name('timeline_posts.byCourse');

    // view course post form
    Route::get('timeline_posts/create/{courseId}', [TimelinePostController::class, 'create'])
        ->name('timeline_posts.create');

    // store the course
    Route::post('timeline_posts/store', [TimelinePostController::class, 'store'])
        ->name('timeline_posts.store');

    // store the course
    Route::post('timeline_posts/{courseId}', [TimelinePostController::class, 'destroy'])
        ->name('timeline_posts.destroy');

    // timeline post by course id
    Route::get('exams/{courseId}/create', [ExamController::class, 'create'])
        ->name('exam.create');

    // timeline post by course id
    Route::post('exams/{courseId}/store', [ExamController::class, 'store'])
        ->name('exam.store');

    // timeline post by course id
    Route::get('exams/course/{courseId}', [ExamController::class, 'exambyCourse'])
        ->name('exam.byCourse');

    // timeline post by course id
    Route::get('exams/{examId}', [ExamController::class, 'show'])
        ->name('exam.show');

    // timeline post by course id
    Route::get('question/{examId}', [QuestionController::class, 'index'])
        ->name('question.index');

    // timeline post by course id
    Route::get('question/{examId}/create', [QuestionController::class, 'create'])
        ->name('question.create');

    // timeline post by course id
    Route::post('question/{examId}/store', [QuestionController::class, 'store'])
        ->name('question.store');

    // timeline post by course id
    Route::get('question/{examId}/show', [QuestionController::class, 'show'])
        ->name('question.show');

});

// Routes that do not require authentication
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Display a list of enrollments
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');

    // Show the form for creating a new enrollment
    Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');

    // Show the form for creating a new enrollment
    Route::get('/enrollments/myEnrollments', [EnrollmentController::class, 'myEnrollments'])->name('enrollments.myEnrollments');

    Route::get('/courses/{id}/enrollments', [EnrollmentController::class, 'showEnrollment'])
        ->name('courses.showEnrollment');

        Route::get('/courses/{id}/people', [EnrollmentController::class, 'coursePeople'])
        ->name('enrollment.byCourse.people');


    // Store a newly created enrollment in the database
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

    // Display the specified enrollment
    Route::put('/enrollments/{id}/accept', [EnrollmentController::class, 'acceptEnrollment'])->name('enrollments.accept');

    // Show the form for editing the specified enrollment
    Route::post('/enrollments/{id}/remove', [EnrollmentController::class, 'removeEnrollment'])->name('enrollments.remove');

    // Update the specified enrollment in the database
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollments.update');

    // Remove the specified enrollment from the database
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.cancel');

    // Show a users blogs
    Route::get('blogs/my', [BlogController::class, 'myBlogs'])
        ->name('blogs.my');

    // Show the form for creating a new blog
    Route::get('blogs/create/new', [BlogController::class, 'create'])
        ->name('blogs.create');

// Store a newly created blog
    Route::post('blogs/store', [BlogController::class, 'store'])
        ->name('blogs.store');

// Show the form for editing a blog
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])
        ->name('blogs.edit');

// Update the specified blog
    Route::put('blogs/{blog}', [BlogController::class, 'update'])
        ->name('blogs.update');

// Delete the specified blog
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])
        ->name('blogs.destroy');

});

// Display a listing of blogs
Route::get('blogs', [BlogController::class, 'index'])
    ->name('blogs.index');

// Show a specific blog
Route::get('blogs/{blog}/show', [BlogController::class, 'show'])
    ->name('blogs.show');

Route::get('courses/categories/all', [CourseController::class, 'catView'])
    ->name('courses.categories');

Route::get('courses/levels/all', [CourseController::class, 'levelView'])
    ->name('courses.levels');

Route::get('courses/category/{category}', [CourseController::class, 'categoryCourses'])
    ->name('courses.category');

Route::get('courses/level/{level}', [CourseController::class, 'levelCourses'])
    ->name('courses.level');

require __DIR__ . '/auth.php';
