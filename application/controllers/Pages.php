<?php
class Pages extends CI_Controller {

        public function index()
        {               
                $this->load->model('skoly_model');
                $data['polozky'] = $this->skoly_model->get_menu();
              

		$this->load->view('templates/header', $data);                
		$this->load->view('pages/home', $data);  
		$this->load->view('templates/footer');
	}
        
        public function home()
        {
                $this->load->model('skoly_model');
                $data['polozky'] = $this->skoly_model->get_menu();
              

		$this->load->view('templates/header', $data);                
		$this->load->view('pages/home', $data);  
		$this->load->view('templates/footer');
        }
        public function mapa()
        {
            
                $this->load->model('skoly_model');
                $data['polozky'] = $this->skoly_model->get_menu();
                
                $this->load->view('templates/header', $data);                
		$this->load->view('pages/mapa', $data);  
		$this->load->view('templates/footer');
        }
}