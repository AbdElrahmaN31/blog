<?php

    namespace App\Providers;

    use App\Billing\Stripe;
    use App\Post;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            $this->app->singleton(Stripe::class, function () {
                return new Stripe(config('services.stripe.secret'));
            });
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            View::composer('layouts.sidebar', function ($view) {
                $view->with('archives', Post::archives());
            });
        }
    }
