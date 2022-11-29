<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Entities\Type;

class TypeModel extends Model
{
    protected $table = "type";
    protected $primaryKey = 'type_id';
    protected $returnType = Type::class;
    protected $allowedFields = ["type_name"];

  

    protected $validationRules = [
        'type_name' =>  'required|is_unique[type.type_name]',
    ];

    protected $validationMessages = [
        'type_name' => [
            'required' => 'Name is required',
            'is_unique' => 'Type already exist'
        ],
    ];
}
