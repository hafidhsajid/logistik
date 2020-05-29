<font color="orange">
    <?php echo $this->session->flashdata('hasil'); ?>
</font>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Logistik Cahya Abadi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */


        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 580px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 30px;
            background-color: #FFFFFF;
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

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr {
            background-color: #ffffff
        }

        body {
            background: url('https://source.unsplash.com/ozZVrtwZ5Fg/1920x1080') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        th {
            background-color: #ffffff;
            color: BLACK;
        }
    </style>
</head>

<body>
    <?php
    // echo var_dump($this->session); 
    ?>

    <div class="container-fluid">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">LOGISTIK CAHYA ABADI</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="barang">Barang</a></li>
                    <li><a href="history">History</a></li>
                    <li><a href="operator">Operator</a></li>
                    <li><a href="login/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>