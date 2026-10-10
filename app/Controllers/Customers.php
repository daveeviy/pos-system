<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Customers extends BaseController
{
    protected $customerModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Load model and helpers
        $this->customerModel = new CustomerModel();
        helper('form');
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