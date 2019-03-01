
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="/admin_public/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="/admin_public/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="/admin_public/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->      
    <link href="/admin_public/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/admin_public/assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><strong><i class="icon fa fa-plane"></i>Homie action后台</strong></a>
                <a class="navbar-brand" href="index.html"><strong><i class="icon 
        <div id="sideNav" href="">
        <i class="fa fa-bars icon"></i> 
        </div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>头像</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> 设置</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"><i class="icon-users"></i>用户管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/users">用户列表</a>
                            </li>
                            <li>
                                <a href="/admin/users/create">用户添加</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-users"></i>分类管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/cates">分类列表</a>
                            </li>
                            <li>
                                <a href="/admin/cates/create">分类添加</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-users"></i>友情链接管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/link">申请列表</a>
                            </li>
                            <li>
                                <a href="/admin/link/agree">通过审核列表</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
      
        <div id="page-wrapper">

          <div class="header">
            <!-- 内容开始 -->       
                <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
                    <div class="row">
                        <br>
                        <!-- 显示错误信息 -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @section('content')


                        @show
                    </div>  
            </div>  
        </div>
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
            </div>
                </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">    
                </div>  

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


    <!-- jQuery Js -->
    <script src="/admin_public/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="/admin_public/assets/js/bootstrap.min.js"></script>
     

     
    <script src="/admin_public/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="/admin_public/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/admin_public/assets/js/morris/morris.js"></script>
    
    
    <script src="/admin_public/assets/js/easypiechart.js"></script>
    <script src="/admin_public/assets/js/easypiechart-data.js"></script>
    
     <script src="/admin_public/assets/js/Lightweight-Chart/jquery.chart.js"></script>
    
    <!-- Custom Js -->
    <script src="/admin_public/assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="/admin_public/assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="/admin_public/assets/js/chartjs.js"></script> 

</body>

</html>