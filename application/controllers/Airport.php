<?php
class Airport extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('airport_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['airport'] = $this->airport_model->get_airports();

                print_r($data['airport']);
        }

}