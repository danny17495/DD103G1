<?php
  $errMsg = "";
  try{
    require_once("connect.php");
    $sql = "select * from `scenicspots`";
    $spots  = $pdo->query($sql);
    $spotRows = $spots -> fetchAll(PDO::FETCH_ASSOC);
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
  <style>
     #logout{
    text-decoration: none;
    }
    
    .dissinputstyle{
      border:none;
      border:transparent;
    }
    .spotcss td:nth-child(2){
      width: 12%;
    }
    .spotcss td:nth-child(3) textarea{
      width: 100%;
    }
    .spotcss th:nth-child(5),
    .spotcss th:nth-child(6),
    .spotcss td:nth-child(5),
    .spotcss td:nth-child(6){
      text-align:center;
    }
  </style>
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
   
    <ul class="nav navbar-nav ml-auto">
      <li class="mr-5"> 您好</li>
 <a class="nav-item mr-3 logOut" href="admin_login.html" id="logout">登出</a>

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
       <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">景點圖片管理</div>
            <div class="card-body">
              <!-- <button class="btn btn-block btn-outline-primary" type="button">新增景點圖片</button> -->


              <!-- 每一頁主要改這個table -->
<?php
if( $errMsg != ""){ //例外
        echo "<div><center>$errMsg</center></div>";
    }elseif($spots->rowCount()==0){
        echo "<div><center>無此資料</center></div>";
    }else{
?>
<?php
  
    foreach( $spotRows as $i => $spotRow){
    
?>
      <form action="updatespotData.php" method="post" enctype="multipart/form-data">
              <table class="table table-responsive-sm table-sm spotcss">
                <thead>
                  <tr>
                    <th>景點編號</th>
                    <th>景點名稱</th>
                    <th>景點描述</th>
                    <th>照片</th>
                    <th>編輯</th>
                    <th>修改</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $spotRow['spotsNo'];?><input name="spotsNo" type="hidden" value="<?= $spotRow['spotsNo']?>" class="dissinputstyle"></td>
                    <td class="spot_td2_name"><input type="text" name="spotsName" value="<?php echo $spotRow['spotsName'];?>" readonly="true" class="dissinputstyle"></td>
                    <td class="spot_td3_dec"><textarea type="text" name="spotsDec" readonly="true" class="dissinputstyle" cols="50"><?php echo $spotRow['spotsDec'];?>
                    </textarea></td>
                    <td>
                      <input type="file" name="spotsPic" disabled>
                    </td>
                    <td><input class="btn1" type="button" value="編輯">
                    </td>
                    <td><input type="submit"  value="修改" disabled></td>
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
  <script>
    var btn1=document.getElementsByClassName("btn1");

    function changeSpot(e){
      console.log(e.target.parentNode.parentNode.children[3].firstChild.nextSibling);

    e.target.parentNode.parentNode.children[1].firstChild.removeAttribute("readonly");   
     e.target.parentNode.parentNode.children[1].firstChild.classList.remove("dissinputstyle"); 
     e.target.parentNode.parentNode.children[2].firstChild.removeAttribute("readonly");   
     e.target.parentNode.parentNode.children[2].firstChild.classList.remove("dissinputstyle");
     // e.target.parentNode.parentNode.children[3].firstChild.removeAttribute("readonly");   
     e.target.parentNode.parentNode.children[3].firstChild.nextSibling.removeAttribute("disabled");
     e.target.parentNode.parentNode.children[5].firstChild.removeAttribute("disabled");
    }

    function doFirst(){
      for(var i=0; i<btn1.length; i++){
        btn1[i].addEventListener("click", changeSpot,false);
      }
    }
    window.addEventListener('load',doFirst);
  </script>
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
      <div class="tab-content">
        <div class="tab-pane active" id="timeline" role="tabpanel">
          <div class="list-group list-group-accent">
            <div
              class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">
              Today</div>
            <div class="list-group-item list-group-item-accent-warning list-group-item-divider">
              <div class="avatar float-right">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
              </div>
              <div>Meeting with
                <strong>Lucas</strong>
              </div>
              <small class="text-muted mr-3">
                <i class="icon-calendar"></i>  1 - 3pm</small>
              <small class="text-muted">
                <i class="icon-location-pin"></i>  Palo Alto, CA</small>
            </div>
            <div class="list-group-item list-group-item-accent-info">
              <div class="avatar float-right">
                <img class="img-avatar" src="img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
              </div>
              <div>Skype with
                <strong>Megan</strong>
              </div>
              <small class="text-muted mr-3">
                <i class="icon-calendar"></i>  4 - 5pm</small>
              <small class="text-muted">
                <i class="icon-social-skype"></i>  On-line</small>
            </div>
            <div
              class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">
              Tomorrow</div>
            <div class="list-group-item list-group-item-accent-danger list-group-item-divider">
              <div>New UI Project -
                <strong>deadline</strong>
              </div>
              <small class="text-muted mr-3">
                <i class="icon-calendar"></i>  10 - 11pm</small>
              <small class="text-muted">
                <i class="icon-home"></i>  creativeLabs HQ</small>
              <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/2.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/3.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/5.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
                </div>
              </div>
            </div>
            <div class="list-group-item list-group-item-accent-success list-group-item-divider">
              <div>
                <strong>#10 Startups.Garden</strong> Meetup</div>
              <small class="text-muted mr-3">
                <i class="icon-calendar"></i>  1 - 3pm</small>
              <small class="text-muted">
                <i class="icon-location-pin"></i>  Palo Alto, CA</small>
            </div>
            <div class="list-group-item list-group-item-accent-primary list-group-item-divider">
              <div>
                <strong>Team meeting</strong>
              </div>
              <small class="text-muted mr-3">
                <i class="icon-calendar"></i>  4 - 6pm</small>
              <small class="text-muted">
                <i class="icon-home"></i>  creativeLabs HQ</small>
              <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/2.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/3.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/5.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img class="img-avatar" src="img/avatars/8.jpg" alt="admin@bootstrapmaster.com">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane p-3" id="messages" role="tabpanel">
          <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
              <div class="avatar">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                <span class="avatar-status badge-success"></span>
              </div>
            </div>
            <div>
              <small class="text-muted">Lukasz Holeczek</small>
              <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt...</small>
          </div>
          <hr>
          <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
              <div class="avatar">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                <span class="avatar-status badge-success"></span>
              </div>
            </div>
            <div>
              <small class="text-muted">Lukasz Holeczek</small>
              <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt...</small>
          </div>
          <hr>
          <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
              <div class="avatar">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                <span class="avatar-status badge-success"></span>
              </div>
            </div>
            <div>
              <small class="text-muted">Lukasz Holeczek</small>
              <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt...</small>
          </div>
          <hr>
          <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
              <div class="avatar">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                <span class="avatar-status badge-success"></span>
              </div>
            </div>
            <div>
              <small class="text-muted">Lukasz Holeczek</small>
              <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt...</small>
          </div>
          <hr>
          <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
              <div class="avatar">
                <img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                <span class="avatar-status badge-success"></span>
              </div>
            </div>
            <div>
              <small class="text-muted">Lukasz Holeczek</small>
              <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt...</small>
          </div>
        </div>
        <div class="tab-pane p-3" id="settings" role="tabpanel">
          <h6>Settings</h6>
          <div class="aside-options">
            <div class="clearfix mt-4">
              <small>
                <b>Option 1</b>
              </small>
              <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                <input class="switch-input" type="checkbox" checked="">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </div>
            <div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</small>
            </div>
          </div>
          <div class="aside-options">
            <div class="clearfix mt-3">
              <small>
                <b>Option 2</b>
              </small>
              <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                <input class="switch-input" type="checkbox">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </div>
            <div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</small>
            </div>
          </div>
          <div class="aside-options">
            <div class="clearfix mt-3">
              <small>
                <b>Option 3</b>
              </small>
              <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                <input class="switch-input" type="checkbox">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </div>
          </div>
          <div class="aside-options">
            <div class="clearfix mt-3">
              <small>
                <b>Option 4</b>
              </small>
              <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                <input class="switch-input" type="checkbox" checked="">
                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
              </label>
            </div>
          </div>
          <hr>
          <h6>System Utilization</h6>
          <div class="text-uppercase mb-1 mt-4">
            <small>
              <b>CPU Usage</b>
            </small>
          </div>
          <div class="progress progress-xs">
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <small class="text-muted">348 Processes. 1/4 Cores.</small>
          <div class="text-uppercase mb-1 mt-2">
            <small>
              <b>Memory Usage</b>
            </small>
          </div>
          <div class="progress progress-xs">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <small class="text-muted">11444GB/16384MB</small>
          <div class="text-uppercase mb-1 mt-2">
            <small>
              <b>SSD 1 Usage</b>
            </small>
          </div>
          <div class="progress progress-xs">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <small class="text-muted">243GB/256GB</small>
          <div class="text-uppercase mb-1 mt-2">
            <small>
              <b>SSD 2 Usage</b>
            </small>
          </div>
          <div class="progress progress-xs">
            <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10"
              aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <small class="text-muted">25GB/256GB</small>
        </div>
      </div>
    </aside>
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
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/pace-progress/pace.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>