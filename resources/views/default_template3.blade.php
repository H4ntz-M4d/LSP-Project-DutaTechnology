<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="dashboard3/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="dashboard3/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="dashboard3/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="dashboard3/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="dashboard3/css/color_2.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="dashboard3/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="dashboard3/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="dashboard3/css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @foreach ($css_files as $css_file)
            <link rel="stylesheet" href="{{ $css_file }}">
        @endforeach
        
   </head>
   <body class="dashboard dashboard_2">
      
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            @include("dashboard3.sidebar")
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
            @include("dashboard3.topbar")
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     

                     <!-- graph -->
                     <div class="row column2 graph margin_bottom_30" style="margin-top: 30px;">
                        <div class="col-md-l2 col-lg-12">
                           <div class="white_shd full">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><span>{{$judul}}</h2>
                                 </div>
                              </div>
                              <div class="full graph_revenue">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="content">
                                          <div class="area_chart">
                                             <div class="row">
                                                {!!$output!!}
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end graph -->
  
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      

      @foreach ($js_files as $js_file)
    	<script src="{{ $js_file }}"></script>
      @endforeach
      
      {!! $tambahan !!}
    
      <!-- jQuery -->
      <script src="dashboard3/js/jquery.min.js"></script>
      <script src="dashboard3/js/popper.min.js"></script>
      <script src="dashboard3/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="dashboard3/js/animate.js"></script>
      <!-- select country -->
      <script src="dashboard3/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="dashboard3/js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="dashboard3/js/Chart.min.js"></script>
      <script src="dashboard3/js/Chart.bundle.min.js"></script>
      <script src="dashboard3/js/utils.js"></script>
      <script src="dashboard3/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="dashboard3/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="dashboard3/js/custom.js"></script>
      <script src="dashboard3/js/chart_custom_style2.js"></script>
      
   </body>
</html>