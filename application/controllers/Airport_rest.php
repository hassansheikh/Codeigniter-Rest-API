<?php

require('application/libraries/REST_Controller.php');

class Airport_rest extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('airport_model');
        $this->load->helper('url_helper');
    }
	
    function airport_get()
    {
        $access = $this->checkAccess($this->get('key'));
        if($access){
           if(!$this->get('id')){
                $this->response(NULL, 400);
            }
            $airportModel = $this->airport_model->get( $this->get('id') );
            if($airportModel){
                $this->response($airportModel, 200); // 200 being the HTTP response code
            }
            else{
                $this->response(NULL, 404);
            } 
        }
        else{
            $this->response('unauthorized user', 404);
        } 
        
    }
 
    function airport_put()
    {
        $access = $this->checkAccess($this->put('key'));
        if($access){
            if(!$this->put('id')){
                $this->response(NULL, 400);
            }
            $response = $this->airport_model->update($this->put());
            if($response === FALSE){
                $this->response(array('status' => 'failed'));
            }  
            else{
                $this->response(array('status' => 'success'));
            }
        }
        else{
            $this->response('unauthorized user', 404);
        } 
        
    }
 
    function airport_post()
    {
        if(!$this->post()){
            $this->response(NULL, 400);
        }
        $access = $this->checkAccess($this->post('key'));
        if($access){
            $checkUserAirport= $this->checkUserAirport($this->post());
            if($checkUserAirport){
                $auth_key_id = $this->auth_model->userAuthId($this->post('key'));
                $insertId = $this->airport_model->insert($this->post(), $auth_key_id);
                $this->response(array('insertId'=>$insertId), 200);
            }
            else{
                $this->response('normal user can add only one airport per city', 400);
            }
        }
        else{
            $this->response('unauthorized user', 404);
        } 
    }

    private function checkUserAirport($post){
        $userType = $this->auth_model->checkAccess( $post['key'] );
        if($userType == 2){
            $auth_key_id = $this->auth_model->userAuthId($post['key']);
            return $this->airport_model->checkUserRecord( $post['city'], $auth_key_id );
        }
        elseif($userType == 1){
            return true;
        }
        else{
            return false;
        }
    }
 
    function airport_delete()
    {
        $access = $this->checkAccess($this->delete('key'));
        if($access){
            if(!$this->delete('id')){
                $this->response(NULL, 400);
            }
            $response = $this->airport_model->delete($this->delete('id'));
            if($response === FALSE){
                $this->response(array('status' => 'failed'));
            }  
            else{
                $this->response(array('status' => 'success'));
            } 
        }
        else{
            $this->response('unauthorized user', 404);
        } 
        
    }

    function search_get()
    {
        $this->load->model('auth_model');
        $userType = $this->auth_model->checkAccess( $this->get('key') );
        if(!$userType){
            $this->load->model('block_model');
            $checkBlockGuest = $this->block_model->checkNotBlock( $this->input->ip_address() );
            if(!$checkBlockGuest){
                $this->response('Guest user allow to only two request per minute. Please try again after a minute.', 404);
            }
        }

        $response = $this->airport_model->search($this->get());
        if($response === FALSE){
            $this->response(array('status' => 'failed'));
        }  
        else{
            if(empty($response)){
                $this->response('No record found.'); 
            }
            else{
                $this->response($response);  
            }
            
        }
    }

    private function checkAccess($key){
        if($key){
            $method = $this->input->method();
            $this->load->model('auth_model');
            $userType = $this->auth_model->checkAccess( $key );
            if($userType){
                if($userType==1){
                    return true;
                }
                elseif($userType==2){
                    switch ($method) {
                        case 'post':
                            return true;
                            break;
                        case 'get':
                            return true;
                            break;
                        default:
                            return false;
                            break;
                    }
                }
                else{
                    return false;
                }
            }
        }
        $this->response('Invalid auth key', 400);
    }
}

?>