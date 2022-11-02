<?php

include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'dbconn.php';

if (isset($_POST['submit'])) {

    $cunit = mysqli_real_escape_string($con,$_POST['cunit']);
    $time = mysqli_real_escape_string($con,$_POST['time']);
    $amount = mysqli_real_escape_string($con,$_POST['amount']);

    $query = mysqli_query($con,"INSERT INTO `vehicle`( `unit`, `time`, `amount`) VALUES ('$cunit','$time','$amount')");

    if ($query) {
        echo "<script>alert('Item Added Succesfully!!!')</script>";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Charging Point</title>
  </head>
  <body>
    
    <div class="row">
        <div class="col-4">
            <h1 class="text-center fw-boldder mb-5 mt-5">Add Item</h1>
            <form action="" method="post" class="ml-5 mr-5" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleFormControlInput1">Charging Unit</label>
                <input type="text" name="cunit" class="form-control" placeholder="Charging Unit">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Time </label>
                <input type="text" name="time" class="form-control" placeholder="Time">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Amount</label>
                <input type="text" name="amount" class="form-control" placeholder="Amount">
            </div>
            <div class="form-group">
                <button  class="form-control btn btn-primary" name="submit" type="submit">Add Item</button>
            </div>

            </form>
        </div>
        <div class="col-8">
            <h1 class="text-center fw-boldder mb-5 mt-5">Itemset</h1>

            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" class="text-center">Sr. No.</th>
                <th scope="col" class="text-center">Charging Unit</th>
                <th scope="col" class="text-center">Time Duration</th>
                <th scope="col" class="text-center">Price</th>
                </tr>
            </thead>
            <tbody>

            <?php
                    $records = mysqli_query($con, "SELECT * From vehicle ");
                    $i = 1;
                    while($data = mysqli_fetch_array($records))
                    {
                        
                        echo "<tr>";
                        echo "<td class='text-center' value='". $i ."'>" .$i ."</td>";
                        echo "<td class='text-center' value='". $data['unit'] ."'>" .$data['unit'] ." Units</td>";
                        echo "<td class='text-center' value='". $data['time'] ."'>" .$data['time']." Min</td>";
                        echo "<td class='text-center' value='". $data['amount'] ."'>₹ " .$data['amount'] ."</td>";
                            
                        echo "</tr>";
                        $i++;
                    }	
                    ?>  
                    </tbody>
                
            </tbody>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col text-center mt-5">
            <a href="../index.php" class="btn btn-primary w-25 text-center">Back To Main Page</a>
        </div>
    </div>

    <!-- <div class="mt-2">

    </div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>