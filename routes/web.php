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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function() {
//     return '<h1>Hellow IU</h1>';
// });

// 1.url에서 사용한 파라미터를 view를 통해서 화면에 출력
// Route::get('/{foo}', function ($foo) {
//     return $foo;
// });

// 2.url에서 사용한 파라미터를 view를 통해서 화면에 출력후 파라미터를 선택적으로 받을때에는 ?를 사용한다.
// Route::get('/{foo?}', function ($foo) {
//     return $foo;
// });

// 1.정규 표현식을 이용하여 패턴을 3자리로 강제 3자리 이상 사용시 ex) nice는 404 not found
// Route::pattern('foo', '[0-9a-zA-Z]{3}');
// Route::get('/{foo?}', function($foo = 'bar'){
//     return $foo;
// });

// 2.정규 표현식을 이용하여 패턴을 3자리로 강제 3자리 이상 사용시 ex) nice는 404 not found. where() 메서드를 이용
// Route::get('/{foo?}', function($foo = 'bar'){
//     return $foo;
// })->where('foo', '[0-9a-zA-Z]{3}');

// 라우트에 이름을 부여하기
// Route::get('/',[
//     'as' => 'home',
//     function () {
//         return '제이름은 "home" 입니다.';
//     }
// ]);
// Route::get('/home', function() {
//     return redirect(route('home'));
// });

// 뷰 반환 (resources/errors/503.blade.php 파일을 만들어야 한다.)
// Route::get('/', function() {
//     return view('errors.503');
// });

// 데이터 바인딩 1. with() 메서드 이용 방법
// Route::get('/', function () {
//     return view('welcome1')->with('name', 'Foo');
// });

// 데이터 바인딩 2. with() 메서드에서 배열을 이용하는 방법
// Route::get('/', function () {
//     return view('welcome1')->with([
//         'name' => 'Foo',
//         'greeting' => '안녕하세요?',
//     ]);
// });

// 데이터 바인딩 3. view() 함수 이용 방법
// Route::get('/', function () {
//     return view('welcome1', [
//         'name' => 'Foo',
//         'greeting' => '안냥?',
//     ]);
// });

// 조건문 p27
// Route::get('/', function () {
//     $items = ['apple', 'banana', 'tomato'];
//     // $items = [];

//     return view('welcome1', ['items' => $items]);
// });


// 컨트롤러 p60
// Route::get('/', 'WelcomeController@index');
// Route::resource('/articles', 'ArticlesController');

// 라우팅 파일만으로 사용자 인증을 구현 p74
// Route::get('/', 'WelcomeController@index');
// Route::get('auth/login', function(){
//     $credentials = [
//         'email' => 'john@example.com',
//         // 'password' => 'password'
//         'password' => 'secret'
//     ];

//     if (! auth()->attempt($credentials)){
//         return '로그인 정보가 정확하지 않습니다.';
//     }

//     return redirect('protected');
// });
// Route::get('protected', function(){
//     dump(session()->all());

//     if (! auth()->check()) {
//         return '누구세요?';
//     }

//     return '어서오세요 ' . auth()->user()->name;
// });
// Route::get('auth/logout', function() {
//     auth()->logout();

//     return '또 봐요~!';
// });



// 즉시 로드 p.100
Route::resource('articles', 'ArticlesController');

// N+1 쿼리 문제 p.102
// DB::listen(function ($query){
//     var_dump($query->sql);
// });

