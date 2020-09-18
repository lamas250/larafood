<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'products';
    }

    public function getProductsByTenantId(string $id)
    {
        return DB::table($this->table)->where('tenant_id',$id)->get();
    }

    public function getProductByFlag(string $flag)
    {
        return DB::table($this->table)->where('flag',$flag)->first();
    }
}