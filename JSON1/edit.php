<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP JSON File CRUD (Create Read Update and Delete)</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    //get id from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('books.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
    if(isset($_POST['save'])){
        $input = array(
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'available' => $_POST['available'],
            'pages' => $_POST['pages'],
            'isbn' => $_POST['isbn']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('books.json', $data);
 
        header('location: index.php');
    }
?>
<div class="container">
    <h1 class="page-header text-center">PHP JSON File CRUD (Create Read Update and Delete)</h1>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8"><a href="index.php">Back</a>
        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row->title; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $row->author; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Available</label>
                <div class="col-sm-10">
                    <input type="bool" class="form-control" id="available" name="available" value="<?php echo $row->available; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Pages</label>
                <div class="col-sm-10">
                    <input type="int" class="form-control" id="pages" name="pages" value="<?php echo $row->pages; ?>">
                </div>
            </div>
            <input type="submit" name="save" value="Save" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
</body>
</html>