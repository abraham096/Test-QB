<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_general extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	/**
	 * Permite determinar si existe una sesión.
	 * @return boolean
	 */
	protected function verificar_sesion()
	{
        $retVal = ($this->session->has_userdata('login')) ? true : false;
        return $retVal;
    }
    
    protected function destruirSesion() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    protected function forbidden()
    {
        return "<!DOCTYPE html>
        <html>
        <head>
            <title>403 Forbidden</title>
        </head>
        <body>
        
        <p>Directory access is forbidden.</p>
        
        </body>
        </html>";
    }
}
