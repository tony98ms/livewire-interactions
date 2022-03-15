<div>
    @auth
        @if (auth()->user()->id !== $user->id)
            @if ($following)
                <button wire:loading.attr="disabled" wire:target="follow_user, unfollow_user" class="{{ $unfollow_class }}"
                    wire:click.prevent="unfollow_user">
                    <i class="{{ $follow_icon }}"></i>
                    @if (!$only_icon)
                        @lang('Unfollow')
                    @endif
                </button>
            @else
                <button wire:loading.attr="disabled" wire:target="unfollow_user, follow_user" class="{{ $follow_class }}"
                    wire:click.prevent="follow_user">
                    <i class="{{ $unfollow_icon }}"></i>
                    @if (!$only_icon)
                        @lang('Follow')
                    @endif
                </button>
            @endif
        @else
            <button class="btn btn-warning btn-block btn-sm" disabled>@lang('Blocked')</button>
        @endif
    @endauth
</div>
