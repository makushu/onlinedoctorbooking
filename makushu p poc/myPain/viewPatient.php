<!DOCTYPE html>
<html>
    <head>
        <title>Dr MYPAIN</title>
        <meta charset="UTF-8">
        <meta name="description" content="Dr Mypain online booking">
        <meta name="author" content="Phatutshedzo Makushu">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="theCss.css">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php
        //session starts
        session_start();
        $sess_user = $_SESSION['sess_user'];

        //page with database basics included
        include 'db.php';
        ?>


            <?php
            $dateAndTime = $_GET['dateAndTime'];
            $result = $mysqli->query("SELECT * from book where dateAndTime='$dateAndTime'") or
                    die($mysqli->error);

            $row = $result->fetch_array();
            $dateAndTime = $row['dateAndTime'];
            $reason = $row['reason'];
            $name = $row['name'];
            ?>
        
             <center><h1><?php echo $name; ?>'s file</h1></center>


                <!-- table that displays patient details -->
                <table align="center" id="show">
                    <tr>    
                        <th>DATE AND TIME</th>
                        <th>REASON FOR APPOINTMENT</th>
                        <th>DIAGNOSIS</th>
                    </tr>

                    <?php
                    $result = $mysqli->query("SELECT * FROM book where name='$name'") or die($mysql->error);


                    while ($display = $result->fetch_assoc()):
                        $dateAndTime = $display['dateAndTime'];
                        $reason = $display['reason'];
                        $diagnosis = $display['diagnosis'];
                        ?>
                        <tr>
                            <td height=34px> <?php echo $dateAndTime; ?> </td>
                            <td> <?php echo $reason; ?> </td>
                            <td> <?php echo $diagnosis; ?> </td>  
                        </tr>            



                        <?php
                    endwhile;
                    ?>
                     					
                </table>

            <div class="container fixed-bottom">
                <nav class="navbar navbar-dark bg-dark">


                    <div class="btn-group dropup">
                        <a href="doctor.php">BACK TO PATIENTS</a>


                    </div>

                    <div class="btn-group dropup">
                        <a href="index.php">LOGOUT</a>

                    </div>


                </nav>  
            </div>



    </body>
</html>
