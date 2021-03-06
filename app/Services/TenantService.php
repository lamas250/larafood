<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Str;

class TenantService
{
    private $plan, $data = [];

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->storeTenant($data);
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant(array $data)
    {
        $data = $this->data;
        
        return $this->plan->tenants()->create([
            'name' => $data['company'],
            'cnpj' => $data['cnpj'],
            'url' => Str::kebab($data['company']),
            'email' => $data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password'])
        ]);

        return $user;
    }
}