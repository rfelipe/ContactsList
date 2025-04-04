<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

Route::get('/', [ContactsController::class, 'ContactListAll'])->name('contacts.index');
Route::get('/contacts/create', [ContactsController::class, 'CreateContact'])->name('contacts.create');
Route::post('/contacts', [ContactsController::class, 'StoreContact'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactsController::class, 'ShowContact'])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactsController::class, 'EditContact'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactsController::class, 'UpdateContact'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactsController::class, 'DestroyContact'])->name('contacts.destroy');
