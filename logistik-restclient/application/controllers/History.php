<?php
defined('BASEPATH') or exit('No direct script access allowed');
class history extends CI_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost:8000/api";
        // $this->load->view('barang_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data history
    public function index()
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/history'));
        $data['history'] = $respon->values;
        $data['barang'] = json_decode($this->curl->simple_get($this->API . '/barang'));
        $data['operator'] = json_decode($this->curl->simple_get($this->API . '/operator'));
        $this->load->view('template/header', $data);
        $this->load->view('history/index', $data);
    }

    // insert data history
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                // 'id' => $this->input->NULL,
                'id_operator' => $this->input->post('id_operator'),
                'id_barang' => $this->input->post('id_barang')
            );
            $insert =  $this->curl->simple_post($this->API . '/history', $data);
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('history');
        } else {
            $get['barang'] = json_decode($this->curl->simple_get($this->API . '/barang'));
            $get['operator'] = json_decode($this->curl->simple_get($this->API . '/operator'));
            $this->load->view('history/create', $get);
        }
    }

    // edit data history
    function update()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'id_operator' => $this->input->post('id_operator'),
                'id_barang' => $this->input->post('id_barang'),
            );

            $update =  $this->curl->simple_put($this->API . '/history/update/' . $data["id"], $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            echo var_dump($data);
            redirect('history');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/history', $params));
            $data['barang'] = json_decode($this->curl->simple_get($this->API . '/barang'));
            $data['operator'] = json_decode($this->curl->simple_get($this->API . '/operator'));
            $data['id'] = $this->uri->segment(3);
            $data['datahistory'] = $respon->values;
            $this->load->view('history/update', $data);
        }
    }

    // delete data history
    function delete($id)
    {
        if (empty($id)) {
            redirect('history');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/history/' . $id, array(CURLOPT_BUFFERSIZE => 100));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            // echo var_dump($this->API . '/history/' . $id);
            redirect('history');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
