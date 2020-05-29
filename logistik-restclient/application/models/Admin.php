<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Model
{
    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('id');
    }

    //fungsi check login
    function check_login($field1, $field2)
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/operator'));
        $data = $respon->values;
        $countdata = count($data);

        //buat cek kosong atau tidak data
        if ($respon->message != "KOSONG") {
            // buat tampilin isi
            foreach ($data as $cek) {
                # code...
                if ($cek->nama == $field1) {
                    // echo "found nama";
                    if ($cek->password == $field2) {
                        # code...
                        echo "sukses login";
                        return $data;
                        echo var_dump($data);
                    }
                    # code...
                } else {
                    // echo "wrong pass";
                    // return "gagal";
                }
            }
            return "gagal";
        } else {
            // echo "akhir";
            return "gagal";
            print("data kosong");
        }
    }
}
