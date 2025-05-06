<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FirebaseDbProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('firebase.database', function ($app) {
            $serviceAccount = storage_path('app/firebase/firebase_credentials.json');

            return (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://projectapmo5-default-rtdb.asia-southeast1.firebasedatabase.app/')->createDatabase();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
