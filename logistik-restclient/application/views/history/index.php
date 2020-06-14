<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">

    <a class="btn btn-default" href="history/create">Tambah</a>

    <table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">OPERATOR</th>
          <th scope="col">BARANG</th>
          <th scope="col">PROSES</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $tempidoperator = "";
        $tempnamaoperator = "";
        $tempidbarang = "";
        $tempnamabarang = "";
        // operator loop
        foreach ($operator as $temp) {
          // echo "<br><br><br>";
          if ($temp != "Sukses!") {
            foreach ($temp as $key => $value) {
              foreach ($value as $key1 => $value1) {
                # code...
                if ($key1 == "id") {
                  // array_push($tempoperator['id'], $value1);
                  $tempidoperator = $value1;
                } else if ($key1 == "nama") {
                  # code...
                  $tempnamaoperator = $value1;
                  foreach ($history as $data) {

                    // barang loop
                    foreach ($barang as $temp) {
                      // echo "<br><br><br>";
                      if ($temp != "Sukses!") {
                        foreach ($temp as $key => $value) {
                          foreach ($value as $key1 => $value1) {
                            # code...
                            if ($key1 == "id") {
                              // array_push($tempoperator['id'], $value1);
                              $tempidbarang = $value1;
                            } else if ($key1 == "nama") {
                              # code...
                              $tempnamabarang = $value1;
                              // foreach ($history as $data) {
                              if ($data->id_operator == $tempidoperator) {
                                if ($data->id_barang == $tempidbarang) {
                                  # code...
                                  echo "<td>$data->id</td>";
                                  echo "<td>$tempnamaoperator</td>";
                                  echo "<td>$tempnamabarang</td>";
                                  echo "<td>"  .
                                    " " . anchor('history/delete/' . $data->id, 'Delete') . "</td>
                      </tr>";
                                }
                              }
                            }
                            // echo "<option value='$tempid'>$tempnama</option>";
                          }
                        }
                      }
                    }
                  }
                }
                // echo "<option value='$tempid'>$tempnama</option>";
              }
            }
          }
        }
        // }

        // foreach ($history as $data) {
        //   echo " <tr>
        //     <td>$data->id</td>
        //     <td>$data->id_operator</td>
        //     <td>$data->id_barang</td>
        //     <td>" . anchor('history/edit/' . $data->id, 'Edit') . "
        //     " . anchor('history/delete/' . $data->id, 'Delete') . "</td>
        //     </tr>";
        // } 
        ?>
      </tbody>
    </table>
  </div>
</nav>


</body>

</html>