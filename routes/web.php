<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return inertia('Home');
    });
    
    Route::get('/users', function () {
        return inertia('Users/Index', [
            'users' => User::query()
                ->when(request()->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => auth()->user()->can('edit', $user),
                ]
            ]),
            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => auth()->user()->can('create', User::class),
            ]
        ]);
    });
    
    Route::get('/users/create', function () {
        return inertia('Users/Create');
    })->can('create', 'App\Models\User');
    
    Route::post('/users', function () {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
    
        User::create($attributes);
    
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return inertia('Settings');
    }); 
});
