<?php
    class Main_model extends CI_Model {
        
        public $id;
        public $first_name;
        public $last_name;
        public $address1;
        public $address2;
        public $city;
        public $state;
        public $zip;
        public $phone;
        public $email;
        public $company_info;
        public $company_name;
        public $company_address;
        public $company_city;
        public $company_state;
        public $company_zip;
        public $invoice_attachment;
        public $status;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_all() 
        {
            $query = $this->db->get('main');
            return $query->result();
        }

        public function insert_new($data)
        {
            $this->first_name = $data['fname'];
            $this->last_name = $data['lname'];
            $this->address1 = $data['address1'];
            $this->address2 = $data['address2'];
            $this->city = $data['city'];
            $this->state = $data['state'];
            $this->zip = $data['zip'];
            $this->phone = $data['phone'];
            $this->email = $data['email'];
            $this->company_info = $data['c_info'];
            $this->company_name = $data['c_name'];
            $this->company_address = $data['c_address'];
            $this->company_city = $data['c_city'];
            $this->company_state = $data['c_state'];
            $this->company_zip = $data['c_zip'];
            $this->invoice_attachment = $data['invoice'];
            
            $this->db->insert('main', $this);
            
        }
        
        public function update($id, $status)
        {
            //status 1 for accept, -1 for declined, 0 for no answer
            $query = $this->db->query("UPDATE `main` SET `status` = '$status' WHERE `id` = $id");
        }
    }

?>