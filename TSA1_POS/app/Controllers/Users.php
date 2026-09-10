<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            ['username' => 'admin_01', 'fullname' => 'Chrysanthe Dimaculangan', 'role' => 'Administrator'],
            ['username' => 'cashier_a', 'fullname' => 'Bea Del Rosario', 'role' => 'Cashier'],
            ['username' => 'cashier_b', 'fullname' => 'Daniel Joshua Aquino', 'role' => 'Cashier'],
            ['username' => 'manager_01', 'fullname' => 'Elijah Kurt Villanueva ', 'role' => 'Store Manager'],
            ['username' => 'stock_01', 'fullname' => 'Diana Lim', 'role' => 'Inventory Clerk']
        ];

        return view('users/index', $data);
    }
}