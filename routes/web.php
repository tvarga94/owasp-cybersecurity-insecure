<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:10,1')->group(function () {
    Route::post('/login', 'Auth\LoginController@login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

require __DIR__.'/auth.php';

Route::get('/preview-unsafe', function (Request $request) {
    $url = $request->query('url');

    if (!$url) {
        return '<form method="GET">
                    <label>Enter a URL to preview:</label><br>
                    <input type="text" name="url" style="width:300px;" placeholder="https://example.com">
                    <button type="submit">Preview</button>
                </form>';
    }

    $content = file_get_contents($url);
    return "<h3>Preview of $url:</h3><pre>" . e(substr($content, 0, 500)) . "</pre>";
});

Route::get('/admin-only', function (Request $request) {
    if (!in_array($request->ip(), ['127.0.0.1', '::1'])) {
        abort(403);
    }
    return 'Super secret admin panel';
});
