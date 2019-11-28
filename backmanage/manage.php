<?php
  $errMsg = "";
  try{
    require_once("connect.php");

    $sql = "select * from admin";
    $admins  = $pdo->query($sql);
    $adminRows = $admins -> fetchAll(PDO::FETCH_ASSOC);
   // echo print_r($adminRows);

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
  .dissinputstyle {
    -webkit-appearance: none;
    -moz-appearance: none;
    outline: 0;
    border: 1px solid transparent;
}
 .switch-input:checked + label .switch-slider {
    background-color: #4dbd74;
    border-color: #3a9d5d;
}
 .switch-input:checked + label .switch-slider:before {
    border-color: #3a9d5d;
    transform: translateX(14px);
 }
#add td{
  padding-top:10px
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
      <li class="mr-5">登出</li>


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
                    <a href="#">管理員管理</a>
                </li>
            </ol>
        </nav>
    </div>

       <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">管理員管理</div>
            <div class="card-body">
              <!-- <button class="btn btn-block btn-outline-primary" type="button">新增管理員</button> -->


                </div>
            <div class="card-body">
             
              <!-- 每一頁主要改這個table -->
              <table class="table table-responsive-sm table-sm">
                <thead>
                  <tr>
                    <th>管理員名稱</th>
                    <th>管理員帳號</th>
                    <th>管理員密碼</th>
                    <th></th>
                    <th></th>
                    <th>管理員停權</th>
                  </tr>
                </thead>
                <tbody>
                  <tr> 
                        <form action="addAdminData.php" method="post" id="add">
                          
                              <td>
                                <input type="text" name="adminName" id="" maxlength="10" required>
                              </td>
                              <td>
                                <input type="text" name="adminId" id="" maxlength="10" required>
                              </td>
                              <td>
                                <input type="text" name="adminPsw" id="" maxlength="15" required>
                              </td>
                              <td colspan="2">
                                <input class="btn btn-block btn-outline-primary addbtn" type="submit" value="新增">
                              </td>
                      
                          </form>
                </tr>
            <?php
     foreach( $adminRows as $i => $adminRow){
  ?>
           
                  <tr>
                  <form action="updateAdminData.php" method="post">
                    <input name="adminNo" type="hidden" value="<?= $adminRow['adminNo']?>" style="display:none">
                    <td><input type="text" readonly="true" class="dissinputstyle" name="adminName" value="<?php echo $adminRow['adminName'];?>"></td>
                    <td><input type="text" readonly="true" class="dissinputstyle" name="adminId" value="<?php echo $adminRow['adminId'];?>"></td>
                    <td><input type="text" readonly="true" class="dissinputstyle" name="adminPsw"  value="<?php echo $adminRow['adminPsw'];?>"></td>
                    <td> 
                        <button type="button" class="btn btn-pill btn-danger btn-xl edit" >編輯</button>
                    </td>
                  </form>
      
                    <td>
                       <form action="deleteAdminDate.php" id="statusForm" method="GET">
                            <input name="adminNo" type="hidden" value="<?= $adminRow['adminNo']?>">
                            <input class="btn btn-pill btn-primary btn-xl" type="submit" value="刪除">
                        </form>
     
                    </td>
                   
                    <td>
                     <form action="#" class="status">
                            <input name="adminNo" type="hidden" class="No" value="<?= $adminRow['adminNo']?>" style="display:none">
                            <input type="hidden"  name="adminStatus" value="<?= $adminRow['adminStatus']?>" style="opacity:0">
                            <input type="checkbox" class="switch-input change" id="change<?= $adminRow['adminNo']?>"  value="<?= $adminRow['adminStatus']?>">
                            <label class="switch switch-3d  switch-success status " for="change<?= $adminRow['adminNo']?>">
                              <span class="switch-slider">
                              </span>      
                            </label>
                   </form>
                       
                    </td>
                     
                  </tr>
                  <script>
                  
                  
                  </script>
            
   <?php
     }
   ?>
                  <!-- <tr>
                    <td>月月</td>
                    <td>b123456</td>
                    <td><select name="" id="">
                      <option value="">唯獨</option>
                      <option value="">管理員</option>
                    </select></td>
                    <td> <button type="button" class="btn btn-pill btn-primary btn-xl">編輯</button></td>
                    <td>
                      <button type="button" class="btn btn-pill btn-danger btn-xl">刪除</button>
                    </td>
                  </tr>
                  <tr>
                    <td>喬喬</td>
                    <td>g123456</td>
                    <td><select name="" id="">
                        <option value="">唯獨</option>
                      <option value="">管理員</option>
                    </select></td>
                    <td> <button type="button" class="btn btn-pill btn-primary btn-xl">編輯</button></td>
                    <td>
                      <button type="button" class="btn btn-pill btn-danger btn-xl">刪除</button>
                    </td>
                  </tr>
                  <tr>
                    <td>亭亭</td>
                    <td>c123456</td>
                    <td><select name="" id="">
                        <option value="">唯獨</option>
                      <option value="">管理員</option>
                    </select></td>
                    <td> <button type="button" class="btn btn-pill btn-primary btn-xl">編輯</button></td>
                    <td>
                      <button type="button" class="btn btn-pill btn-danger btn-xl">刪除</button>
                    </td>
                  </tr>
                  <tr>
                    <td>愷愷</td>
                    <td>d123456</td>
                   <td><select name="" id="">
                        <option value="">唯獨</option>
                      <option value="">管理員</option>
                   </select></td>
                    <td> <button type="button" class="btn btn-pill btn-primary btn-xl">編輯</button></td>
                    <td>
                      <button type="button" class="btn btn-pill btn-danger btn-xl">刪除</button>
                    </td>
                  </tr>
                  <tr>
                    <td>靜靜</td>
                    <td>e123456</td>
                    <td><select name="" id="">
                      <option value="">唯獨</option>
                      <option value="">管理員</option>
                    </select></td>
                    <td> <button type="button" class="btn btn-pill btn-primary btn-xl">編輯</button></td>
                    <td>

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





<script>
      $('document').ready(function(){

        $('body').on('click', '#addAdmin', function () {
          // alert('hello');
        let newAdmin = $("<tr id='newAdmin'></tr>").html(
                          `
                          <td><input id="adminName" type="text"></td>
                          <td><input id="adminId" type="text"></td>
                          <td><input id="adminPsw" type="text"></td>
                          <td>
                          <button type="button" class="btn btn-pill btn-success btn-xl" id="yesAddAdmin">新增</button>
                          </td>
                          <td>    
                          <button type="button" class="btn btn-pill btn-secondary btn-xl" id="cancelAddAdmin">取消</button>
                          </td>`);
              if ($('.newAdmin').length == 0) {
              $('.admAdd').append(newAdmin);
              }
        })

          $('body').on('click', '#cancelAddAdmin', function () {
                          this.parentElement.parentElement.remove();
                      })


          $('body').on('click', '#yesAddAdmin', function () {
                          let adminId = $('#adminId').val();
                          let adminPsw = $('#adminPsw').val();
                          let adminName = $('#adminName').val();
                          let adminStat = $('#adminStatus').val();

                          if ((adminId && adminPsw)) {
                              $.ajax({
                                  type: 'POST',
                                  url: `./php/newAdmin.php`,
                                  data: {
                                     
                                      adminId,
                                      adminPsw,
                                      adminName,
                                      adminStatus,
                                      action: 'addAdmin',
                                  },
                                  success: function (getNoRows) {
                                      let getNo = JSON.parse(getNoRows);
                                      let newAdmin = "";
                                        newAdmin += `<tr>`;
                                        newAdmin += `<td>${adminId}</td>`;
                                        newAdmin += `<td>${adminPsw}</td>`;
                                        newAdmin += `<td>${adminName}</td>`;
                                        // newAdmin += `<td>${adminStat}</td>`;
                                        newAdmin += `<td>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                                            data-target="#alertModal" id="delAdmin">刪除
                                                    </button>
                                                    </td>`;
                                        newAdmin += `</tr>`;                               
                                      $('.admAdd').append(newAdmin);
                                      $('#newAdmin').remove();
                                      alert('新增成功');
                                  },
                              });
                          } else {
                              alert('帳號或密碼不能為空白');
                          }
                      })
          $('body').on('click', '#delAdmin', function () {
            let adminNo = $(this).parent().parent().children().first().text();
            let dead = this;
            //  alert(adminNo);
                  $.ajax({
                          type: "POST",
                          url: `./php/delAdmin.php`,
                          data:{
                            adminNo:adminNo
                          },
                          success: function (deleteBack) {
                            alert('刪除成功');
                            $(dead.parentElement.parentElement).remove();
                          },
                          error: function () {
                              alert('fail');
                          }
                      })
            })             
    


      //-------------------------------------------------------------------------------------------
      let storage = sessionStorage;
      let url = "./php/admin.php";
        function admManage(){
        let xhr = new XMLHttpRequest();
        xhr.onload = function(){
          if(xhr.status == 200){ //server OK
            let dataString = JSON.parse(xhr.responseText);
            let htmlStr = '';
            for (i = 0; i < dataString.length; i++) {
                      htmlStr += `<tr>`;
                      htmlStr += `<td>${dataString[i].adminId}</td>`;
                      htmlStr += `<td>${dataString[i].adminPsw}</td>`;
                      htmlStr += `<td>${dataString[i].adminName}</td>`;
                      // htmlStr += `<td>${dataString[i].adminStat}</td>`;
                      htmlStr += `<td>
                                  <button class="btn btn-danger" type="button" data-toggle="modal"
                                          data-target="#alertModal" data-whatever="@delete" id="delAdmin">刪除
                                  </button>
                                  </td>`;
                      htmlStr += `</tr>`;
                      // $('.memAdd').append(htmlStr);
                      document.querySelector(".admAdd").innerHTML= htmlStr;
            }  
          }else{ //error
            alert(xhr.status);
          }
        } //xhr function end
        xhr.open("get", "./php/admin.php", true);
        // xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        xhr.send( null );
        }
        admManage();
      })    
    </script>
    <script>
    
    
    
    </script>



  <!-- CoreUI and necessary plugins-->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/pace-progress/pace.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>

  <script>

     let change=document.querySelectorAll('.change');
      change.forEach(function(dom){
          if(dom.value=="0"){ //停用
              dom.setAttribute("checked",true);
          }
      });

  $('.edit').click(function(){
  
  
    if( $(this).text()=="編輯"){
      $(this).parent().prevAll().children().attr("readonly",false);
      $(this).text("完成");
    //  $(this).attr('type','submit');
    }else{
        $(this).parent().prevAll().children().attr("readonly",true);
       $(this).text("編輯");
        $(this).attr('type','submit');
    }
      $(this).parent().prevAll().children().toggleClass('dissinputstyle');
    
  });


$(".change").change(function() { 

    if ($(this).prop('checked')) { 
      $(this).val(0);
      $(this).prev().val(0);  
    } 
    else { 
      $(this).val(1);
      $(this).prev().val(1);
    } 


    $.get(`updateAdminData2.php?adminNo=${$(this).prev('input').prev('input').val()}&&adminStatus=${$(this).val()}`,function(data){
            console.log('data');
    });
    

});

  </script>

  
</body>
</html>