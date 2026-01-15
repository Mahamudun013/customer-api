<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService) 
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->customerService->getAllCustomer()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string',
        ]);

        return response()->json([
            'data' => $this->customerService->createCustomer($data)
        ], 201);
    }

    public function show(int $id)
    {
        $customer = $this->customerService->getCustomerById($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json(['data' => $customer]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string',
        ]);

        return response()->json([
            'data' => $this->customerService->updateCustomer($id, $data)
        ]);
    }

    public function destroy(int $id)
    {
        $this->customerService->deleteCustomer($id);

        return response()->json(['message' => 'Customer deleted']);
    }
    
}
