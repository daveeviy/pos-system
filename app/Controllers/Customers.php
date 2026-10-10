<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data['title'] = 'Customer Accounts';
        $data['customers'] = $this->customerModel->findAll();
        return view('customers/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Add New Customer';
        return view('customers/create', $data);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('customers/create', [
                'title'      => 'Add New Customer',
                'validation' => $this->validator
            ]);
        }

        $this->customerModel->save([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Customer';
        $data['customer'] = $this->customerModel->find($id);
        return view('customers/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('customers/edit', [
                'title'      => 'Edit Customer',
                'customer'   => $this->customerModel->find($id),
                'validation' => $this->validator
            ]);
        }

        $this->customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers');
    }
}