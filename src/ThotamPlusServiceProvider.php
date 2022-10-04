<?php

namespace Thotam\ThotamPlus;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Thotam\ThotamPlus\Http\Livewire\ChiNhanhLivewire;

class ThotamPlusServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 */
	public function boot()
	{
		/*
         * Optional methods to load your package assets
         */
		// $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'thotam-plus');
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'thotam-plus');
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		Route::domain('member.' . env('APP_DOMAIN', 'upharma.vn'))->group(function () {
			$this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
		});

		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/config.php' => config_path('thotam-plus.php'),
			], 'config');

			// Publishing the views.
			/*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/thotam-plus'),
            ], 'views');*/

			// Publishing assets.
			/*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/thotam-plus'),
            ], 'assets');*/

			// Publishing the translation files.
			/*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/thotam-plus'),
            ], 'lang');*/

			// Registering package commands.
			// $this->commands([]);
		}

		/*
        |--------------------------------------------------------------------------
        | Seed Service Provider need on boot() method
        |--------------------------------------------------------------------------
        */
		$this->app->register(SeedServiceProvider::class);
	}

	/**
	 * Register the application services.
	 */
	public function register()
	{
		// Automatically apply the package configuration
		$this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'thotam-plus');

		// Register the main class to use with the facade
		$this->app->singleton('thotam-plus', function () {
			return new ThotamPlus;
		});

		if (class_exists(Livewire::class)) {
			Livewire::component('thotam-plus::chinhanh-livewire', ChiNhanhLivewire::class);
		}
	}
}
