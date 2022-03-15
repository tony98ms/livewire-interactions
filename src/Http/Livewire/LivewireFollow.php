<?php

namespace Tonystore\LivewireInteraction\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LivewireFollow extends Component
{
    /**
     * Authenticated user.
     *
     * @var $auth_user
     */
    public $auth_user;
    /**
     * User to follow.
     *
     * @var $user
     */
    public $user;
    /**
     * Classes for follow button.
     *
     * @var string
     */
    public string $follow_class;
    /**
     * Classes for unfollowing button.
     *
     * @var string
     */
    public string $unfollow_class;
    /**
     * Classes for icon to follow.
     *
     * @var string
     */
    public string $follow_icon;
    /**
     * Classes to icon unfollowing.
     *
     * @var string
     */
    public string $unfollow_icon;
    /**
     * Show only the icon, without a description..
     *
     * @var boolean
     */
    public bool $only_icon;
    public function __construct()
    {
        $this->theme = config('livewire-interaction.theme', 'bootstrap');
    }
    public function mount($user, $follow_class = null, $unfollow_class = null, $follow_icon = null, $unfollow_icon = null, $only_icon = false)
    {
        $this->follow_class = $follow_class ?? config("livewire-interaction.follow.$this->theme.btn.follow_class", 'btn btn-info btn-block btn-sm');
        $this->unfollow_class = $unfollow_class ?? config("livewire-interaction.follow.$this->theme.btn.unfollow_class", 'btn btn-danger btn-block btn-sm');

        $this->follow_icon = $follow_icon ?? config("livewire-interaction.follow.$this->theme.icon.follow_icon", 'fas fa-user-plus');
        $this->unfollow_icon = $unfollow_icon ?? config("livewire-interaction.follow.$this->theme.icon.unfollow_icon", 'fas fa-user-mines');

        $this->user = $user;

        $this->only_icon = $only_icon ?: config('livewire-interaction.only_icon');
        $this->auth_user = Auth::user();
        $this->checkFollowing();
    }

    public function render()
    {
        return view('interaction::livewire.' . $this->theme . '.follow');
    }
    public function follow_user()
    {
        $this->auth_user->follow($this->user);
        $this->checkFollowing();
    }
    public function unfollow_user()
    {
        $this->auth_user->unfollow($this->user);
        $this->checkFollowing();
    }
    protected function checkFollowing()
    {
        $this->following = Auth::check() ? $this->auth_user->isFollowing($this->user) : false;
    }
}
