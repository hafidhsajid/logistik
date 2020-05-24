<?php
defined('BASEPATH') or exit('No direct script access allowed');
class member extends CI_Controller
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

    // menampilkan data member
    public function index()
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/operator'));
        $data['dataoperator'] = $respon;
        $this->load->view('member/index', $data);
        echo var_dump($data);
    }

    // insert data member
    function create()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->NULL,
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_member' => $this->input->post('no_member')
            );
            $insert =  $this->curl->simple_post($this->API . '/member', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($insert) {
                $this->session->set_flashdata('hasil', 'Insert Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Insert Data Gagal');
            }
            redirect('member');
        } else {
            $this->load->view('member/create');
        }
    }

    // edit data member
    function edit()
    {
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'no_member' => $this->input->post('no_member')
            );

            $update =  $this->curl->simple_put($this->API . '/member', $data, array(CURLOPT_BUFFERSIZE => 100));
            if ($update) {
                $this->session->set_flashdata('hasil', 'Update Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Update Data Gagal');
            }
            redirect('member');
        } else {
            $params = array('id' =>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API . '/member', $params));
            $data['datamember'] = $respon->data;
            $this->load->view('member/edit', $data);
        }
    }

    // delete data member
    function delete($id)
    {
        if (empty($id)) {
            redirect('member');
        } else {
            $delete =  $this->curl->simple_delete($this->API . '/member', array('id' => $id), array(CURLOPT_BUFFERSIZE => 100));
            if ($delete) {
                $this->session->set_flashdata('hasil', 'Delete Data Berhasil');
            } else {
                $this->session->set_flashdata('hasil', 'Delete Data Gagal');
            }
            redirect('member');
        }
    }
}
