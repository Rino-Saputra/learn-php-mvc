<?php

class Personal extends Controller {
    public function index()
    {
        $data=$this->model('Personal_model')->get_all_personal_data();
        $this->view('templates/header');
        $this->view('personal/index',$data); 
        $this->view('templates/footer'); 
    }


}