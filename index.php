<?php

include 'include/dbconn.php';

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
    <style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1593941707882-a5bba14938c7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
  </head>
  <body>
    <div class="bg">

    <h1 class="text-center text-white font-weight-bold" style="padding-top:3%">Charging Point</h1>
    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" class="text-center text-white font-weight-bold">Sr. No.</th>
                <th scope="col" class="text-center text-white font-weight-bold">Charging Unit</th>
                <th scope="col" class="text-center text-white font-weight-bold">Time Duration</th>
                <th scope="col" class="text-center text-white font-weight-bold">Price</th>
                <th scope="col" class="text-center text-white font-weight-bold">Book</th>
                </tr>
            </thead>
            <tbody>

            <?php
                    $records = mysqli_query($con, "SELECT * From vehicle ");
                    $i = 1;
                    while($data = mysqli_fetch_array($records))
                    {
                        
                        echo "<tr>";
                        echo "<td class='text-center text-white font-weight-bold' value='". $i ."'>" .$i ."</td>";
                        echo "<td class='text-center text-white font-weight-bold' value='". $data['unit'] ."'>" .$data['unit'] ." Units</td>";
                        echo "<td class='text-center text-white font-weight-bold' value='". $data['time'] ."'>" .$data['time']." Min</td>";
                        echo "<td class='text-center text-white font-weight-bold' value='". $data['amount'] ."'>₹ " .$data['amount'] ."</td>";
                        echo "<td class='text-center text-white font-weight-bold'><form action='pay_page.php' method='POST'>
                                <input type='hidden' value=".$data['amount']." id='amt' name='amount'>
                                <input type='submit' class='btn btn-primary' name='pay' value='Book Now'>
                            </form></td>";
                        echo "</tr>";
                        $i++;
                    }	
                    ?>  
                    </tbody>
                
            </tbody>
            </table>

    </div>
              
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
    function pay_now(){
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'pay_page.php',
               data:"amt="+amt,
               success:function(result){
                  console.log(result);
               }
           });
        
        
    }
</script>
  </body>
</html>