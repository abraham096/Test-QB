<?php
#use function PHPSTORM_META\type;
//ini_set("display_errors", 0);
set_time_limit(180); # Habilito el procesamiento para 3 mins. máximo
defined('BASEPATH') or exit('No direct script access allowed');

class General_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    /** @abstract
     * @param tabla - Tabla a la cual se consultará
     * @param campo - Arreglo bidemendional con el formato array('Campo' => 'valor')
     * @param cond - Especifica la condición del Query. NULL cuando no se carga.
     * @return TRUE | FALSE del campo que se busca.
     * Query Biding => The main advantage of building query this way is that the values are automatically escaped which produce safe queries. CodeIgniter engine does it for you automatically, so you do not have to remember it.
     */
    function ComprobarExistencia($data)
    {
        $this->db->select($data["select"]);

        if (isset($data["cond"])) {
            $this->db->where($data["cond"]);
        }

        $vals = $this->db->get($data["table"]);
        $query = $vals->result_array();

        return count($query);
    }

    function ContarRegistros($param)
    {
        $this->db->select($param['select']);
        $this->db->where($param['cond'], $param['condV']);

        if (isset($param['cond2'])) {
            $this->db->where($param['cond2'], $param['condV2']);
        }

        $query = $this->db->get($param['table']);

        return $query->num_rows();
    }

    ####### COMPROBACIONES DEL LOGIN #######

    /**
     * Verifica el correo y contraseña para determinar la existencia
     * del usuario.
     * @return Int|boolean (false)
     */
    function Autenticar($user, $passwd)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->like('usuario', $user);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $hash = $row->passwd;

            if (password_verify($passwd, $hash)) {
                $data = array(
                    'login' => TRUE,
                    'id' => $row->idUser,
                    'tipo' => $row->tipo,
                    'user' => $row->usuario
                );

                unset($query);
                $this->session->set_userdata($data);

                return 1;
            } else {
                unset($query);


                return 2;
            }
        } else {
            unset($query);
            return 0;
        }
    }

    function ReestructurasIndicesPK($arr)
    {
        $sql = "SET @count = 0; UPDATE " . $arr['table'] . " SET " . $arr['table'] . "." . $arr['id'] . " = @count:= @count + 1";
        $query = $this->db->query($sql);
        $val = 0;

        if ($query) {
            $val = 1;
        } else {
            $val = $this->db->error();
        }

        return $val;
    }

    ####### ACTIONS EN BD's #######

    function InsertProductos($data)
    {
        $this->db->set('archivo', $data['url']);
        $this->db->set('tipoProducto', $data['tipo']);
        $this->db->set('stockProducto', $data['cant']);
        $this->db->set('precioProducto', $data['precio']);
        $this->db->set('muProducto', $this->db->escape_str($data['mu']));
        $this->db->set('nombreProducto', $this->db->escape_str($data['nom']));
        $this->db->set('descripcionProducto', $this->db->escape_str($data['des']));

        $this->db->insert('productos');
        $flag = $this->db->affected_rows();

        return $flag;
    }

    function RegresaProductos()
    {
        $vals = array();
        $query = $this->db->get_where('productos', array('statusProducto' => 1))->result_array();

        for ($i = 0; $i < count($query); $i++) {
            $vals[$i] = $query[$i];
        }

        return $vals;
    }

    function TotalProductos()
    {
        $this->db->get_where('productos', array('statusProducto' => 1));

        return $this->db->count_all_results();
    }

    ####### REGISTRAR LOGS EN EL SISTEMA #######

    function Logs($nombre, $actividad, $usuario)
    {
        $fecha = now();
    }
}
