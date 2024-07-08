<?php session_start();
//DB conncetion
include_once('includes/config.php');
error_reporting(0);
//validating Session
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BP Monitoring Management System  | B/w Dates Report</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
  <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
<?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$familymember=$_POST['familymember'];
$familymemberdata=explode("-", $familymember);
$fid=$familymemberdata['0'];
$familname=$familymemberdata['1'];
$uid=intval($_SESSION['aid']);

?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">B/W Dates Report Result From <?php echo $fdate;?> to <?php echo $tdate;?> of <?php echo $familname;?></h1>
    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">B/W Dates Report Results</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="assignto" method="post">
<table border="1" class="table table-striped">
    <?php 

 $query=mysqli_query($con,"select * from tblfamilymembers where userId='$uid' and id='$fid'");
$cnt=1;
while($row=mysqli_fetch_array($query)){
    ?>
    <tr>
        <th>Family Member Name</th>
        <td><?php echo $row['memberName'];?></td>
    </tr>
        <tr>
        <th>Relation</th>
        <td><?php echo $row['memberRelation'];?></td>
    </tr>
        <tr>
        <th>Age</th>
        <td><?php echo $row['memberAge'];?></td>
    </tr>
<?php } ?>
</table>
<h5 style="color:blue">BP Records</h5>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                  <tr>
                                            <th>Sno.</th>
                                            <th>BP SYS/DIA</th>
                                            <th>Pulse /min</th>
                                            <th>BP Date Time</th>
                                            <th>Posting Date</th>
                            
                                        </tr>
                                    </thead>
                                 
                     
                                     <tbody>
<?php 
$query=mysqli_query($con,"select *,tblbpdetails.id as bpid from tblbpdetails 
left join tblfamilymembers on tblfamilymembers.id=tblbpdetails.memberId
where tblbpdetails.userId='$uid' and (date(postingTime) between '$fdate' and '$tdate') and tblbpdetails.memberId='$fid'");
$cnt=1;
$count=mysqli_num_rows($query);
if($count>0){
while($row=mysqli_fetch_array($query)){
?>

                                        <tr>
                                            <td><?php echo $cnt;?></td>
            
                                             <td><?php echo $sys=$row['systolic'];?>/<?php echo $dia=$row['diastolic'];?></td>
                                            <td><?php echo $pulse=$row['pulse'];?></td>
                                            <td><?php echo $row['bpDateTime'];?></td>
                                            <td><?php echo $row['postingTime'];?></td>
                                            <td>

    

                              </td>
                                        </tr>
                               <?php $cnt++;
$tsys+=$sys;
$tdia+=$dia;
$tpulse+=$pulse;
                           } ?>
<tr>
    <th>Average</th>
    <td><?php echo $tsys/$count;?>/ <?php echo $tdia/$count;?></td>
    <td colspan="3"><?php echo $tpulse/$count;?>
</tr>

                        <?php     } else {?>
                                  <tr>
                                            <td colspan="5" style="color:red; font-size:22px;">No Record Found</td>
            
                                     
                                        </tr>
                               <?php } ?>
                                    </tbody>
                                </table>
                                     </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
    <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php');?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
<?php } ?>