<nav id="mainnav-container">
 <div class="navbar-header">
  <a href="<?php echo DOMAIN; ?>/admin" class="navbar-brand app-bg">
   <img src="<?php echo $MAIN_LOGO; ?>" class="brand-icon">
   <div class="brand-title">
    <span class="brand-text"><?php echo APP_NAME; ?></span>
   </div>
  </a>
 </div>

 <div id="mainnav">
  <div id="mainnav-menu-wrap">
   <div class="nano">
    <div class="nano-content">
     <?php if (LOGIN_UserRoles == "Admin") { ?>
      <ul id="mainnav-menu" class="list-group">
       <li>
        <a href=" <?php echo DOMAIN; ?>/admin/dashboard/" id="app_dashboard"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a>
       </li>
       <li>
        <a href="<?php echo DOMAIN; ?>/admin/products" id="app_products">
         <i class="fa fa-table"></i>
         <span class="menu-title">
          Products
         </span>
         <i class="arrow"></i>
        </a>
        <ul class="collapse">
         <li><a href="<?php echo DOMAIN; ?>/admin/products/">All Products</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/products/categories.php">All Categories</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/products/brands.php">All Publications</a></li>
        </ul>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/users/" id="app_users">
         <i class="fa fa-users"></i>
         <span class="menu-title">
          Users
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/customers/" id="app_customers">
         <i class="fa fa-users"></i>
         <span class="menu-title">
          Customers
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/deals/" id="app_deals">
         <i class="fa fa-star"></i>
         <span class="menu-title">
          Deals
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/activity" id="app_activity">
         <i class="fa fa-exchange"></i>
         <span class="menu-title">
          Activity
         </span>
         <i class="arrow"></i>
        </a>
        <ul class="collapse">
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/">Tasks</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/events/">Events</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/calls/">Calls</a></li>
        </ul>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/quotations" id="app_quotations">
         <i class="fa fa-file-pdf-o"></i>
         <span class="menu-title">
          Quotations
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/invoices" id="app_invoices">
         <i class="fa fa-file-pdf-o"></i>
         <span class="menu-title">
          Invoices
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/payments" id="app_payments">
         <i class="fa fa-exchange"></i>
         <span class="menu-title">
          Payments
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/reports/" id="app_reports">
         <i class="fa fa-print"></i>
         <span class="menu-title">
          Reports
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/configurations" id="configs">
         <i class="fa fa-gears"></i>
         <span class="menu-title">
          Configurations
         </span>
         <i class="arrow"></i>
        </a>
        <ul class="collapse">
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/">Company Profile</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/api-keys.php">API & Keys</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/advance-settings.php">Advance Settings</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/invoice-settings.php">Invoice Settings</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/branches/">Branches</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/currencies/">Currencies</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/configurations/rates/">GOC & Bank Rate</a></li>
        </ul>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/activities/" id="act_logs">
         <i class="fa fa-list-ol"></i>
         <span class="menu-title">
          Activity Logs
         </span>
        </a>
       </li>
       <li>
        <a href="<?php echo DOMAIN; ?>/admin/activities/logins.php" id="login_logs">
         <i class="fa fa-list"></i>
         <span class="menu-title">
          Login Logs
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/profile" id="profile">
         <i class="fa fa-user"></i>
         <span class="menu-title">
          Profile
         </span>
        </a>
       </li>
       <li>
        <a href="<?php echo DOMAIN; ?>/admin/logout.php">
         <i class="fa fa-sign-out"></i>
         <span class="menu-title">
          Logout
         </span>
        </a>
       </li>
       <br><br><br><br><br><br>
      </ul>

     <?php } else if (LOGIN_UserRoles == "Marketing") { ?>

      <ul id="mainnav-menu" class="list-group">
       <li>
        <a href=" <?php echo DOMAIN; ?>/admin/dashboard/" id="app_dashboard"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/products" id="app_products">
         <i class="fa fa-table"></i>
         <span class="menu-title">
          Products
         </span>
         <i class="arrow"></i>
        </a>
        <ul class="collapse">
         <li><a href="<?php echo DOMAIN; ?>/admin/products/">All Products</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/products/categories.php">All Categories</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/products/brands.php">All Publications</a></li>
        </ul>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/customers/" id="app_customers">
         <i class="fa fa-users"></i>
         <span class="menu-title">
          Customers
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/deals/" id="app_deals">
         <i class="fa fa-star"></i>
         <span class="menu-title">
          Deals
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/activity" id="app_activity">
         <i class="fa fa-exchange"></i>
         <span class="menu-title">
          Activity
         </span>
         <i class="arrow"></i>
        </a>
        <ul class="collapse">
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/">Tasks</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/events/">Events</a></li>
         <li><a href="<?php echo DOMAIN; ?>/admin/activity/calls/">Calls</a></li>
        </ul>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/quotations" id="app_quotations">
         <i class="fa fa-file-pdf-o"></i>
         <span class="menu-title">
          Quotations
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/invoices" id="app_invoices">
         <i class="fa fa-file-pdf-o"></i>
         <span class="menu-title">
          Invoices
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/reports/" id="app_reports">
         <i class="fa fa-print"></i>
         <span class="menu-title">
          Reports
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/profile" id="profile">
         <i class="fa fa-user"></i>
         <span class="menu-title">
          Profile
         </span>
        </a>
       </li>

       <li>
        <a href="<?php echo DOMAIN; ?>/admin/logout.php">
         <i class="fa fa-sign-out"></i>
         <span class="menu-title">
          Logout
         </span>
        </a>
       </li>
       <br><br><br><br><br><br>
      </ul>
     <?php } ?>
    </div>
   </div>
  </div>
  <!--================================-->
  <!--End menu-->
 </div>
</nav>