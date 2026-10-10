<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        // Fetch all customer records from MySQL database
        $data['customers'] = $customerModel->findAll();

        $data['title'] = 'Customer Accounts';

        return view('customers/index', $data);
    }
}