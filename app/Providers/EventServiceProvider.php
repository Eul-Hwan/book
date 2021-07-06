<?php

namespace App\Providers;

use App\Events\ArticlesEvent;
use App\Events\ArticleCreated;
use Illuminate\Auth\Events\Login;
use App\Listeners\UsersEventListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ArticlesEventListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,

        ArticlesEvent::class => [
            ArticlesEventListener::class,
        ],

        Login::class => [
            UsersEventListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // 이벤트 레지스트리 p.121
        // parent::boot();

        // Event::listen('article.created', function ($article) {
        //     var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
        //     var_dump($article->toArray());
        // });

        // 이벤트 클래스 p.123
        parent::boot();

        Event::listen(
            ArticleCreated::class,
            ArticlesEventListener::class
        );
    }
}
