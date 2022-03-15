<?php

namespace Tonystore\LivewireInteraction;


use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Tonystore\LivewireInteraction\Http\Livewire\LivewireFollow;


class LivewireInteractionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/livewire-interaction.php', 'livewire-interaction');
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('follow', LivewireFollow::class);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'interaction');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'interaction');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
        $this->loadJsonTranslationsFrom(resource_path('lang/vendor/interaction'));
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/livewire-interaction.php' => config_path('livewire-interaction.php'),
            ], 'config-interaction');
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/interaction'),
            ], 'langs-interaction');
        }
    }
}
