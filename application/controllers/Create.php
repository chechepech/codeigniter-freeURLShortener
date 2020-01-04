<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Create extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	public function index()
	{	
			//Set validation
		$this->form_validation->set_rules('url_address', $this->lang->line('create_url_address'),
			'required|min_length[1]|max_length[1000]|trim');
		if ($this->form_validation->run() == false) {
			//Set initial values for the view
			$page_data = array('success_fail' => null, 'encoded_url' => false);
			$this->load->view('common/header');
			$this->load->view('nav/top_nav');
			$this->load->view('create/create', $page_data);
			$this->load->view('common/footer');
		} else {
			// Begin to build data to be passed to database
			$data = array('url_address' => $this->input->post('url_address',TRUE),);
			$this->load->model('Urls_model');
			if ($res = $this->Urls_model->save_url($data)) {
				$page_data['success_fail'] = 'success';
				$page_data['encoded_url']  = $res;
			} else {
			// Some sort of error, set to display error message
				 $page_data['success_fail'] = 'fail';
			}
			// Build link which will be displayed to the user
			//$page_data['encoded_url'] = base_url() . '/' . $res;
			$page_data['encoded_url'] = base_url() . $res;
			$this->load->view('common/header');
			$this->load->view('nav/top_nav');
			$this->load->view('create/create', $page_data);
			$this->load->view('common/footer');
		}
	}
}
