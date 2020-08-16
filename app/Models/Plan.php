<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','price','url','description'];

    /**
     * Get Tenants
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /**
     * Get Details of Plan
     */
    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * Get Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name','LIKE',"%{$filter}%")
                        ->orWhere('description','LIKE',"%{$filter}%")
                        ->paginate();

        return $results;
    }

    /**
     * Plans not linked with this profile
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if ($filter)
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();

        return $profiles;
    }
}
