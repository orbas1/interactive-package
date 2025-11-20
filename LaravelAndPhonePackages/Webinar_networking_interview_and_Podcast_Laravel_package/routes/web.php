<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'events', 'middleware' => ['web']], function () {
    Route::view('/webinars', 'wnip::webinars.index')->name('wnip.webinars.index');
    Route::view('/networking', 'wnip::networking.index')->name('wnip.networking.index');
    Route::view('/podcasts', 'wnip::podcasts.index')->name('wnip.podcasts.index');
    Route::view('/interviews', 'wnip::interviews.index')->name('wnip.interviews.index');
});

