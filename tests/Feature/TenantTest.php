<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test Get All Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class,10)->create();

        $response = $this->get('/api/v1/tenants');

        // $response->dump();

        $response->assertStatus(200);
    }

    /**
     * Test Get Error Single Tenant
     *
     * @return void
     */
    public function testErrorGetTenant()
    {
        $tenant = 'fake_value';

        $response = $this->get("/api/v1/tenant/{$tenant}");

        $response->assertStatus(404);
    }

    /**
     * Test Get Single Tenant
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();
        
        $response = $this->getJson("/api/v1/tenant/{$tenant->uuid}");

        $response->assertStatus(200);
    }
}
