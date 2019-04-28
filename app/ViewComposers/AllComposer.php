<?php

namespace App\ViewComposers;

use Illuminate\View\View;

class AllComposer
{
    public function compose(View $view){
        return $view->with(['authUser' => auth()->user()]);
    }
}