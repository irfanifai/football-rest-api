<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Userlogin extends CI_Controller {


    use REST_Controller {
    REST_Controller::__construct as private __resTraitConstruct;
    }
    
    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('Userlogin_model', 'Ulog');
    }
    

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null){
            $userlogin = $this->Ulog->index();
        } else {
            $userlogin = $this->Ulog->index($id);
        }

        if ($userlogin){
            $this->response([
                'status' => true,
                'data' => $userlogin
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'ID Not Found!'
            ], 404);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'Provide an ID!'
            ], 400);
        } else {
            if ($this->Ulog->delete($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'Successfully Deleted'
                ], 204);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'ID Not Found!'
                ], 400);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'email' => $this->post('email')
        ];

        if ($this->Ulog->create($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Has Been Created!'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Create New Data!'
            ], 400);
        }
    } 

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nama' => $this->put('nama'),
            'email' => $this->put('email')
        ];

        if ($this->Ulog->update($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Data Has Been Updated!'
            ], 204);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Update!'
            ], 400);
        }
    }

}

/* End of file User_login.php */
