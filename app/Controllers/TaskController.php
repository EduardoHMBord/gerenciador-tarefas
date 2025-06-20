<?php namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Controller;

class TaskController extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        $data['tasks'] = $model->findAll();

        return view('/tasks/index', $data);
    }

    public function create()
    {
        return view('/tasks/create');
    }

    public function store()
    {
        $validationRules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|max_length[500]',
            'status' => 'required|in_list[pendente,em andamento,concluida]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TaskModel();
        $model->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ]);
        

        return redirect()->to('/tasks');

    }

    public function edit($id)
    {
    
        $model = new TaskModel();
        $data = $model->find($id);

        return view('/tasks/edit', ['task' => $data]);
    }

    public function update($id)
    {
        $validationRules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'permit_empty|max_length[500]',
            'status' => 'required|in_list[pendente,em andamento,concluida]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $model = new TaskModel();
        $model->update($id, $this->request->getPost());

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        $model->delete($id);

        return redirect()->to('/tasks');
    }
}