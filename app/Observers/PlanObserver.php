<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        // Registrar o observer em Providers\AppServiceProvider\boot
        $plan->url = \Str::kebab($plan->name);
        // dd($plan);
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updated(Plan $plan)
    {
        $plan->url = \Str::kebab($plan->name);
    }
}
