<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService
{
    protected $categoryRepository, $tenantReposiroty;

    public function __construct(CategoryRepositoryInterface $categoryRepository,TenantRepositoryInterface $tenantReposiroty)
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantReposiroty = $tenantReposiroty;
    } 

    public function getCategoriesByUuid(string $uuid)
    {
        $tenant = $this->tenantReposiroty->getTenantByUuid($uuid);

        return $this->categoryRepository->getCategoriesByTenantId($tenant->id);
    }

    public function getCategoryByUuid(string $uuid)
    {
        return $this->categoryRepository->getCategoryByUuid($uuid);
    }

    public function getCategoryByUrl(string $url)
    {
        return $this->categoryRepository->getCategoryByUrl($url);
    }
}