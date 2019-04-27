<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class AllComposer
{
    public function compose(View $view){

        if(! $user = auth()->user()) return;
        return $view->with(['authUser' => auth()->user()]);
    }
}