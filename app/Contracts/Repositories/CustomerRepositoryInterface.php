<?php

namespace App\Contracts\Repositories;

use App\Models\Customer;

interface CustomerRepositoryInterface
{
    public function getAll();
    public function findById(int $id): ?Customer;
    // public function create(array $data): Customer;
    public function create(array $data);
    public function update(int $id, array $data): Customer;
    public function delete(int $id): bool;
}
