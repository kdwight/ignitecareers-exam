<?php

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

Route::get('/', function () {

    $options = [
        'http' => [
            'method'  => 'POST',
            'header' => ['Content-type: application/json', 'Authorization: Bearer qwertyuiop'],
            'content' => json_encode([
                'jobId' => 10
            ])
        ]
    ];

    $context  = stream_context_create($options);

    $data = file_get_contents('https://ignite-careers.com/test/endpoint.php', false, $context);

    $x = json_decode($data, true);

    // return $x['data'];

    return view('welcome', [
        'datas' => $x['data']
    ]);
});
