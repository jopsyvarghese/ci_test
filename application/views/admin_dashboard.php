<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        body {
            font-size: +0.95em;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center mt-3 p-3 text-info">Admin Home</h4>
            <span class="float-right"><a href="logout">Logout</a></span>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 text-center mt-3">
            <table class="table" id="dataTable">
                <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>View & Edit</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Sl.No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>View & Edit</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                $i = 1;
                foreach ($users as $item) {
                    ?>
                    <tr>
                        <td><?= $i;
                            $i++; ?></td>
                        <td><?= $item->first_name ?></td>
                        <td><?= $item->last_name ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->phone_number ?></td>
                        <td>
                            <a href="edit/<?= $item->id ?>/<?= $item->subscription_for ?>" class="btn btn-default btn-sm text-primary">
                                <span class="fa fa-edit"></span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
