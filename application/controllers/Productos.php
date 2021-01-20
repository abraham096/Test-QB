<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends Controlador_general
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
		$vals['inicial'] = "1";
		$data['titulo'] = "Gestión de Productos";
		$vals['total'] = $this->general_model->TotalProductos();
		$vals['productos'] = $this->general_model->RegresaProductos();
		$data['body'] = $this->load->view('productos/common', $vals, true);

		$this->load->view('dashboard', $data);
	}

	public function Altas()
	{
		$nombre = $this->input->post('nombre');
		$data = array("table" => "productos", "select" => "nombreProducto", "cond" => "nombreProducto", "condV" => $nombre);
		$val = $this->general_model->ComprobarExistencia($data);
		
		if ($val == 0) {
			$url = $_FILES['file']['name'];
			$mu = $this->input->post('mu');
			$des = $this->input->post('des');
			$ruta = $this->input->post('file');
			$tipo = $this->input->post('tipo');
			$cant = $this->input->post('stock');
			$precio = $this->input->post('precio');

			$data = array('tipo' => $tipo, 'cant' => $cant, 'precio' => $precio, 'des' => $des, 'mu' => $mu, 'nom' => $nombre, 'url' => $url);

			$flag = $this->general_model->InsertProductos($data);

			if (!empty($flag)) {
				redirect(base_url() . 'productos');
			}
       }
	}

	public function Bajas()
	{
		echo $this->input->post('numProd');
	}

	public function Modificaciones()
	{
	}
}
