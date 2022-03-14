<?php

namespace Tonystore\LivewireInteraction\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LivewireFollow extends Component
{
    public $current_user;
    public $user;
    public $follow_class;
    public $unfollow_class;
    public function mount($user, $follow_class = null, $unfollow_class = null)
    {
        $this->follow_class = $follow_class ?? config('livewire-interaction.options.bootstrap.follow_class', 'btn btn-info btn-block btn-sm');
        $this->unfollow_class = $unfollow_class ?? config('livewire-interaction.options.bootstrap.unfollow_class', 'btn btn-danger btn-block btn-sm');
        $this->user = $user;
        $this->current_user = Auth::user();
        $this->checkFollowing();
    }
    public function __construct()
    {
        $this->theme = config('livewire-interaction.template', 'bootstrap');
    }
    public function render()
    {
        return view('interaction::livewire.' . $this->theme . '.follow');
    }
    public function followUser()
    {
        $this->current_user->follow($this->user);
        $this->checkFollowing();
        session()->flash('message', 'Following');
    }
    public function unfollowUser()
    {
        $this->current_user->unfollow($this->user);
        $this->checkFollowing();
        session()->flash('message', 'Unfollowing');
    }
    protected function checkFollowing()
    {
        $this->following = Auth::check() ? $this->current_user->isFollowing($this->user) : false;
    }
}
