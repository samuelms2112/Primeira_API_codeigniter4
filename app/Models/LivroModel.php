<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class LivroModel extends Model
{
    protected $table = 'livro';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descricao','valor', 'autor'];
    protected $validationRules    = [
        'descricao'     => 'required|max_length[50]',
        'valor'         => 'required|decimal',
        'autor'         => 'required|max_length[20]'       
    ];
}