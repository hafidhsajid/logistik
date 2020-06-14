<?php echo form_open('history/update'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>FORM EDIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */


    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 580px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 30px;
      background-color: #fdfefe;
      height: 100%;
    }

    /* Set black background color, white text and some padding */


    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {
        height: auto;
      }
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    td {
      text-align: center;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f0f6f7
    }

    th {
      background-color: #f0f6f7;
      color: black;
    }

    tr {
      background-color: #f0f6f7;
      color: black;
    }
  </style>
</head>

<body>

  <div class="container-fluid text-center">
    <div class="row content">
      <div class="col-sm-2 sidenav">
      </div>
      <div class="col-sm-8 text-left">
        <div>
          <h2 align="center"></h2>
        </div>

        <div class="container-fluid text-center">
          <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-8 text-left">
              <div>
                <h2 align="center">EDIT DATA</h2>
              </div>
              <!-- <form action="" method="post"> -->
              <input type="hidden" name="id" value="<?php echo $id ?>">
              <table>
                <tr>
                  <td>ID_OPERATOR</td>
                  <td>
                    <select name="id_operator" id="id_operator">SELECT
                      <?php
                      echo "<option value=''>Pilih Operator</option>";
                      foreach ($operator as $temp) {
                        // echo "<br><br><br>";
                        if ($temp != "Sukses!") {
                          $tempnama = "";
                          $tempid = "";
                          foreach ($temp as $key => $value) {
                            foreach ($value as $key1 => $value1) {
                              # code...
                              if ($key1 == "id") {
                                $tempid = $value1;
                              } else if ($key1 == "nama") {
                                $tempnama = $value1;
                                if ($tempid == $id) {
                                  # code...
                                  echo "<option value='$tempid'>$tempnama</option>";
                                } else {

                                  # code...
                                  echo "<option value='$tempid'>$tempnama</option>";
                                }
                              }
                            }
                          }
                        }
                      }
                      ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>ID_BARANG</td>
                  <td>
                    <select name="id_barang" id="id_barang">SELECT
                      echo "<option value=''>Pilih Barang</option>";
                      <?php
                      foreach ($barang as $temp) {
                        // echo "<br><br><br>";
                        if ($temp != "Sukses!") {
                          $tempnama = "";
                          $tempid = "";
                          foreach ($temp as $key => $value) {
                            foreach ($value as $key1 => $value1) {
                              # code...
                              if ($key1 == "id") {
                                $tempid = $value1;
                              } else if ($key1 == "nama") {
                                # code...
                                $tempnama = $value1;
                                echo "<option value='$tempid'>$tempnama</option>";
                              }
                            }
                          }
                        }
                      }
                      ?>
                    </select>
                    <!-- <select name="sasf" id="safd">
                      <option value="12312">asdfsasdfal</option>
                      <option value="12312" s>ff</option>
                    </select> -->
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <!-- <button type="submit" name="submit" form="form1" value="submit">simpan</button> -->
                    </form>
                    <?php
                    echo form_submit('submit', 'simpan');
                    ?>
                    <?php
                    echo anchor('history', 'kembali');
                    ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-sm-2 sidenav">
            </div>
          </div>
        </div>

        <?php
        ?>