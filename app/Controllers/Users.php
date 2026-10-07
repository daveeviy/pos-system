<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        // Static PHP array of 5 staff/user records
        $data['users'] = [
            [
                'username' => 'admin_juan',
                'fullname' => 'Juan Dela Cruz',
                'role'     => 'Administrator'
            ],
            [
                'username' => 'cashier_maria',
                'fullname' => 'Maria Clara',
                'role'     => 'Cashier'
            ],
            [
                'username' => 'cashier_crisostomo',
                'fullname' => 'Crisostomo Ibarra',
                'role'     => 'Cashier'
            ],
            [
                'username' => 'manager_elias',
                'fullname' => 'Elias Salome',
                'role'     => 'Store Manager'
            ],
            [
                'username' => 'inventory_sisa',
                'fullname' => 'Sisa Basilio',
                'role'     => 'Inventory Clerk'
            ]
        ];

        $data['title'] = 'User Accounts';

        return view('users/index', $data);
    }
}