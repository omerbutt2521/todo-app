<?php
use App\Livewire\TodoList\CreateList;
use App\Livewire\UploadPhoto;
use App\Livewire\ImportUsers;
use App\Http\Controllers\FetchApi;
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
Route::get('/create-list', CreateList::class)->middleware(['auth', 'verified'])->name('create.list');
Route::get('/', function () {
    return view('welcome');
});
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/file-uploads', UploadPhoto::class)->middleware(['auth', 'verified'])->name('file-uploads');
Route::get('/import-users', ImportUsers::class)->middleware(['auth', 'verified'])->name('import-users');   
Route::get('/fetch-api', [FetchApi::class,'index'])->name('index');
require __DIR__.'/auth.php';
