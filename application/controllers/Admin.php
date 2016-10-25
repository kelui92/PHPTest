<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
            $this->load->helper('url');
            $this->load->model('main_model');
            $data['entries'] = $this->main_model->get_all();
            $this->load->view('admin_view',$data);
	}
        
        public function view_file($file_name)
        {
            $data['file_name'] = $file_name;
            $this->load->view('file_view', $data);
        }
        
        public function accept($id)
        {
            $this->load->helper('url');
            $this->load->model('main_model');
            $this->main_model->update($id, 'Accepted');
            redirect('admin/index');
        }
        
        public function decline($id)
        {
            $this->load->helper('url');
            $this->load->model('main_model');
            $this->main_model->update($id, 'Declined');
            redirect('admin/index');
        }
}