<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            ['name' => 'Alysse Nicole Evangelista', 'email' => 'aly_evangelista03@gmail.com', 'phone' => '0917 482 9102'],
            ['name' => 'Juancho Miguel Alcaraz', 'email' => 'jm.alcaraz@gmail.com', 'phone' => '0917 888 2931'],
            ['name' => 'Samantha Kaye Mendoza', 'email' => 'sammendoza.kaye@gmail.com', 'phone' => '0945 719 3364'],
            ['name' => 'Ethan Gabriel Reyes', 'email' => 'ethanreyes.gab@gmail.com', 'phone' => '0998 415 6328'],
            ['name' => 'Janella Marie Santos', 'email' => ' jm_santos20@gmail.com', 'phone' => '0908 624 5519']
        ];

        return view('customers/index', $data);
    }
}