<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;

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

//.................................DAY 8 TASK........................................
Route::get('showupload',[ExampleController::class,'showupload']);
Route::post('upload',[ExampleController::class,'upload'])->name('upload');

//.................................DAY 7 TASK........................................
Route::get('trashednews',[NewsController::class,'trashed']);
Route::get('restorenews/{id}',[NewsController::class,'restore']);
Route::get('destroynews/{id}',[NewsController::class,'x'])->name('destroynews');


//.................................DAY 6 TASK........................................
Route::get('newsdetails/{id}',[NewsController::class,'show'])->name('newsdetails');
Route::get('deletenews/{id}',[NewsController::class,'destroy'])->name('deletenews');


//.................................day 6 practice....................................
Route::get('cardetails/{id}',[CarController::class,'show'])->name('cardetails');
Route::get('deletecar/{id}',[CarController::class,'destroy'])->name('deletecar');

//.................................DAY 5 TASK........................................
Route::put('updatenews/{id}',[NewsController::class,'update'])->name('updatenews');
Route::get('editnews/{id}',[NewsController::class,'edit']);
Route::get('newstable',[NewsController::class,'index']);


//.................................day 5 practice....................................
Route::put('updatecar/{id}',[CarController::class,'update'])->name('updatecar');
Route::get('editcar/{id}',[CarController::class,'edit']);
Route::get('cars',[CarController::class,'index']);


//.................................DAY 4 TASK........................................
Route::get("news",[NewsController::class,'index']);
Route::post("news",[NewsController::class,'store'])->name('news');
Route::get('news',function () {
    return view('news');
});

//.................................day 4 practice.....................................
Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');
Route::get("addCar",[CarController::class,'index']);
Route::get('addCar',function () {
    return view('addCar');
});
//DAY 3 TASK
//Route::post("addCar",[ExampleController::class,'getData']);
//Route::view("addCar","addCar");

Route::get('addcar',function () {
    return view('addCar');
});
/*Route::POST('receive',function () {
    return 'Data Received';
})->name('receive');*/


//.................................... day3 practice......................
/*Route::fallback(function () {
    return redirect('/');
});*/
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


//.................................... Day 2 Task.................................
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
 

