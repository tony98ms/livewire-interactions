<?php

namespace Tonystore\LivewireInteraction\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LivewireFollow extends Component
{
    public $current_user;
    public $user;
    public function mount($user)
    {
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
