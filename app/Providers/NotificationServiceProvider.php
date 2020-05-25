<?php

namespace App\Providers;

use App\Service\Sender\SenderFactory;
use App\Service\Sender\SlackService;
use App\Service\Sender\TelegramService;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\LazyCollection;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SenderFactory::class, function (){
            $collection = collect();
            $collection->put('slack', function (){
                return $this->app->make(SlackService::class);
            });
            $collection->put('telegram', function (){
                return $this->app->make(TelegramService::class);
            });

            return new SenderFactory($collection);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
