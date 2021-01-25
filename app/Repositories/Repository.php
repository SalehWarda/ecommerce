<?php

 namespace App\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{

    protected $model;

    //construct to bind model to repo
    public function __construct(Model $model)
    {

        $this->model = $model;
    }
    public function all()
    {

    }

    public function create(array $data)
    {

    }

    public function update(array $data, $id)
    {

    }

    public function delete($id)
    {

    }

    public function show($id)
    {

    }


}
