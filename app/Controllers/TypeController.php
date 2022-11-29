<?php
namespace App\Controllers;
use App\Models\TypeModel;
use CodeIgniter\API\ResponseTrait;
use Config\Services;

class TypeController extends BaseController{

    public function __construct()
    {
        $this->session = Services::session();
    }
    

    use ResponseTrait;

    public function viewType(){
        $model = model(TypeModel::class);
        $data=[
            'type'=> $model->paginate(4),
            'pager'=> $model->pager
        ];
        return view('type/viewtype',$data);
    }

    public function createType(){

         return view('type/createtype');
     }

    public function createActionType(){
        $model = model(TypeModel::class);
        $data = [
            'type_name' =>$this->request->getVar('type_name'),

        ];
        $model->insert($data);
        return $this->response->redirect(site_url('/viewtype'));
     }

     public function update($id = null){
        $model = model(TypeModel::class);
        $data['type_obj']= $model->where('type_id',$id)->first();
        return view('type/edittype', $data);
    }
    public function updateaction(){
        $model = model(TypeModel::class);
        $id =$this->request->getVar('type_id');
        $data = [
            'type_name' =>$this->request->getVar('type_name'),
        ];
        $model->update($id, $data);
        return $this->response->redirect(site_url('/viewtype'));
    }

    public function delete($id = null)
    {
        $model = model(TypeModel::class);

        $count = $model
            ->where('type_id', $id)
            ->join('machine', 'machine.machine_type_id = type.type_id')
            ->find();

        if (count($count) > 0) {
            return redirect()->to(base_url('/viewtype'));
        }
        $brandModel = model(TypeModel::class);
        if ($brandModel->delete($id)===true) {
            $_SESSION['result'] =  ['type' => 'success', 'msg' => 'type deleted'];
        }

        return $this->response->redirect(site_url('/viewtype'));
    }


}






?>