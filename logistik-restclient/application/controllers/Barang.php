<?php
defined('BASEPATH') or exit('No direct script access allowed');
class barang extends CI_Controller
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

    // menampilkan data barang
    public function index()
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/barang'));
        $data['barang'] = $respon->values;
        $this->load->view('template/header', $data);
        $this->load->view('barang/index', $data);
    }

    // insert data barang
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->NULL,
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_barang' => $this->input->post('no_barang')
            );
            $insert =  $this->curl->simple_post($this->API . '/barang', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('barang');
        } else {
            $this->load->view('barang/create');
        }
    }

    // edit data barang
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_barang' => $this->input->post('no_barang')
            );

            $update =  $this->curl->simple_put($this->API . '/barang', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('barang');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/barang', $params));
            $data['databarang'] = $respon->data;
            $this->load->view('barang/edit', $data);
        }
    }

    // delete data barang
    function delete($id)
    {
        if (empty($id)) {
            redirect('barang');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/barang', array('id' => $id), array(CURLOPT_BUFFERSIZE => 100));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('barang');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
