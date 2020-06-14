<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="btn btn-default" href="barang/create">Tambah</a>
    <table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAMA BARANG</th>
          <th scope="col">JUMLAH</th>
          <th scope="col">PROSES</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($barang as $data) {
          echo " <tr>
            <td>$data->id</td>
            <td>$data->nama</td>
            <td>$data->total</td>
            <td>" . anchor('barang/update/' . $data->id, 'Edit') . "
            " . anchor('barang/delete/' . $data->id, 'Delete') . "</td>
            </tr>";
        } ?>
      </tbody>
    </table>
  </div>
</nav>


</body>

</html>