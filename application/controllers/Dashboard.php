<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Controlador_general
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'html'));
	}

	public function index()
	{
			$data['titulo'] = "Pantalla de Administrador";
			$data['body'] = $this->load->view('layouts/db', '', true);

			$this->load->view('dashboard', $data);
	}
}
