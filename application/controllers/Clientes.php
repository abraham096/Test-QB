<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends Controlador_general
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('general_model');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'html'));
	}

	public function index()
	{
		$data['productos'] = $this->general_model->RegresaProductos();

		if ($this->session->userdata('user') == null) {
            redirect(base_url());
        } else {
			$this->load->view('dbclientes', $data);
		}
	}
}
