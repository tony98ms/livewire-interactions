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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/livewire-interaction.php' => config_path('livewire-interaction.php'),
            ], 'config-interaction');
        }
    }
}
