<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            config(['app.locale' => 'id']);Carbon::setLocale('id');date_default_timezone_set('Asia/Jakarta');
            Paginator::useBootstrap();
        
            Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
            // $recaptcha = new \ReCaptcha\ReCaptcha(config('recaptcha.secret_key'));
            $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
            $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
            return $response->isSuccess();
        });
    }
}
