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

  <?php
  session_start();
    require_once('connect.php');
  ?>

  
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

    <ul class="nav navbar-nav ml-auto">
      <li class="mr-5">豪豪 您好</li>
    </ul>

    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>


  <div class="app-body">
    <div class="sidebar">
       <!-- sidebar  menu -->
      <nav class="sidebar-nav">
    <ul class="nav">

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
                    <a href="#">會員管理</a>
                </li>
            </ol>
        </nav>
    </div>
       <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">會員管理</div>
            <div class="card-body">
              <button class="btn btn-block btn-outline-primary" type="button">新增會員</button>



              <?php
              

                $sql="SELECT * FROM `member`;";

                $memback = $pdo->query($sql);

                $memback->bindColumn("memNo", $memNo);
                $memback->bindColumn("memAccount", $memAccount);
                $memback->bindColumn("memName", $memName);
                $memback->bindColumn("memPhone", $memPhone);
                $memback->bindColumn("memEmail", $memEmail);
                $memback->bindColumn("memLoginStatus", $memLoginStatus);


              ?>



              <!-- 每一頁主要改這個table -->
              <table class="table table-responsive-sm table-sm">
                <thead>
                  <tr>
                    <th>會員編號</th>
                    <th>帳號</th>
                    <th>姓名</th>
                    <th>手機</th>
                    <th>信箱</th>
                    <th>帳號狀態</th>
                  </tr>
                </thead>



                <tbody>
                <?php
                    while($memback->fetch(PDO::FETCH_ASSOC)){
                      $checktype="";
                      if($memLoginStatus==1){
                        $checktype="checked";
                      }else{
                        $checktype="";
                      }
                  ?>
                  <tr>
                    <td><?=$memNo?></td>
                    <td><?=$memAccount?></td>
                    <td><?=$memName?></td>
                    <td><?=$memPhone?></td>
                    <td><?=$memEmail?></td>
                    <td><?=$memLoginStatus?></td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input id="memLoginStatus<?=$memNo?>" type="checkbox" class="switch-input" <?=$checktype?> onclick="updateMem(<?=$memNo?>, this.checked)">
                        <span class="switch-slider" data-checked="" data-unchecked=""></span>
                      </label>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
               

                </tbody>
              </table>


              <script>
                function updateMem(memNo, memLoginStatus){
                  memLoginStatus = memLoginStatus==false? 0 : 1;
                  location.href="addMem.php?memNo="+memNo+"&memLoginStatus="+memLoginStatus;
                }

              </script>


            </div>
          </div>
        </div>
      </div>
       <!-- end -->
      </div>
    </main>
    <aside class="aside-menu">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
            <i class="icon-list"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
            <i class="icon-speech"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
            <i class="icon-settings"></i>
          </a>
        </li>
      </ul>
      <!-- Tab panes-->


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
        e.target.parentNode.parentNode.children[5].firstChild.removeAttribute("readonly");
        e.target.parentNode.parentNode.children[5].firstChild.classList.remove("dissinputstyle");
        e.target.parentNode.parentNode.children[7].firstChild.removeAttribute("disabled");
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