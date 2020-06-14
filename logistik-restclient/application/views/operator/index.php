<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">

    <a class="btn btn-default" href="operator/create">Tambah</a>
    <table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NAMA OPERATOR</th>
          <th scope="col">BAGIAN</th>
          <th scope="col">PROSES</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($operator as $data) {
          echo " <tr>
            <td>$data->id</td>
            <td>$data->nama</td>
            <td>$data->level</td>
            <td>" . anchor('operator/update/' . $data->id, 'Edit') . "
            " . anchor('operator/delete/' . $data->id, 'Delete') . "</td>
            </tr>";
        } ?>
      </tbody>
    </table>
  </div>
</nav>


</body>

</html>