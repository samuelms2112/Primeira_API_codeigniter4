<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\LivroModel;

class Livros extends ResourceController
{
    use ResponseTrait;
    // lista todos livros
    public function index()
    {
        $model = new LivroModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    // lista um livro
    public function show($id = null)
    {
        $model = new LivroModel();
        $data = $model->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }

    // adiciona um livro
    public function create()
    {
        $model = new LivroModel();
        $data = $this->request->getJSON();

        if ($model->insert($data)) {
            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados salvos'
                ]
            ];
            return $this->respondCreated($response);
        }

        return $this->fail($model->errors());
    }

    // atualiza um livro
    public function update($id = null)
    {
        $model = new LivroModel();
        $data = $this->request->getJSON();

        if ($model->update($id, $data)) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados atualizados'
                ]
            ];
            return $this->respond($response);
        };

        return $this->fail($model->errors());
    }

    // deleta um livro
    public function delete($id = null)
    {
        $model = new LivroModel();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Dados removidos'
                ]
            ];
            return $this->respondDeleted($response);
        }

        return $this->failNotFound('Nenhum dado encontrado com id ' . $id);
    }
}
