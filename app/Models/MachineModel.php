<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Entities\Machine;

class MachineModel extends Model
{
    protected $table = "machine";
    protected $primaryKey = 'machine_id';
    protected $returnType = Machine::class;
    protected $allowedFields = ["machine_code",
                                "machine_name",
                                "machine_type_id",
                                "machine_description"
                            ];
                           
    protected $validationRules = [
        'machine_code' => 'required|is_unique[machine.machine_code]',
        'machine_name' => 'required|is_unique[machine.machine_name]',
        'machine_type_id'=> 'required',
    ];
    protected $validationMessages = [
        'machine_code' => [
            'required' => 'Machine code is required',
            'is_unique' => 'Machine code already exist'
        ],
        'machine_name' => [
            'required' => 'Machine name is required',
            'is_unique' => 'Machine name already exist'
        ],
        'machine_type_id' => [
            'required' => 'Type machine is required',
        ]
    ];
}
