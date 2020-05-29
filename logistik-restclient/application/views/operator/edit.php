<?php echo form_open('member/edit');?>
<?php echo form_hidden('id',$datamember[0]->id);?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apotek Keren</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 

    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 580px}
    
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
      .row.content {height:auto;} 
    }

    table {
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f0f6f7}

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
    <h2 align="center">EDIT DATA MEMBER APOTEK</h2>
    </div>
<table>
    <tr>
        <td>ID</td>
        <td><?php echo form_input('', $datamember[0]->id,"disabled");?></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td><?php echo form_input('nama', $datamember[0]->nama);?></td>
    </tr>
    <tr>
        <td>NOMOR TELEPON</td>
        <td><?php echo form_input('no_telp', $datamember[0]->no_telp);?></td>
    </tr>
    <tr>
        <td>EMAIL</td>
        <td><?php echo form_input('email', $datamember[0]->email);?></td>
    </tr>
    <tr>
        <td>NOMOR MEMBER</td>
        <td><?php echo form_input('no_member', $datamember[0]->no_member);?></td>
    </tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit', 'simpan');?>
        <?php echo anchor('member', 'kembali');?></td></tr>
</table>
</div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<?php
echo form_close();
?>