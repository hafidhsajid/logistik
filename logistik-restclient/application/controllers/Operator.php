<?php
defined('BASEPATH') or exit('No direct script access allowed');
class operator extends CI_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost:8000/api";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data operator
    public function index()
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/operator'));
        $data['operator'] = $respon->values;
        $this->load->view('template/header', $data);
        $this->load->view('operator/index', $data);
    }

    // insert data operator
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
            );
            $insert =  $this->curl->simple_post($this->API . '/operator', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('operator');
        } else {
            $this->load->view('operator/create');
        }
    }

    // edit data operator
    function update()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'password' => md5($this->input->post('password')),
                'level' => $this->input->post('level')
            );

            $update =  $this->curl->simple_put($this->API . '/operator/update/' . $data["id"], $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            // echo $this->API . '/operator/update/' . $data["id"];
            // echo var_dump($data);
            redirect('operator');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/operator', $params));
            $data['id'] = $params;
            $data['dataoperator'] = $respon->values;
            $this->load->view('operator/update', $data);
        }
    }

    // delete data operator
    function delete($id)
    {
        if (empty($id)) {
            redirect('operator');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/operator/' . $id, array(CURLOPT_BUFFERSIZE => 100));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('operator');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
