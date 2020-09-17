<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('mUser');
    }
    
    //Get
    public function index_get(){
        $_userName = $this->get('userName');
        $_userPass = $this->get('userPass');

        $data = $this->mUser->checkUser($_userName);
        if($data->row()){
            $userLevel = $data->row()->userLevel;
            $userStatus = $data->row()->userStatus;
            $userPass = $data->row()->userPass;

            if ($_userPass==$userPass) {
                $this->response([
                    'id'=>'weeee',
                    'status'=>true,
                    'message'=>"User Found",
                    'total'=>$data->num_rows(),
                    'data'=>$data->result_array(),
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'id'=>'weeee',
                    'status'=>false,
                    'message'=> "Invalid Password or Username",
                ], REST_Controller::HTTP_OK);
            }

           
        }else{
            $this->response([
                'id'=>'weeee',
                'status'=>false,
                'message'=>"Invalid Password or Username",
            ], REST_Controller::HTTP_OK);
        }
    }

}

?>