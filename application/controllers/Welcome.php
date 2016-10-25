<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
        public function index()
        {
            $this->load->helper('form');
            $this->load->view('form');
        }
        
        public function process_form()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fname', 'Fname', 'required');
            $this->form_validation->set_rules('lname', 'Lname', 'required');
            
            //Check required.
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('form');
            }
            else
            {
                //Check if bot
                $postfields['secret'] = '6LfNgQkUAAAAANza-wUtw8WvFQIzoV45ZdfFiQtL';
                $postfields['response'] = $this->input->post('g-recaptcha-response');

                //function utils_curlPostResponse( $url , $format = 'json' , $userAgent = null , $opts = null , $postdata = null){
                $defaults = array(
                        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
                        CURLOPT_SSL_VERIFYPEER => FALSE,
                        CURLOPT_RETURNTRANSFER => TRUE,
                        CURLOPT_POST => count($postfields),
                        CURLOPT_POSTFIELDS => $postfields
                );		
                $curl = curl_init();
                curl_setopt_array($curl, $defaults);

                $response = curl_exec($curl);
                curl_close($curl);
                $result = json_decode($response, true);
                if(!$result['success']) {
                    $error = array('error' => 'ReCaptcha failed please try again');

                    $this->load->view('form', $error);
                }
                else { //continue
                    //grab all the inputs
                    $new_data = array();

                    $new_data['fname'] = $this->input->post('fname');
                    $new_data['lname'] = $this->input->post('lname');
                    $new_data['address1'] = $this->input->post('address1');
                    $new_data['address2'] = $this->input->post('address2');
                    $new_data['city'] = $this->input->post('city');
                    $new_data['state'] = $this->input->post('state');
                    $new_data['zip'] = $this->input->post('zip');
                    $new_data['phone'] = $this->input->post('phone');
                    $new_data['email'] = $this->input->post('email');
                    $new_data['c_info'] = $this->input->post('c_info');
                    $new_data['c_name'] = $this->input->post('c_name');
                    $new_data['c_address'] = $this->input->post('c_address');
                    $new_data['c_city'] = $this->input->post('c_city');
                    $new_data['c_state'] = $this->input->post('c_state');
                    $new_data['c_zip'] = $this->input->post('c_zip');

                    //setup upload
                    $config['upload_path'] = './invoices/';
                    $config['allowed_types'] = 'pdf';

                    $this->load->library('upload', $config);

                    //If invalid file type or other error.
                    if (!$this->upload->do_upload('invoice'))
                    {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('form', $error);
                    }
                    else
                    {
                        $new_data['invoice'] = $this->upload->data()['file_name'];

                        $this->load->model('main_model');
                        $this->main_model->insert_new($new_data);

                        $success = array('success' => 'Successfully Added New Item');
                        $this->load->view('form', $success);
                    }
                }
            }
        }
}
