<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

// View Model use to create API pagination for Actors Page

//RUN composer require spatie/laravel-view-models

//then RUN php artisan make:view-model HomepageViewModel

class ActorsViewModel extends ViewModel
{
    public $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
