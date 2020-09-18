<?php

namespace App\Services;

use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository, $tenantRepository;

    public function __construct(ProductRepositoryInterface $productRepository,TenantRepositoryInterface $tenantRepository)
    {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    } 

    public function getProductsByTenantUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);
        
        return $this->productRepository->getProductsByTenantId($tenant->id);
    }

    public function getProductByFlag(string $flag)
    {  
        return $this->productRepository->getProductByFlag($flag);
    }
}