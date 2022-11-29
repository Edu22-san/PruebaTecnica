<?php

namespace App\Controllers;

use App\Models\MachineModel;
use App\Models\TypeModel;
use Config\Services;

class MachineController extends BaseController
{
    public function __construct()
    {
        $this->session = Services::session();
    }

    public function viewMachine()
    {

        $model = model(MachineModel::class);
        $machine = $model->join('type', 'type.type_id = machine.machine_type_id');
        $data = [
            "machine" => $machine->paginate(4),
            "pager" => $model->pager,

        ];
        return view("machine/viewmachine", $data);
    }

    public function createMachine(){
        $typeModel = new TypeModel();
        $types = $typeModel->where('type.type_name !=')->findAll();
        return view("machine/createMachine", ['types' => $types]);
    }

    public function createActionMachine()
    {
        $machinesModel = new MachineModel();
        $model = new MachineController();
        $model = $this->request->getVar();

        if ($machinesModel->save($model)) {
            $result = ['msg' => " Successfully create", 'type' => 'success'];
            $_SESSION['result'] = $result;
            $this->session->markAsFlashdata('result');
            return $this->response->redirect(site_url('/viewmachine'));
        }
        
    }

    public function updateMachine($id = null, $errors = null)
    {
        $machinesModel = model(MachineModel::class);
        $data['machine_obj'] = $machinesModel->join('type', 'type.type_id = machine.machine_type_id')->where('machine_id', $id)->first();
        $typeModel = new TypeModel();
        $data['types'] = $typeModel->where('type.type_name <>')->findAll();
        $data['pageTitle'] = 'Edit machine';
        $data['errors'] = $errors;
        return view('machine/updateMachine', $data);
    }

    public function updateactionMachine()
    {
        $machinesModel = new MachineModel();
        $id = $this->request->getVar('machine_id');
        $machineToUpdate = $machinesModel->find($id + 0);
        $currentMachine = clone ($machineToUpdate);
  
        $currentMachine->machine_code = $this->request->getVar("machine_code");
        $currentMachine->machine_name = $this->request->getVar("machine_name");
        $currentMachine->machine_type_id = $this->request->getVar("machine_type_id");
        $currentMachine->machine_description = $this->request->getVar("machine_description");

        if ($machineToUpdate == $currentMachine) {

            return $this->response->redirect(site_url('/viewmachine'));
        }

        if ($machinesModel->save($currentMachine) === false) {
            return $this->updateMachine($id, $machinesModel->errors());
        }
        return $this->response->redirect(site_url('/viewmachine'));
    }

    public function delete($id = null){
        $model = model(MachineModel::class);
        $data['delete'] = $model->where('machine_id', $id)->delete($id);
        return $this->response->redirect(site_url('/viewmachine'));
    }

    
}
