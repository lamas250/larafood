<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $tableRepository, $tenantReposiroty;

    public function __construct(TableRepositoryInterface $tableRepository,TenantRepositoryInterface $tenantReposiroty)
    {
        $this->tableRepository = $tableRepository;
        $this->tenantReposiroty = $tenantReposiroty;
    } 

    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->tenantReposiroty->getTenantByUuid($uuid);

        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->tableRepository->getTableByUuid($uuid);
    }

    public function getTableByIdentify(string $identify)
    {
        return $this->tableRepository->getTableByIdentify($identify);
    }
}