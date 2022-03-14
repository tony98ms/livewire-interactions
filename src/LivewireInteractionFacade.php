<?php

namespace Tonystore\LivewireInteraction;


use Illuminate\Support\Facades\Facade;


class LivewireInteractionFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'livewire-interaction';
    }
}
