<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getProductsByTenantId(string $id);
    public function getProductByFlag(string $flag);
}