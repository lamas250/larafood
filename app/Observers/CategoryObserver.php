<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the category "creating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        // Registrar o observer em Providers\AppServiceProvider\boot
        $category->url = Str::kebab($category->name);
        // dd($category);
    }

    /**
     * Handle the category "updating" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = \Str::kebab($category->name);
    }
}
