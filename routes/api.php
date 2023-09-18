<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return Auth()->user();
});

// Routes for DepartmentController
Route::middleware(['auth:api', 'permission:department_create'])->post('add',[DepartmentController::class,'adding']);
Route::middleware(['auth:api', 'permission:department_edit'])->post('dupdate/{id}',[DepartmentController::class,'updating']);
Route::middleware(['auth:api', 'permission:department_delete'])->delete('delete/{id}',[DepartmentController::class,'delete']);
Route::middleware(['auth:api', 'permission:department_view'])->get('get',[DepartmentController::class,'getData']);


// Routes for TeamController
Route::middleware(['auth:api', 'permission:team_view'])->get('/teamindex', [TeamController::class, 'index']);
Route::middleware(['auth:api', 'permission:team_create'])->post('/teamcreate', [TeamController::class, 'store']);
Route::middleware(['auth:api', 'permission:team_view'])->get('/teamshow/{id}', [TeamController::class, 'show']);
Route::middleware(['auth:api', 'permission:team_edit'])->post('/teamupdate/{id}', [TeamController::class, 'update']);
Route::middleware(['auth:api', 'permission:team_delete'])->delete('/teamdestroy/{id}', [TeamController::class, 'destroy']);


// Routes for TeamMemberController
Route::middleware(['auth:api', 'permission:team_member_view'])->get('/memberindex', [TeamMemberController::class, 'index']);
Route::middleware(['auth:api', 'permission:team_member_add'])->post('/membercreate', [TeamMemberController::class, 'store']);
Route::middleware(['auth:api', 'permission:team_member_remove'])->delete('/memberdestroy/{id}', [TeamMemberController::class, 'destroy']);


// Routes for TaskController
Route::middleware(['auth:api', 'permission:task_create'])->post('/create', [TaskController::class, 'assignTask']);
Route::middleware(['auth:api', 'permission:task_view'])->get('/show', [TaskController::class, 'show']);
Route::middleware(['auth:api', 'permission:task_delete'])->delete('/delete/{id}', [TaskController::class, 'destroy']);
Route::middleware(['auth:api', 'permission:task_edit'])->post('/update/{id}', [TaskController::class, 'Update_task']); // for updating complete start
//Route::middleware(['auth:api', 'permission:task_assign_teams'])->put('/reassign/{id}', [TaskController::class, 'reassign_task']); // for reassigning the task