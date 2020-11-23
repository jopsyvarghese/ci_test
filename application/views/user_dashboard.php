<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
    <meta charset="utf-8">
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
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center mt-3 p-3 text-info">My Subscribed Items</h4>
            <span class="float-right"><a href="logout">Logout</a></span>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <table class="table" id="dataTable">
                <?php
                if ($subscription_for == 'comment') { ?>
                    <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Story Title</th>
                        <th>Author</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sl.No</th>
                        <th>Story Title</th>
                        <th>Author</th>
                        <th>Comment</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($hits as $item) {
                        ?>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <td><?= $item->story_title ?></td>
                            <td><?= $item->author ?></td>
                            <td><?= $item->comment ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                <?php } elseif ($subscription_for == 'story') {
                    ?>
                    <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Story Text</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sl.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Story Text</th>
                        <th>URL</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($hits as $item) {
                        ?>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <td><?= $item->title ?></td>
                            <td><?= $item->author ?></td>
                            <td><?= $item->story_text ?></td>
                            <td><a href="<?= $item->url ?>" class="btn btn-primary btn-sm"><span
                                            class="fa fa-eye"></span></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <?php
                } elseif ($subscription_for == 'poll') { ?>
                    <thead>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Story</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sl.No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Story</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($hits as $item) {
                        ?>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <td><?= $item->title ?></td>
                            <td><?= $item->author ?></td>
                            <td><?= $item->story_text ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                <?php } ?>
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
