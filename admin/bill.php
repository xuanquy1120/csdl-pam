
<?php
session_start();
if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">



</head>
<?php require("./config_database.php");?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("include/menu.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm theo ID đơn hàng" name="id" aria-label="Search" aria-describedby="basic-addon2" value="<?php if(isset($_GET['id'])) {echo $_GET['id'];} ?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="logo/title.png">
              </a>


              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Các hóa đơn</h1>
          <a  class="btn btn-primary" style="margin-bottom:15px;" href="addbill.php" >Thêm hóa đơn</a>
          
          <form id="bill_filter" action="bill.php">
          <select class="form-select btn btn-success" name="var" aria-label="Default select example">
          <option>Tên Nhân Viên</option>

             
             <?php
            $query = "select username from employee";
            $nv=$con->query($query);

            
            while($d = $nv -> fetch_assoc()){
              if(isset($_GET['var']) && ($_GET['var']) !='' && $_GET['var'] == $d['username']){
                $option = "selected";
              }else{
                $option = "";
              }
             ?>
                <option <?php echo $option; ?> value="<?php echo $d['username']?>"><?php echo $d['username']?></option>
             <?php }?>
          </select>
          <div style="display:inline;" class="form-group">
            <label>Từ Ngày: </label>
              <input style="display:inline; width:fit-content" class="form-control"  type="date" name="filter_from" id="datesend" placeholder="Từ" value="<?php if(isset($_GET['filter_from'])) {echo $_GET['filter_from'];} ?>">>           
                           
          </div>
          <div style="display:inline;" class="form-group">
            <label>Đến Ngày: </label>
              <input style="display:inline; width:fit-content" class="form-control"  type="date" name="filter_to" id="datesend" placeholder="Đến"value="<?php if(isset($_GET['filter_to'])) {echo $_GET['filter_to'];} ?>" >           
                           
          </div>

          <button typr="submit" class="btn btn-success float-right">Lọc</button>
          </form>
          

  
          <table class="table table-striped mt-3">
    <thead>
      <tr>
      <!-- <th>
        <?php echo $_SESSION['userid']; ?>
      </th> -->
        <th>Mã hóa đơn</th>
        <th>nhân viên sale</th>
        <th>cân nặng</th>
        <th>tổng tiền</th>
        <th>Ngày gửi </th>
        <th>Ngày nhận</th>
        <th>Xóa</th>
        <th>Cập nhật</th>
        <th>xem</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($_GET['var']) && ($_GET['var']) !='' && ($_GET['var']) !='Tên Nhân Viên'){
        $name= $_GET['var'];
      }else{
        $name="%";
      }
      if(isset($_GET['id']) && ($_GET['id']) !=''){
        $id= $_GET['id'];
      }else{
        $id="%";
      }
      if(isset($_GET['filter_from']) && ($_GET['filter_from']) !='' && isset($_GET['filter_to']) && ($_GET['filter_to']) !=''){
        $filter_from= $_GET['filter_from'];
        $filter_to= $_GET['filter_to'];
        $sel = 'select bill.bill_id, 
        bill.customer_sendname,
        bill.customer_sendtel, 
        bill.customer_receivername,
        bill.customer_receivertel,
        bill.customer_sendadr,
        bill.customer_receiveradr,
        bill.weight,
        bill.fee,
        bill.datesend,
        bill.datereceived,
        bill.idb,
        employee.name 
        from bill,employee where bill.id = employee.id and employee.username like "'.$name.'" 
        and bill_id like "%'.$id.'%" and bill.datesend BETWEEN "'.$filter_from.'" AND "'.$filter_to.'"';
      }else{
        $sel = 'select bill.bill_id, 
        bill.customer_sendname,
        bill.customer_sendtel, 
        bill.customer_receivername,
        bill.customer_receivertel,
        bill.customer_sendadr,
        bill.customer_receiveradr,
        bill.weight,
        bill.fee,
        bill.datesend,
        bill.datereceived,
        bill.idb,
        employee.name 
        from bill,employee where bill.id = employee.id and employee.username like "'.$name.'" 
        and bill_id like "%'.$id.'%" ';
      }
      
      /*and bill.datesend BETWEEN("'.$filter_from.'" AND "'.$filter_to.'") */
        
      

      // $sel="SELECT * FROM signup";
      $ms=$con->query($sel);
      $total_weight = 0;
      $total_fee = 0;

     while($row=$ms->fetch_assoc()){ ?>
      <tr>
       
          <td><?php echo $row['bill_id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['weight']; ?></td>
          <td><?php echo $row['fee']; ?></td>  
          <td><?php echo $row['datesend']; ?></td>
          <td><?php echo $row['datereceived']; ?></td>         
            <td><a onclick="return confirm('Bạn chắc chứ?')" href="deletebill.php?id=<?php echo $row['idb']; ?>"><i class="fas fa-trash-alt"></i></a></td>
           <td><a href="updatebill.php?id=<?php echo $row['idb']; ?>"><i class="far fa-edit"></a></td>
           <td><a href="readbill.php?id=<?php echo $row['idb']; ?>"><i class="fas fa-eye"></a></td>
           
      </tr>
      </tr>
      <?php $total_weight += $row['weight'];
           $total_fee += $row['fee'];
      ?>

    <?php  } ?>
    <hr>
  <tr style="background:gray; color:#fff" >
       
       <td>Tổng</td>
       <td></td>
       <td><strong><?php echo $total_weight; ?> kg</strong></td>
       <td><strong><?php echo $total_fee; ?> VNĐ</strong></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>




        
   </tr>
      
    </tbody>
    
  </table>


        </div>




  
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Xuan Quy &copy; Books </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn muốn thoát không</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc muốn thoát không</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
          <a class="btn btn-primary" href="logoutfetch.php">Đăng Xuất</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>