<?php

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/live-count', function () {
    $candidates = Candidate::query()
        ->select('name', 'label', 'number')
        ->withCount('votes')
        ->orderBy('number')
        ->get();

    $osis = $candidates->where('label', 'OSIS');
    $mpk = $candidates->where('label', 'MPK');

    return response()->json([
        'osis' => [
            'labels' => $osis->pluck('name'),
            'data' => $osis->pluck('votes_count')
        ],
        'mpk' => [
            'labels' => $mpk->pluck('name'),
            'data' => $mpk->pluck('votes_count')
        ]
    ]);
})->name('api.live-count');
