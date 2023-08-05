<?php
 
namespace App\View\Composers;
 
use Auth;
use Illuminate\View\View;

class User
{
    /**
     * The auth user.
     *
     * @var \App\Models\User
     */
    protected $user;
 
    /**
     * Create a new user composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}