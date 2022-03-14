<div>
    @auth
        @if (auth()->user()->id !== $user->id)
            @if ($following)
                <button wire:loading.attr="disabled" wire:target="followUser, unfollowUser" class="{{ $unfollow_class }}"
                    wire:click.prevent="unfollowUser">
                    @lang('Dejar de Seguir')
                </button>
            @else
                <button wire:loading.attr="disabled" wire:target="unfollowUser, followUser" class="{{ $follow_class }}"
                    wire:click.prevent="followUser">
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin: 0 auto; width: 10px; height: auto;"
                        viewBox="0 0 640 512">
                        <path
                            d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z" />
                    </svg>
                    @lang('Seguir Usuario')
                </button>
            @endif
        @else
            <button class="btn btn-warning btn-block btn-sm" disabled>@lang('No Disponible')</button>
        @endif
    @endauth
</div>
