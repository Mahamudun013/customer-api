<?php

namespace App\Services;

use App\Contracts\Repositories\CustomerRepositoryInterface;

class CustomerService
{
    protected $customerRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomer()
    {
        return $this->customerRepository->getAll();
    }

    public function getCustomerById(int $id)
    {
        return $this->customerRepository->findById($id);
    }

    public function createCustomer(array $data)
    {
        return $this->customerRepository->create($data);
    }

    public function updateCustomer(int $id, array $data)
    {
        return $this->customerRepository->update($id, $data);
    }

    public function deleteCustomer(int $id): bool
    {
        return $this->customerRepository->delete($id);
    }
    
}
