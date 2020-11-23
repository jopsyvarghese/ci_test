<!DOCTYPE html>
<html lang="en">
<?php
$items = $items[0];
?>
<head>
    <title>User Item Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center mt-3 p-3 text-info">Subscribed Item Edit</h4>
            <span class="float-right"><a href="logout">Logout</a></span>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-8 text-center">
            <form action="../../../edit_item_final" method="post">
                <table class="table table-borderless table-responsive-lg">
                    <input type="hidden" name="id" value="<?= $id ?>"/>
                    <input type="hidden" name="item_id" value="<?= $item_id ?>"/>
                    <input type="hidden" name="subscription_for" value="<?= $subscription_for ?>"/>
                    <tr>
                        <th>Title</th>
                        <td>
                            <input type="text" name="title" class="form-control" value="<?= $items->title ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>
                            <input type="text" name="author" class="form-control" value="<?= $items->author ?>"/>
                        </td>
                    </tr>
                    <?php
                    if ($subscription_for == 'comment') { ?>
                        <tr>
                            <th>Story Title</th>
                            <td>
                                <input name="story_title" class="form-control" value="<?= $items->story_title ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Comment</th>
                            <td>
                                <textarea name="comment" cols="20" rows="5" class="form-control"><?= $items->comment ?></textarea>
                            </td>
                        </tr>
                    <?php
                    } elseif ($subscription_for == 'story') { ?>
                        <tr>
                            <th>Story Text</th>
                            <td>
                                <textarea name="story_text" class="form-control"><?= $items->story_text ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td>
                                <input type="text" name="url" class="form-control" value="<?= $items->url ?>"/>
                            </td>
                        </tr>
                    <?php
                    } elseif ($subscription_for == 'poll') { ?>
                        <tr>
                            <th>Story Text</th>
                            <td>
                                <textarea name="story_text" class="form-control"><?= $items->story_text ?></textarea>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary">Update</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
</body>
</html>
