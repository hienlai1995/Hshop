<?php

namespace App\Repositories;

use App\Models\Combo;

class ComboListRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = new Combo();
    }

    public function getAll()
    {

        return  $this->model = Combo::get();
    }
    public function getFive()
    {
        return  $this->model = Combo::paginate(5);
    }
    public function delete($id)
    {
        $combodelete =  $this->model->find($id);
        $combodelete->delete();
    }
    public function show($id)
    {
        return $this->model->find($id);
    }
    public function search($searchInput)
    {
        return $this->model->find($searchInput);
    }
    public function update($payload)
    {
        $this->model->find($payload['id'])->update($payload);
        return $this->model->orderBy('created_at', 'DESC')->get();
    }
    public function store($payload)
    {
        $combo =  $this->model->create($payload);
        return $combo->id;
    }
}
