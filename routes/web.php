<?php

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

// Route::get('/','ScrapeController@index')->name('home');

Route::get('/', function() {
    $crawler = Goutte::request('GET', 'https://www.youtube.com/results?search_query=sample');
    $crawler->filter('.yt-lockup-tile')->each(function ($node) {
        $node->filter('.yt-lockup-title')->each(function($nodeTitle) {
            echo "<strong>".$nodeTitle->text().'</strong><br />';
        });
        $node->filter('.accessible-description')->each(function($nodeAccess) {
            echo "<strong>".str_replace("- Tagal:","",$nodeAccess->text()).'</strong><br />';
        });
    });
});

// Route::get('/', function() {
//     $crawler = Goutte::request('GET', 'https://www.youtube.com/results?search_query=test');
//     $crawler->filter('html')->each(function ($node) {
//       echo $node->html();
//     });

// });

// Route::get('/', function() {
//     $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
//     $crawler->filter('.result__title .result__a')->each(function ($node) {
//       dump($node->text());
//     });
//     return view('welcome');
// });
