<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'User Accounts';
        $data['users'] = $this->userModel->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        $data['title'] = 'Add New User';
        return view('users/create', $data);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required|min_length[3]'
        ];

        if (!$this->validate($rules)) {
            return view('users/create', [
                'title'      => 'Add New User',
                'validation' => $this->validator
            ]);
        }

        $this->userModel->save([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['user']  = $this->userModel->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[3]',
            'avatar'    => 'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return view('users/edit', [
                'title'      => 'Edit User',
                'user'       => $this->userModel->find($id),
                'validation' => $this->validator
            ]);
        }

        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $img = $this->request->getFile('avatar');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads', $newName);
            $updateData['avatar'] = $newName;
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to('/users');
    }
}