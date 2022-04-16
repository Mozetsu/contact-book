<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/contacts", [ContactsController::class, "index"]); // GET ALL CONTACTS
Route::get("/contacts/{id}", [ContactsController::class, "show"]); // GET A SINGLE CONTACT
Route::post("/contacts", [ContactsController::class, "store"]); // CREATE A NEW CONTACT
Route::put('/contacts/update/{id}', [ContactsController::class, "update"]); // UPDATE CONTACT
Route::delete('/contacts/{id}', [ContactsController::class, "destroy"]); // DELETE CONTACT