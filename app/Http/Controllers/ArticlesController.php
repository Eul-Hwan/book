<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Events\ArticlesEvent;
use App\Http\Requests\ArticlesRequest;
use App\Listeners\ArticlesEventListener;
use Illuminate\Support\Facades\Validator;

use function Psy\debug;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';

        // 즉시 로드 p.101
        // $articles = Article::get();

        // N+1 쿼리 문제 해결 방법 p.103
        // $articles = Article::with('user')->get();

        // 지연 로드 p.102
        // $articles = Article::get();
        // $articles->load('user'); //user() 관계가 필요 없는 다른 로직 수행

        // 페이지네이터 p.104
        // $articles = Article::latest()->paginate(3);

        // 뷰 디버깅 p.141
        $articles = Article::latest()->paginate(3);
        dd(view('articles.index', compact('articles'))->render());

        return view('articles.index', compact('articles'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';

        // 유효성 검사 전송 폼 만들기 p.108
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function store(Request $request)
    // {
    //     // return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로운 Article 컬렉션을 만듭니다.';


    //     // p.113까지
    //     // $rules = [
    //     //     'title' => ['required'],
    //     //     'content' => ['required', 'min:10'],
    //     // ];

    //     // $messages = [
    //     //     'title.required' => '제목은 필수 입력 항목입니다.',
    //     //     'content.required' => '본문은 필수 입력 항목입니다.',
    //     //     'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
    //     // ];

    //     // $validator = Validator::make($request->all(), $rules, $messages);

    //     // if ($validator->fails()){
    //     //     return back()->withErrors($validator)->withInput();
    //     // }

    //     // $article = User::find(1)->articles()->create($request->all());

    //     // if (! $article) {
    //     //     return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     // }

    //     // return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');


    //     // p.114 트레이트의 메서드 이용
    //     $rules = [
    //         'title' => ['required'],
    //         'content' => ['required', 'min:10'],
    //     ];

    //     $messages = [
    //         'title.required' => '제목은 필수 입력 항목입니다.',
    //         'content.required' => '본문은 필수 입력 항목입니다.',
    //         'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
    //     ];

    //     $this->validate($request, $rules, $messages);

    //     $article = User::find(1)->articles()->create($request->all());

    //     if (! $article) {
    //         return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     }

    //     return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    // }


    // 폼 리퀘스트 클래스 이용 p.116
    // public function store(ArticlesRequest $request)
    // {
    //     $article = User::find(1)->articles()->create($request->all());

    //     if (! $article) {
    //         return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     }

    //     return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    // }


    // 이벤트 시스템 p.119
    // public function store(ArticlesRequest $request)
    // {
    //     $article = User::find(1)->articles()->create($request->all());

    //     if (! $article) {
    //         return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     }

    //     var_dump('이벤트를 던집니다.');
    //     event('article.created', [$article]);
    //     var_dump('이벤트를 던졌습니다.');

    //     // return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    // }


    // 이벤트 클래스 p.123
    // public function store(ArticlesRequest $request)
    // {
    //     $article = User::find(1)->articles()->create($request->all());

    //     if (! $article) {
    //         return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
    //     }

    //     dump('이벤트를 던집니다.');
    //     event('article.created', [$article]);
    //     dump('이벤트를 던졌습니다.');
    // }


    //
    public function store(ArticlesRequest $request)
    {
        $article = User::find(1)->articles()->create($request->all());

        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        event(new ArticlesEvent($article));
        // return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 전역 예외 처리기 p.130
        // echo $foo;
        // return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다.:' . $id;

        // // 실용적인 예외 처리 p.133 (서버가 작동을 하지 않음)
        // $article = Article::findOrFail($id);
        // return $article->toArray();

        // 디버깅 dd()도우미 함수 p.140
        // $article = Article::findOrFail($id);
        // dd($article);
        // return $article->toArray();

        // 라라벨 디버그바 컴포넌트 사용
        $article = Article::findOrFail($id);
        debug($article->toArray());
        return view('articles.show', compact('article')); // show.blade.php 파일이 없음
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 반환합니다.:' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 주정합니다.:' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 삭제합니다.:' . $id;
    }
}
