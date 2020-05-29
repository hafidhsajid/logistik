<?php
defined('BASEPATH') or exit('No direct script access allowed');
class history extends CI_Controller
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

    // menampilkan data history
    public function index()
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/history'));
        $data['history'] = $respon->values;
        $this->load->view('template/header', $data);

        $this->load->view('history/index', $data);
    }

    // insert data history
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->NULL,
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_history' => $this->input->post('no_history')
            );
            $insert =  $this->curl->simple_post($this->API . '/history', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('history');
        } else {
            $this->load->view('history/create');
        }
    }

    // edit data history
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_history' => $this->input->post('no_history')
            );

            $update =  $this->curl->simple_put($this->API . '/history', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('history');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/history', $params));
            $data['datahistory'] = $respon->data;
            $this->load->view('history/edit', $data);
        }
    }

    // delete data history
    function delete($id)
    {
        if (empty($id)) {
            redirect('history');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/history', array('id' => $id), array(CURLOPT_BUFFERSIZE => 100));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('history');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
