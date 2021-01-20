<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends Controlador_general
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'html'));
	}

	public function index()
	{
		if ($this->session->userdata('user') == null) {
			$this->Redireccionar();
		} else {
			/**
			 * ADMIN => admin | admin
			 * CLIENTE => cliente | cliente
			 */

			$data['titulo'] = "Inicio de Sesión";
			$data['body'] = $this->load->view('layouts/login', '', true);

			$this->load->view('login', $data);
		}
	}

	public function recuperarClave()
	{
		echo ("Recuperar Clave");
	}

	public function inicioSesion()
	{
		if ($this->input->is_ajax_request())
			$this->forbidden();
		else {
			$this->load->model('general_model');
			$user = $this->input->post('username');
			$passwd = $this->input->post('password');
			$val = $this->general_model->Autenticar($user, $passwd); #AQUÍ SE AGREGA LA TABLA DE VALIDACIÓN 

			if ($val == 0) {
				# Usuario inexistente
				redirect(base_url() . "?op=mail");
			} else if ($val == 1) {
				# Ingreso existoso
				$user = array('user' => $user);
				$this->session->set_userdata($user);

				$this->Redireccionar();
			} else {
				$data['alerts'] = "Los datos proporcionados, no corresponden a la información almacenada en la base de datos";
				$this->load->view('errors/loginErroneo', $data, false);

				unset($data);
			}
		}
	}

	public function logout()
	{
		$this->destruirSesion();
	}

	private function Redireccionar()
	{
		$tipo  = $this->session->userdata('tipo');

		$url = ($tipo == 0) ? base_url() . "principal" : base_url() . "clientes";
		redirect($url);
	}
}
