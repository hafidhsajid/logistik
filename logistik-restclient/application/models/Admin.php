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
    function check_login($table, $field1, $field2)
    {
        $respon = json_decode($this->curl->simple_get($this->API . '/operator'));
        $data = $respon->values;
        $countdata = count($data);

        echo "isi data " .  count($data) . "<br>";
        //buat cek kosong atau tidak data
        if ($respon->message != "KOSONG") {
            // buat tampilin isi
            echo $field1 . "<br>" . $field2;
            $a = 0;
            echo "ini count" . $countdata;
            while ($a <= 3) {
                if ($data[$a]->nama == $field1 && $data[$a]->password == $field2) {
                    # code...
                    echo "dalam if found";
                    // echo var_dump($data[$a]);
                    // return TRUE;
                    return $data[$a];
                    $a = 3;
                }
                // wrong login statement and looping
                elseif ($a <= $countdata) {
                    # code...
                    echo "dalam elseif";
                    $a++;
                    echo $a . "<br>";

                    // final false statement
                } else {
                    # code...
                    echo "dalam else";

                    // print $data[$i]->id . "<br>" . $data[$i]->nama . "<br>";
                    // echo "<br>" . $i;
                    return "gagal";
                    // return FALSE;
                }
            }
        } else {
            // echo "akhir";
            return "gagal";
            print("data kosong");
        }
        // while ($countdata >= 1) {
        //     $idget = ($data[$loop] == $data[$loop]->nama && $data[$loop] == $data[$loop]->password) ? $idget = $data[$loop]->id : $loop++;
        //     echo var_dump($idget);
        // }
    }
}
