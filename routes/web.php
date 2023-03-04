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

// Route::get('/', function () {
//     return view('welcome');
// });
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Admin Routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/
Route::prefix('admin')->group(function(){
Route::get('/','Admin\AdminController@index')->name('admin.index');
//UrlsForScrapingController Routes
Route::get('/url_for_scrape','Admin\UrlsForScrapingController@index')->name('admin.url_for_scrap.index');
Route::get('/url_for_scrape/create','Admin\UrlsForScrapingController@create')->name('admin.url_for_scrap.create');
Route::post('/url_for_scrape/store','Admin\UrlsForScrapingController@store')->name('admin.url_for_scrap.store');
Route::get('/url_for_scrape/edit/{id}','Admin\UrlsForScrapingController@edit')->name('admin.url_for_scrap.edit');
Route::post('/url_for_scrape/update','Admin\UrlsForScrapingController@update')->name('admin.url_for_scrap.update');
Route::delete('/url_for_scrape/destroy','Admin\UrlsForScrapingController@destroy')->name('admin.url_for_scrap.destroy');
//Telegram Bots Routes
Route::get('/telegram_bots','Admin\TelegrameBotsController@index')->name('admin.telegram_bots.index');
Route::get('/telegram_bots/create','Admin\TelegrameBotsController@create')->name('admin.telegram_bots.create');
Route::post('/telegram_bots/store','Admin\TelegrameBotsController@store')->name('admin.telegram_bots.store');
Route::get('/telegram_bots/edit/{id}','Admin\TelegrameBotsController@edit')->name('admin.telegram_bots.edit');
Route::post('/telegram_bots/update','Admin\TelegrameBotsController@update')->name('admin.telegram_bots.update');
Route::delete('/telegram_bots/destroy','Admin\TelegrameBotsController@destroy')->name('admin.telegram_bots.destroy');
//
Route::get('/telegram_channels','Admin\TelegramChannelsController@index')->name('admin.telegram_channels.index');
Route::get('/telegram_channels/create','Admin\TelegramChannelsController@create')->name('admin.telegram_channels.create');
Route::post('/telegram_channels/store','Admin\TelegramChannelsController@store')->name('admin.telegram_channels.store');
Route::get('/telegram_channels/edit/{id}','Admin\TelegramChannelsController@edit')->name('admin.telegram_channels.edit');
Route::post('/telegram_channels/update','Admin\TelegramChannelsController@update')->name('admin.telegram_channels.update');
Route::delete('/telegram_channels/destroy','Admin\TelegramChannelsController@destroy')->name('admin.telegram_channels.destroy');
//
Route::get('/telegram_groups','Admin\TelegramGroupsController@index')->name('admin.telegram_groups.index');
Route::get('/telegram_groups/create','Admin\TelegramGroupsController@create')->name('admin.telegram_groups.create');
Route::post('/telegram_groups/store','Admin\TelegramGroupsController@store')->name('admin.telegram_groups.store');
Route::get('/telegram_groups/edit/{id}','Admin\TelegramGroupsController@edit')->name('admin.telegram_groups.edit');
Route::post('/telegram_groups/update','Admin\TelegramGroupsController@update')->name('admin.telegram_groups.update');
//
Route::get('/categories','Admin\SaouraCategoryController@index')->name('admin.categories.index');
Route::get('/category/create','Admin\SaouraCategoryController@create')->name('admin.category.create');
Route::post('/category/store','Admin\SaouraCategoryController@store')->name('admin.category.store');
Route::get('/category/edit/{id}','Admin\SaouraCategoryController@edit')->name('admin.category.edit');
Route::post('/category/update','Admin\SaouraCategoryController@update')->name('admin.category.update');
//
Route::get('/settings','Admin\SaouraSettingController@index')->name('admin.settings.index');
Route::get('/setting/create','Admin\SaouraSettingController@create')->name('admin.setting.create');
Route::post('/setting/store','Admin\SaouraSettingController@store')->name('admin.setting.store');
Route::get('/setting/edit/{id}','Admin\SaouraSettingController@edit')->name('admin.setting.edit');
Route::post('/setting/update','Admin\SaouraSettingController@update')->name('admin.setting.update');

Route::get('/setting/auto_marketing/statu/{id}','Admin\SaouraSettingController@auto_marketing')->name('admin.setting.auto_marketing');
Route::get('/setting/scraper/statu/{id}','Admin\SaouraSettingController@scraper_statu')->name('admin.setting.scraper.statu');
//
Route::get('/products','Admin\SaouraProductsConrtoller@index')->name('admin.products.index');
Route::get('/product/edit/{id}','Admin\SaouraProductsConrtoller@edit')->name('admin.product.edit');
Route::get('/product/aproved/{id}','Admin\SaouraProductsConrtoller@aproved')->name('admin.product.aproved');
Route::post('/product/update','Admin\SaouraProductsConrtoller@update')->name('admin.product.update');
Route::delete('/product/delete','Admin\SaouraProductsConrtoller@destroy')->name('admin.product.delete');
//edit product number of market
Route::post('/product/marketing/update','Admin\SaouraProductsConrtoller@marketing_update')->name('admin.product.marketing.update');

//:::::::::::::::Scrapin Routs:::::::::::::
//  Amazon scraper
Route::get('amzone/scraper/home','AmazoneScraperController@amazon_scraper')->name('amzone.home.scraper');
// saouradelivey scraper
Route::get('saoura/products/scraper','Admin\SaouraDeliveryScraperController@category_product_scraper')->name('saoura.products.scraper');
//::::::::::::::telegrame Routs :::::::::
Route::get('telegram/get_me','TelegrameBotsController@get_me')->name('telegrame.get_me');
Route::get('telegram/send_message','TelegrameBotsController@send_message')->name('telegram.send_message');
Route::get('telegram/send_photo','TelegrameBotsController@send_photo')->name('telegram.send_photo');
});

Route::get('/','Site\SiteController@index')->name('site.index');
