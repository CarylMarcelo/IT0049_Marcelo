<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomerAccountModel;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in, go directly to dashboard
        if (session()->get('isLogged') === true) {
            return redirect()->to('dashboard');
        }

        // Process login form
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'username' => 'required|max_length[100]',
                'password' => 'required|max_length[255]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Enter both your username and password.');
            }

            $credentials = $this->request->getPost([
                'username',
                'password'
            ]);

            $user = (new UserModel())
                ->where('username', $credentials['username'])
                ->first();

            $validPassword = $user !== null
                && (
                    password_verify(
                        $credentials['password'],
                        $user['password']
                    )
                    ||
                    hash_equals(
                        (string) $user['password'],
                        (string) $credentials['password']
                    )
                );

            if (! $validPassword) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid username or password.');
            }

            // Regenerate session ID after successful login
            session()->regenerate();

            session()->set([
                'isLogged' => true,
                'user_id'  => $user['id'],
                'username' => $user['username'],
            ]);

            return redirect()->to('dashboard');
        }

        return view('login', [
            'title' => 'Login - Puihaha Electric',
            'page'  => 'login',
        ]);
    }

    public function dashboard()
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $customerModel = new CustomerAccountModel();

        // Dashboard statistics
        $statsModel = new CustomerAccountModel();

        $stats = $statsModel
            ->select("
        COUNT(*) AS total,
        SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) AS active,
        SUM(CASE WHEN status = 'inactive' THEN 1 ELSE 0 END) AS inactive,
        SUM(CASE WHEN status = 'suspended' THEN 1 ELSE 0 END) AS suspended
    ", false)
            ->first();

        // Search keyword
        $search = $this->request->getGet('search');

        // Connection type filter
        $connectionType = $this->request->getGet('connection_type');

        // Status filter
        $status = $this->request->getGet('status');

        // Apply search
        if (!empty($search)) {
            $customerModel->groupStart()
                ->like('account_number', $search)
                ->orLike('customer_name', $search)
                ->orLike('email', $search)
                ->orLike('meter_number', $search)
                ->groupEnd();
        }

        // Apply connection type filter
        if (!empty($connectionType)) {
            $customerModel->where('connection_type', $connectionType);
        }

        // Apply status filter
        if (!empty($status)) {
            $customerModel->where('status', $status);
        }

        // Pagination
        $customers = $customerModel
            ->orderBy('id', 'ASC')
            ->paginate(10);

        $data = [
            'title'           => 'Dashboard - Puihaha Electric',
            'page'            => 'dashboard',
            'username'        => session()->get('username'),
            'customers'       => $customers,
            'pager'           => $customerModel->pager,
            'search'          => $search,
            'connectionType'  => $connectionType,
            'status'          => $status,

            // Dashboard Statistics
            'totalAccounts'     => $stats['total'] ?? 0,
            'activeAccounts'    => $stats['active'] ?? 0,
            'inactiveAccounts'  => $stats['inactive'] ?? 0,
            'suspendedAccounts' => $stats['suspended'] ?? 0,
        ];

        return view('dashboard', $data);
    }

    public function createCustomer()
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        return view('customer_create');
    }


    public function storeCustomer()
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $rules = [
            'account_number' => 'required|max_length[50]|is_unique[customer_accounts.account_number]',
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerAccountModel();

        $customerModel->insert([
            'account_number'   => $this->request->getPost('account_number'),
            'customer_name'    => $this->request->getPost('customer_name'),
            'address'          => $this->request->getPost('address'),
            'phone'            => $this->request->getPost('phone'),
            'email'            => $this->request->getPost('email'),
            'meter_number'     => $this->request->getPost('meter_number'),
            'connection_type'  => $this->request->getPost('connection_type'),
            'status'           => $this->request->getPost('status'),
        ]);

        return redirect()->to('dashboard')
            ->with('success', 'Customer account created successfully.');
    }

    //-------VIEW CUSTOMER
    public function viewCustomer($id)
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $customerModel = new CustomerAccountModel();

        $customer = $customerModel->find($id);

        // Customer does not exist
        if ($customer === null) {
            return redirect()->to('dashboard')
                ->with('error', 'Customer account not found.');
        }

        return view('customer_view', [
            'title'    => 'Customer Details - Puihaha Electric',
            'page'     => 'dashboard',
            'username' => session()->get('username'),
            'customer' => $customer,
        ]);
    }

    //-------------EDIT CUSTOMER
    public function editCustomer($id)
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $customerModel = new CustomerAccountModel();

        $customer = $customerModel->find($id);

        // Customer does not exist
        if ($customer === null) {
            return redirect()->to('dashboard')
                ->with('error', 'Customer account not found.');
        }

        return view('customer_edit', [
            'title'    => 'Edit Customer - Puihaha Electric',
            'page'     => 'dashboard',
            'customer' => $customer,
        ]);
    }

    //---------UPDATE CUSTOMER
    public function updateCustomer($id)
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $customerModel = new CustomerAccountModel();

        // Check if customer exists
        $customer = $customerModel->find($id);

        if ($customer === null) {
            return redirect()->to('dashboard')
                ->with('error', 'Customer account not found.');
        }

        // Validation rules
        $rules = [
            'account_number' => "required|max_length[50]|is_unique[customer_accounts.account_number,id,{$id}]",
            'customer_name' => 'required|max_length[150]',
            'address' => 'required',
            'phone' => 'permit_empty|max_length[20]',
            'email' => 'permit_empty|valid_email|max_length[100]',
            'meter_number' => 'permit_empty|max_length[50]',
            'connection_type' => 'required|in_list[residential,commercial,industrial]',
            'status' => 'required|in_list[active,inactive,suspended]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Update customer
        $customerModel->update($id, [
            'account_number'  => $this->request->getPost('account_number'),
            'customer_name'   => $this->request->getPost('customer_name'),
            'address'         => $this->request->getPost('address'),
            'phone'           => $this->request->getPost('phone'),
            'email'           => $this->request->getPost('email'),
            'meter_number'    => $this->request->getPost('meter_number'),
            'connection_type' => $this->request->getPost('connection_type'),
            'status'          => $this->request->getPost('status'),
        ]);

        return redirect()->to('dashboard')
            ->with('success', 'Customer account updated successfully.');
    }

    //-------DELETE CUSTOMER
    public function deleteCustomer($id)
    {
        // User must be logged in
        if (session()->get('isLogged') !== true) {
            return redirect()->to('login');
        }

        $customerModel = new CustomerAccountModel();

        // Check if customer exists
        $customer = $customerModel->find($id);

        if ($customer === null) {
            return redirect()->to('dashboard')
                ->with('error', 'Customer account not found.');
        }

        // Delete customer
        $customerModel->delete($id);

        return redirect()->to('dashboard')
            ->with('success', 'Customer account deleted successfully.');
    }

    public function logout()
    {
        // If not logged in, return to login
        if (session()->get('isLogged') !== true) {
            return redirect()->to('/login');
        }

        session()->destroy();

        return redirect()->to('login')
            ->with('success', 'You have been logged out.');
    }
}
