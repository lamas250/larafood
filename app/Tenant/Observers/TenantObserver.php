<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
     /**
     * Handle the tenant "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        // Registrar o observer em Providers\AppServiceProvider\boot
      
        // Instancia um objeto ManagetTenant para buscar o Tenant Autenticado.
        $managerTenant = app(ManagerTenant::class);
        
        // Adiciona o trait_id no model em questao, pegando do getTenantIdentify
        $model->tenant_id = $managerTenant->getTenantIdentify();
    }
}