<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfileController;


Route::get('/', [ContactsController::class, 'ContactListAll'])->name('contacts.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/contacts/create', [ContactsController::class, 'CreateContact'])->name('contacts.create');
    Route::post('/contacts', [ContactsController::class, 'StoreContact'])->name('contacts.store');
    Route::get('/contacts/{contact}', [ContactsController::class, 'ShowContact'])->name('contacts.show');
    Route::get('/contacts/{contact}/edit', [ContactsController::class, 'EditContact'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [ContactsController::class, 'UpdateContact'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactsController::class, 'DestroyContact'])->name('contacts.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
