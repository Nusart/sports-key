<?php
// Session start.
session_start();
include_once 'database.php';
$sql = "SELECT * FROM entries";
$result = mysqli_query($conn,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Sports key issue portal</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <!-- library bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/modal.css">
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md navtop">
            <div>
                <h1>Sports Key Issue Portal</h1>
                <button type="button" data-toggle="modal" data-target="#loginModal">
                    <i class="fas fa-sign-in-alt"></i>Login
                </button>
            </div>
        </nav>
        
        
        <!-- modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-title text-center">
                  <i class="fas fa-key fa-4x"></i>
                </div>
                <div class="d-flex flex-column text-center">
                  <form action="authenticate.php" method="post">
                    <div class="form-group">
                      <input type="text" id="login" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" value="Login" id="btn_submit">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        <!-- main -->
        <div class="container">
            <!--display current date-->
            <br>
            <div class="text-center"><h4></h4></div>
            <br>
            
            <script>
                var objToday = new Date(),

weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
dayOfWeek = weekday[objToday.getDay()],

domEnder = function() { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
dayOfMonth = today + ( objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,

months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
curMonth = months[objToday.getMonth()],

curYear = objToday.getFullYear();
//curHour = ("0" + objToday.getHours()).slice(-2),
//curMin = ("0" + objToday.getMinutes()).slice(-2),
//curSec = ("0" + objToday.getSeconds()).slice(-2);                
                
var today = "Today- " + " " + dayOfMonth + " of " + curMonth + ", " + curYear + " " + dayOfWeek;
document.getElementsByTagName('h4')[0].textContent = today;
            </script>
            
            <!-- table user all  -->
            <table id="tableHorizontalWrapper" class="table table-striped table-bordered table-sm text-center tabel-fixed" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Roll No.</th>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>Court</th>
                        <th>Issue Time</th>
                        <th>Return Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["roll"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php echo $row["court"]; ?></td>
                        <td><?php echo $row["issue_time"]; ?></td>
                        <td><?php echo $row["return_time"]; ?></td>
                    </tr>
                    <?php 
                        } 
                    ?>
                    <?php
                        // close connection database
                        mysqli_close($conn);
                    ?>
                                
                </tbody>
            </table>
                    
            <form action="return.php" method="post" class="text-right"><button type="submit" class="btn btn-outline-danger btn-sm">Return</button></form>
            <br>
        </div>

        
        <!--footer-->
        <div class="container-fluid footer">
            <div class="text-center">
                <p> Developed by Sarthak Mishra </p>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <script src="js/date.js"></script>
        
     </body>
</html>
