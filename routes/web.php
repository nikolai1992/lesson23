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
//Front Side Site
Route::get(
    'setlocale/{lang}',
    function ($lang) {

        $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
        $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

        //разбиваем на массив по разделителю
        $segments = explode('/', $parse_url);

        //Если URL (где нажали на переключение языка) содержал корректную метку языка
        if (in_array($segments[1], App\Http\Middleware\Locale::$languages)) {

            unset($segments[1]); //удаляем метку
        }

        //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
        if ($lang != App\Http\Middleware\Locale::$mainLanguage) {
            array_splice($segments, 1, 0, $lang);
        }

        //формируем полный URL
        $url = Request::root() . implode("/", $segments);
//        dd($url);
        //если были еще GET-параметры - добавляем их
        if (parse_url($referer, PHP_URL_QUERY)) {
            $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
        }
//        dd($url);
        $url = str_replace(env('APP_URL'),"",$url);
        return redirect($url); //Перенаправляем назад на ту же страницу

    }
)->name('setlocale');
Route::group(
    [
        'prefix' => App\Http\Middleware\Locale::getLocale()
        /*, 'middleware' => 'reconstr'*/
    ],
    function () {
        Route::get('/', 'SiteController@index')->name('main');
        Route::get('/home', 'SiteController@index')->name('home');
        Route::get('/subjects', 'SiteController@subjects')->name('subjects');
    });
Route::get('/blog', 'SiteController@blog')->name('blog');
Route::get('/blog/{id}', 'SiteController@read_article')->name('blog.read_article');
Route::group(['middleware'=>'roles', 'roles'=>['admin'], 'prefix'=>'admin'], function(){
    Route::get('/', 'admin\AdminController@index')->name('admin.main');
    Route::get('/rating', 'admin\AdminController@rating')->name('rating.index');
    Route::post('/rating/update', 'admin\AdminController@update_rating')->name('rating.update');
    Route::resource("student", 'admin\StudentController');
    Route::resource("subject", 'admin\SubjectController');
    Route::resource("article", 'admin\ArticleController');
});


Auth::routes();