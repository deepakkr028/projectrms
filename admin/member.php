<?php 
  require("../include/connection.php");
  require("../include/restrictadmin.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>E-RATION</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    
       <link rel="stylesheet" href="style.css">

          <style type="text/css">
            body{
              background-color:lightblue;
            }

         </style>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </head>
  <body>

     
    <nav class="navbar navbar-default ">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-size:25px ;color:blue;"><b><i class="fa fa-tachometer" aria-hidden="true"></i> ADMIN PANEL</b></a>
          
            <h4 align="left" style="margin-left:220px; color:red;" >
                    welcome
                        <?php 
                        echo$_SESSION['user']
                          ?>   
           </h4>

          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">

               <li><a href="logout.php" ><b>  <i class="fa fa-sign-out" aria-hidden="true"></i> logout </a></li>
            
           </ul>
          </div>
        </div>
   </nav> 
            <section>
                 <div class="row">
                    <div class="col-md-3"style="margin:10px;">

                        <div class="list-group">
                            <a href="#" class="list-group-item active"> <i class="fa fa-tachometer" aria-hidden="true"></i> ADMIN PANEL</a>

                            <a href="adddealer.php" class="list-group-item"> <i class="fa fa-registered" aria-hidden="true"></i> REGISTER DEALERS</a>

                            <a href="notification.php" class="list-group-item"><i class="fa fa-flag-checkered" aria-hidden="true"></i> NOTIFICATION</a>
                            <a href="notificationsettig.php" class="list-group-item"><i class="fa fa-flag-checkered" aria-hidden="true"></i> <i class="fa fa-cog" aria-hidden="true"></i> NOTIFICATION SETTING</a>
                            <a href="price.php" class="list-group-item"><i class="fa fa-usd" aria-hidden="true"></i> PRICE</a>
                            <a href="pricesetting.php" class="list-group-item"> <i class="fa fa-eye" aria-hidden="true"></i> <i class="fa fa-usd" aria-hidden="true"></i> VIEW PRICE </a>

                            <a href="adminmain.php" class="list-group-item"><i class="fa fa-user-circle-o" aria-hidden="true"></i> dealers list</a>

                            <a href="comments.php" class="list-group-item"> <i class="fa fa-comment" aria-hidden="true"></i> Comments</a>
                            <a href="member.php" class="list-group-item"><i class="fa fa-list" aria-hidden="true"></i>  RATION MEMBERS LISTS</a>

                      </div>

                    </div>

                  <div class="col-md-8" style="">
                  
                    <div class="col-md-9">
                      <h1><i class="fa fa-list" aria-hidden="true"></i>  RATION MEMBERS <small>View All Ration Members</small></h1><hr>
                      <ol class="breadcrumb">
                          <li><a href="adminmain.php"> <i class="fa fa-tachometer" aria-hidden="true"></i> ADMIN PANEL </a></li>
                        <li class="active"><i class="fa fa-list" aria-hidden="true"></i>  RATION MEMBERS</li>
                      </ol>



                 <div class="search" style=" margin-bottom:5px;">
                  <form  action="" method="POST">
                        <div class="input-group">
                          <input type="text" class="form-control" name="searchvalue" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button name="search" class="btn btn-default">Go!</button>
                          </span>
                        </div>
                  </form>
                </div>
              
                
                        
                          <table class="table table-bordered table-striped table-hover"style="margin-left:auto;" >
                            <h6 align="left" style=""> search result... </h1> 

                                    <?Php
                                      if(isset($_POST['search']))
                                      {
                                        $search =$_POST['searchvalue'];
                                          
                                        $sql = "(SELECT * FROM addrationmember 
                                        where  nam='$search' or  rationcardnumber='$search' or cardtype='$search'
                                        or mobileno='$search' or fname='$search' or ocode='$search' )";
                                            $query= mysqli_query($con,$sql); 
                                            while($row=mysqli_fetch_array($query)){ 
                                  ?>
                      
                                        
                                          <tr>
                                              <td> <?php echo $row['id'];  ?> </td>
                                              <td> <?php echo $row['nam']; ?> </td>
                                              <td> <?php echo $row['fname']; ?> </td>
                                              <td> <?php echo $row['mobileno']; ?> </td>
                                              <td> <?php echo $row['houseno']; ?>,
                                              <?php echo $row['landmark']; ?> , <?php echo $row['villagetown']; 
                                              ?>  ,<?php echo $row['tehsil']; ?>  , <?php echo $row['district']; ?> ,
                                              <?php echo $row['stat']; ?></td>
                                              <td> <?php echo $row['rationcardnumber']; ?> </td>
                                              <td> <?php echo $row['cardtype']; ?> </td>
                                              <td> <?php echo $row['oname']; ?> </td>
                                              <td> <?php echo $row['ocode']; ?> </td>
                                              <td> <?php echo $row['income']; ?> </td>
                                              <td>  <a href="..//editd.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square" aria-hidden="true"></i>  </td>
                                              <td> <a href="..//deleted.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> </td>
                                            </tr>
                              
                              <?php   
                                              }
                                          }
                                      
                            ?>

                  </table>
     
                                    <hr>

                        <table class="table table-bordered table-striped table-hover" style="margin-left:auto;"
                                <tr border=4px;>
                                      <th>ID</th>
                                      <th>Name</th>
                                      <th>Father/Sponser Name</th>
                                      <th>Mobile No</th>
                                      <th>Address</th>
                                      <th>Ration Card No</th>
                                      <th>Card Type</th>
                                      <th>Delear Name</th>
                                      <th>Shop Code </th>
                                      <th>Income</th>
                                      <th>Edit</th>
                                      <th>Deleate</th>
                              </tr>

                            <?php
                                    $sql = "(SELECT id,nam,fname,mobileno,rationcardnumber,
                                    cardtype,income,houseno,landmark,villagetown,tehsil,district,stat,oname,ocode FROM addrationmember)";
                                    $result = mysqli_query($con, $sql);
                                      while($row=mysqli_fetch_array($result)){
                          ?>

                                    <tr>
                                      <td> <?php echo $row['id'];  ?> </td>
                                      <td> <?php echo $row['nam']; ?> </td>
                                      <td> <?php echo $row['fname']; ?> </td>
                                      <td> <?php echo $row['mobileno']; ?> </td>
                                      <td> <?php echo $row['houseno']; ?>,
                                      <?php echo $row['landmark']; ?> , <?php echo $row['villagetown']; 
                                      ?>  ,<?php echo $row['tehsil']; ?>  , <?php echo $row['district']; ?> ,
                                      <?php echo $row['stat']; ?></td>
                                      <td> <?php echo $row['rationcardnumber']; ?> </td>
                                      <td> <?php echo $row['cardtype']; ?> </td>
                                      <td> <?php echo $row['oname']; ?> </td>
                                      <td> <?php echo $row['ocode']; ?> </td>
                                      <td> <?php echo $row['income']; ?> </td>
                                      <td>  <a href="..//editd.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-pencil-square" aria-hidden="true"></i>  </td>
                                      <td> <a href="..//deleted.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> </td>
                                    </tr>
                                      <?php
                                      }
                                      ?>
                        </table>

                    </div>
       
                  </div>
              </div>
            
            </section>
   
            <?php
              include("..//include/footer.php");
           ?>

  </body>
  
</html>
