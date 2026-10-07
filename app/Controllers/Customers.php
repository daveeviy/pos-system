<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        // Static PHP array of 5 customer records
        $data['customers'] = [
            [
                'fullname' => 'John Doe',
                'email'    => 'john.doe@example.com',
                'phone'    => '0917-123-4567'
            ],
            [
                'fullname' => 'Jane Smith',
                'email'    => 'jane.smith@example.com',
                'phone'    => '0918-234-5678'
            ],
            [
                'fullname' => 'Alice Johnson',
                'email'    => 'alice.j@example.com',
                'phone'    => '0919-345-6789'
            ],
            [
                'fullname' => 'Bob Brown',
                'email'    => 'bob.brown@example.com',
                'phone'    => '0920-456-7890'
            ],
            [
                'fullname' => 'Charlie Davis',
                'email'    => 'charlie.d@example.com',
                'phone'    => '0921-567-8901'
            ]
        ];

        $data['title'] = 'Customer Accounts';

        return view('customers/index', $data);
    }
}