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
    require_once('../connect.php');
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
         <a class="nav-link" href="manage.html">
         <i class="nav-icon icon-drop"></i> 管理員管理</a>
      <li class="nav-title">前台管理</li>
      <li class="nav-item">
        <a class="nav-link" href="member.html">
          <i class="nav-icon icon-drop"></i> 會員資料管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order.html">
          <i class="nav-icon icon-pencil"></i> 訂單管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewpicture.html">
          <i class="nav-icon icon-pencil"></i> 景點圖片管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="postcard.html">
          <i class="nav-icon icon-pencil"></i> 客製化明信片管理</a>
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


              <!-- 每一頁主要改這個table -->
              <table class="table table-responsive-sm table-sm">
                <thead>
                  <tr>
                    <th>會員編號</th>
                    <th>姓名</th>
                    <th>帳號</th>
                    <th>密碼</th>
                    <th>手機</th>
                    <th>地址</th>
                    <th>信箱</th>
                    <th>帳號狀態</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql="select * from `member` where memNo={$_SESSION['memNo']}";
                  $member = $pdo->query($sql);

                  $member->bindColumn("memName", $memName);
                  $member->bindColumn("memPhone", $memPhone);
                  $member->bindColumn("memAddress", $memAddress);
                  $member->bindColumn("memEmail", $memEmail);

                  ?>

                  <tr>
                    <td><?php echo $['memNo'];?>01</td>
                    <td>淡水豪豪</td>
                    <td>mange1</td>
                    <td>123</td>
                    <td>0912345678</td>
                    <td>123</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr>

                  <!--tr>
                    <td>02</td>
                    <td>桃園凱凱</td>
                    <td>kai123</td>
                    <td>kai123</td>
                    <td>0987887887</td>
                    <td>中央路150號</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td>03</td>
                    <td>楊梅花花</td>
                    <td>hana123</td>
                    <td>hana123</td>
                    <td>0977770770</td>
                    <td>中央路150號</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td>04</td>
                    <td>台北奇奇</td>
                    <td>chi123</td>
                    <td>chi123</td>
                    <td>0912123123</td>
                    <td>中央路150號</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td>05</td>
                    <td>台中喵喵</td>
                    <td>meow123</td>
                    <td>meow123</td>
                    <td>0923330330</td>
                    <td>中央路150號</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td>06</td>
                    <td>台南婷婷</td>
                    <td>tin123</td>
                    <td>tin123</td>
                    <td>0988880881</td>
                    <td>中央路150號</td>
                    <td>123@gmail.com</td>
                    <td>
                      <label class="switch switch-3d switch-success">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-slider" data-checked="" data-unchecked="">                  
                        </span>      
                      </label>
                    </td>
                  </tr> -->
                </tbody>
              </table>


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