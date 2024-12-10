<?php

namespace App\Providers;

use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();
        CreateAction::configureUsing(function (CreateAction $action) {
            $action->slideOver()->icon('heroicon-o-plus');
        });
        EditAction::configureUsing(function (EditAction $action) {
            $action->slideOver();
        });
    }
}
