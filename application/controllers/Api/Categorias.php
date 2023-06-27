<?php

require APPPATH . 'libraries/REST_Controller.php';

class Categorias extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        // En caso de recuperar un categoria especifica
        if (!empty($id)) {
            $data = $this->db->get_where("categorias", ['id_categorias'=>$id])->row_array();
        }
        // recuperar todas las categorias
        else{
            $data = $this->db->get("categorias")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("categorias", $input);
        $this->response(['Categoria agregada'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("categorias", $input, array("id_categorias" => $id));
        $this->response(['Categoria actualizada'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("categorias", array("id_categorias" => $id));
        $this->response(['Categoria eliminada'], REST_Controller::HTTP_OK);
    }

}