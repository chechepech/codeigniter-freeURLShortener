<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Go extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
	}
	public function index()
	{	
		//If there is no item in the URL
		if (!$this->uri->segment(1)) {
			redirect(base_url());
		} else {
			 //Grab 1 uri segment
			$url_code = $this->uri->segment(1);
			$this->load->model('Urls_model');
			//retrieve database
			$query = $this->Urls_model->fetch_url($url_code);
			if ($query->num_rows() == 1) {
				foreach ($query->result() as $row) {
					$url_address = $row->url_address;
				}
				//redirect url original
				redirect(prep_url($url_address));
			} else {
				$page_data = array('success_fail' => null, 'encoded_url' => false);
				$this->load->view('common/header');
				$this->load->view('nav/top_nav');
				$this->load->view('create/create', $page_data);
				$this->load->view('common/footer');
			}
		}
	}
}
