<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">

    <table>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">ID OPERATOR</th>
          <th scope="col">PROSES</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($history as $data) {
          echo " <tr>
            <td>$data->id</td>
            <td>$data->id_operator</td>
            <td>" . anchor('history/edit/' . $data->id, 'Edit') . "
            " . anchor('history/delete/' . $data->id, 'Delete') . "</td>
            </tr>";
        } ?>
      </tbody>
    </table>
  </div>
</nav>


</body>

</html>