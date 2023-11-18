<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
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

Route::get('test', function () {
    return 'Welcome To My First Route';
});


//DAY 3 TASK
Route::post("addCar",[ExampleController::class,'getData']);
Route::view("addCar","addCar");

/*Route::get('addcar',function () {
    return view('addCar');
});
Route::POST('receive',function () {
    return 'Data Received';
})->name('receive');*/


// day3 practice
Route::fallback(function () {
    return redirect('/');
});
Route::get('cv',function () {
    return view('cv');
}); 

Route::get('login',function () {
    return view('login');
}); 

Route::POST('receive',function () {
    return 'Data Received';
})->name('receive');

Route::get('test1',[ExampleController::class,'test1']);


// day2 Task
Route::prefix('homepage')->group (function () {
    Route::get('/', function () {
     return 'Welcome To Home Page';
    });   
    Route::get('about', function () {
        return 'About Us';
    });
    Route::get('contact', function () {
        return 'Contact Us';
    });   
    Route::prefix('support')->group (function () {
        Route::get('/', function () {
        return 'Support Us';
        });
        Route::get('chat', function () {
            return 'Chat';
        }); 
        Route::get('call', function () {
            return 'Call';
        }); 
        Route::get('ticket', function () {
            return 'Tickets';
        });
        });
    Route::prefix('training')->group (function () {
        Route::get('/', function () {
        return 'Trainings';
        });
        Route::get('ict', function () {
            return 'ICT';
        }); 
        Route::get('hr', function () {
            return 'HR';
        }); 
        Route::get('marketing', function () {
            return 'Marketing';
        }); 
        Route::get('logistics', function () {
            return 'Logistics';
        });
        });
});
 

