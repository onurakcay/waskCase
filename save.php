<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <title>Wask</title>
</head>

<body>
    <div class="container">
        <div class="row align-items-center" style="height:100vh;">
            <div class="col-md-6">
                
                    <input type="file" id="file" name="file"  class="form-control mb-2" placeholder="File">
                    <input type="text" name="name" class="form-control mb-2" placeholder="Name">
                    <input type="text" name="description"  class="form-control mb-2" placeholder="Description">
                    <textarea name="message"  cols="30" rows="10" class="form-control mb-2 " placeholder="Message"></textarea>
                    <button type="button" onclick="createAdFunc()" class="btn btn-success">Create Ad</button>
                    <a href="get.php" id="listLink" class="btn btn-warning" style="float:right">List Ad's</a>

               
            </div>
            <div class="col-md-6 d-flex flex-column align-items-center">
                <img id="placeholderImg" src="https://bilecikdemircelik.com.tr/wp-content/uploads/2016/11/orionthemes-placeholder-image-1-1.png" alt="" srcset="" width="200" height="200">
                <h4 class="mt-2" id="placeholderName">Ad Name</h4>
                <label id="placeholderDescription">Ad Description</label>
                <label id="placeholderMessage">Ad Message</label>
            </div>
        </div>
    </div>

</body>

</html>