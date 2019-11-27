<?php
  $errMsg = "";
  try{
    require_once("connect.php");
    $sql = "select * from `orderform`";
    $orders  = $pdo->query($sql);
    $orderRows = $orders -> fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>九份客棧後台</title>
  <!-- Icons-->
  <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
 <!-- top_header -->
 <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="img/logo.png" width="50" height="40" alt="CoreUI Logo">
      <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
   <!--  <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Dashboard</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Users</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link" href="#">Settings</a>
      </li>
    </ul> -->
    <ul class="nav navbar-nav ml-auto">
      <li class="mr-5">豪豪 您好</li>


     <!--  <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
          <i class="icon-bell"></i>
          <span class="badge badge-pill badge-danger">5</span>
        </a>
      </li>
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
          <i class="icon-list"></i>
        </a>
      </li>
      <li class="nav-item d-md-down-none">
        <a class="nav-link" href="#">
          <i class="icon-location-pin"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-bell-o"></i> Updates
            <span class="badge badge-info">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-envelope-o"></i> Messages
            <span class="badge badge-success">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-tasks"></i> Tasks
            <span class="badge badge-danger">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-comments"></i> Comments
            <span class="badge badge-warning">42</span>
          </a>
          <div class="dropdown-header text-center">
            <strong>Settings</strong>
          </div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-wrench"></i> Settings</a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-usd"></i> Payments
            <span class="badge badge-secondary">42</span>
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-file"></i> Projects
            <span class="badge badge-primary">42</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-shield"></i> Lock Account</a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li> -->
    </ul>
    <!-- <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>


  <div class="app-body">
    <div class="sidebar">
       <!-- sidebar  menu -->
      <nav class="sidebar-nav">
    <ul class="nav">
      <!-- <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="nav-icon icon-speedometer"></i> Dashboard
          <span class="badge badge-primary">NEWs</span>
        </a>
      </li> -->
       <li class="nav-title">後台管理</li>
         <a class="nav-link" href="manage.php">
         <i class="nav-icon icon-drop"></i> 管理員管理</a>
      <li class="nav-title">前台管理</li>
      <li class="nav-item">
        <a class="nav-link" href="member.php">
          <i class="nav-icon icon-drop"></i> 會員資料管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order.php">
          <i class="nav-icon icon-pencil"></i> 訂單管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewpicture.php">
          <i class="nav-icon icon-pencil"></i> 景點圖片管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="postcard.html">
          <i class="nav-icon icon-pencil"></i> 客製化明信片管理</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="report.html">
          <i class="nav-icon icon-pencil"></i> 檢舉留言管理</a>
      </li>
     
    </ul>
  </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <main class="main">


     
      <!-- </ol> -->
      <div class="container-fluid">
   
       <!-- 中間內容 -->
             <div class="container-fluid">
   
       <!-- 中間內容 -->
             <div class="container-fluid">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">九份客棧</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">訂單管理</a>
                </li>
            </ol>
        </nav>
    </div>
       <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">訂單管理</div>
            <div class="card-body">
              <button class="btn btn-block btn-outline-primary" type="button">新增訂單</button>


              <!-- 每一頁主要改這個table -->
<?php
if( $errMsg != ""){ //例外
        echo "<div><center>$errMsg</center></div>";
    }elseif($orders->rowCount()==0){
        echo "<div><center>無此資料</center></div>";
    }else{
?>
<?php
  
    foreach( $orderRows as $i => $orderRow){
    
?>


<form action="deleteOrderData.php">
              <table class="table table-responsive-sm table-sm">
                <thead>
                  <tr>
                    <th>訂單編號</th>
                    <th>訂購會員編號</th>
                    <th>訂購日期</th>
                    <th>收件姓名</th>
                    <th>收件手機</th>
                    <th>刪除訂單</th>
                  </tr>
                </thead>
               <tbody>
          
                  
    
                  <tr>
                    <td>
                      <?php echo $orderRow['orderNo'];?><input name="orderNo" type="hidden" value="<?= $orderRow['orderNo']?>" class="dissinputstyle">
                    </td>

                    <td class="order_td2">
                      <input type="text" name="memNo" value="<?php echo $orderRow['memNo'];?>" readonly="true" class="dissinputstyle">
                    </td>

                    <td class="order_td3">
                      <input type="text" name="startDate" value="<?php echo $orderRow['startDate'];?>" readonly="true" class="dissinputstyle">
                    </td>

                    <td class="order_td4">
                      <input type="text" name="shippingName" value="<?php echo $orderRow['shippingName'];?>" readonly="true" class="dissinputstyle">
                    </td>
                 


                    <td class="order_td5">
                      <input type="text" name="shippingPhone" value="<?php echo $orderRow['shippingPhone'];?>" readonly="true" class="dissinputstyle">
                    </td>

                    <td>
                      <input class="btn btn-block btn-outline-primary" type="submit" value="刪除">
                    </td>



                  </tr>
 
                </tbody>



              </table>
            </form>
 <?php
    }
  }
  ?>

            </div>
          </div>
        </div>
      </div>
       <!-- end -->
      </div>
    </main>
   
  </div>
  <footer class="app-footer">
        <div>
          <a href="https://coreui.io">CoreUI</a>
          <span>&copy; 2018 creativeLabs.</span>
        </div>
        <div class="ml-auto">
          <span>Powered by</span>
          <a href="https://coreui.io">CoreUI</a>
        </div>
      </footer>
  <!-- CoreUI and necessary plugins-->
  <script>
      function reversechange(e){
        console.log(e.target.parentNode.parentNode.children[1]);   
        e.target.parentNode.parentNode.children[1].firstChild.removeAttribute("readonly");   
        e.target.parentNode.parentNode.children[3].firstChild.removeAttribute("readonly");   
        e.target.parentNode.parentNode.children[4].firstChild.removeAttribute("readonly");
        e.target.parentNode.parentNode.children[1].firstChild.classList.remove("dissinputstyle");
        e.target.parentNode.parentNode.children[3].firstChild.classList.remove("dissinputstyle");
        e.target.parentNode.parentNode.children[4].firstChild.classList.remove("dissinputstyle");
        e.target.parentNode.parentNode.children[6].firstChild.removeAttribute("disabled");
     
      }
      
    
    var btn1= document.getElementsByClassName('btn1');
    function doFirst(){
      for(i=0; i<btn1.length;i++){
        btn1[i].addEventListener('click',reversechange,false);
      }
    }
    window.addEventListener('load',doFirst);
    
  </script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/pace-progress/pace.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>