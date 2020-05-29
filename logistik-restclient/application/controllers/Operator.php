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
                'id' => $this->input->NULL,
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_operator' => $this->input->post('no_operator')
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
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_operator' => $this->input->post('no_operator')
            );

            $update =  $this->curl->simple_put($this->API . '/operator', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('operator');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/operator', $params));
            $data['dataoperator'] = $respon->data;
            $this->load->view('operator/edit', $data);
        }
    }

    // delete data operator
    function delete($id)
    {
        if (empty($id)) {
            redirect('operator');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/operator', array('id' => $id), array(CURLOPT_BUFFERSIZE => 100));
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
