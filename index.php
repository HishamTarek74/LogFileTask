<?php

include 'src/basic-auth.php';

basicAuth();

echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs  Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<h2 class="text-center ">View Logs File </h2>
<div class="row text-center">

    <div class="col-md-12" style="margin-left:20px">
        <form >
            <input type="text" name="file" id="file" class="form-control" placeholder="Enter File Path" >
            <button type="button" style="margin-top: 10px" class="btn btn-primary page-link start" data-start="0">Preview</button>
        </form>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div  class="card" style="margin-top: 20px;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">File Data will be show Here </li>
            </ul>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link start" role="button" data-start="0">Start</a></li>
                <li class="page-item"><a class="page-link previous " role="button" data-start="0">Previous</a></li>
                <!--                        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                <!--                        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--                        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <li class="page-item"><a class="page-link next" role="button" data-start="10">Next</a></li>
                <li class="page-item"><a class="page-link end" role="button" data-start="0">End</a></li>

            </ul>
        </nav>

    </div>
</div>

<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>
<script src="assets/js/main.js" crossorigin="anonymous"></script>
</body>

</html>
EOT;

