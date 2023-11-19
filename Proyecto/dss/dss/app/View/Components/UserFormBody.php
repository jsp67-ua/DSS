<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserFormBody extends Component
{
    private $user;
    /**
     * Create a new component instance.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct( $user = null )
    {
        if( is_null($user))
        {
            $user = User::make([]);
        }
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params =
        [
            'user'   => $this->user,
        ];
        return view('components.user-form-body', $params);
    }
}
