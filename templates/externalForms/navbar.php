 <?php
    use Application\Lib\Database\DatabaseConnection;
    use Application\Model\Personal\PersonalRepository;
    ?>
 <!--Page loader-->
 <div class="loader-wrapper">
     <div class="loader-circle">
         <div class="loader-wave"></div>
     </div>
 </div>
 <!--Page loader-->
 <!--Page Wrapper-->
 <div class="container-fluid">
     <!--Header-->
     <div class="row header shadow-sm">
         <!--Logo-->
         <div class="col-sm-3 pl-0 text-center header-logo">
             <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                 <h3 class="logo"><a href="index.php?action=extPage" class="text-secondary logo"><i class="fa fa-cogs"></i> CAB<span class="small">APP</span></a></h3>
             </div>
         </div>
         <!--Logo-->
         <!--Header Menu-->
         <div class="col-sm-9 header-menu pt-2 pb-0">
             <div class="row">
                 <!--Menu Icons-->
                 <div class="col-sm-4 col-8 pl-0">
                     <!--Toggle sidebar-->
                     <span class="menu-icon" onclick="toggle_sidebar()">
                         <span id="sidebar-toggle-btn"></span>
                     </span>
                     <!--Toggle sidebar-->
                 </div>
                 <!--Search box and avatar-->
                 <!--Search box and avatar-->
             </div>
         </div>
         <!--Header Menu-->
     </div>
     <!--Header-->
     <!--Main Content-->
     <div class="row main-content">
         <!--Sidebar left-->
         <div class="col-sm-3 col-xs-6 sidebar pl-0">
             <div class="inner-sidebar mr-3">
                
                 <!--Sidebar Navigation Menu-->
                 <div class="sidebar-menu-container">
                     
                 </div>
                 <!--Sidebar Naigation Menu-->
             </div>
         </div>
         <!--Sidebar left-->
         <!--Dashboard widget-->
         <!--/Dashboard widget-->