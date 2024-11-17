<?php

//auto load files
require "../../require/auto/admin-auto-load.php";

//page variables
$PageName = "Dashboard";
$CurrentDate = date("Y-m-d");
$Yesterday = date("Y-m-d", strtotime("-1 day"));
$ThisWeek = date("Y-m-d", strtotime("-7 day"));
$LastWeek = date("Y-m-d", strtotime("-14 day"));
$ThisMonths = date("Y-m-d", strtotime("-30 day"));
$LastMonths = date("Y-m-d", strtotime("-60 day"));
$lastthreemonths = date("Y-m-d", strtotime("-90 day"));
$lastsixmonths = date("Y-m-d", strtotime("-180 day"));
$thisyear = date("Y-m-d", strtotime("-365 day"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include '../../include/admin/DEFAULT_header.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("app_dashboard").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
</head>

<body>
  <div id="container" class="effect navbar-fixed mainnav-fixed mainnav-lg">
    <?php
    include '../../include/admin/DEFAULT_body_header.php';
    if (LOGIN_UserRoles == "Admin") {
      $CurrentDate =  date("d-M-Y");
      $CurrentMonth = date("M-Y");
      if ($CurrentDate == GOC_CONFIG_DATE . "-" . date("M-Y")) {
        $CheckGOCRateExitsOrNot = CHECK("SELECT * FROM configs_rates WHERE date(RateConfigDate)>'$CurrentMonth'");
        if (isset($_GET['skip'])) {
          $skip = $_GET['skip'];
        } elseif (isset($_SESSION['skip'])) {
          $skip = $_SESSION['skip'];
        } else {
          $skip = false;
        }
        if ($skip == false) {
          if ($CheckGOCRateExitsOrNot == null) {
            include "../../include/form/pop-rate-form.php";
          }
        }
      } else {
        $CheckGOCRateExitsOrNot = CHECK("SELECT * FROM configs_rates WHERE date(RateConfigDate)>'$CurrentMonth'");
        if (isset($_GET['skip'])) {
          $skip = $_GET['skip'];
        } elseif (isset($_SESSION['skip'])) {
          $skip = $_SESSION['skip'];
        } else {
          $skip = false;
        }
        if ($skip == false) {
          if ($CheckGOCRateExitsOrNot == null) {
            include "../../include/form/pop-rate-form.php";
          }
        }
      }
    }
    ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">

        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <h4 class="app-sub-heading">Latest Calls & Remindings</h4>
                  <div class="deal-area">
                    <table class="table table-striped">

                      <?php
                      $TodayCallingDate = date("Y-m-d");
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType='4' and CallingDate like '%$TodayCallingDate%' ORDER BY CallsId DESC limit 0, 15", true);
                      } else {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType='4' and CallingDate like '%$TodayCallingDate%' and CallingCreatedBy='" . LOGIN_UserId . "' ORDER BY CallsId DESC limit 0, 15", true);
                      }
                      if ($FetchTasks != null) {
                        $Count = 0;
                        foreach ($FetchTasks as $Request) {
                          $Count++;
                          if ($Request->CallingType == 4) {
                            $CallReminder = "reminder blink-data";
                          } else {
                            $CallReminder = "";
                          } ?>
                          <tr class="<?php echo $CallReminder; ?>">
                            <td class="fs-20"><i class="fa fa-bell text-danger fs-20"></i></td>
                            <td><a target="_blank" href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Request->CallsRelatedTo, "e"); ?>" class="text-primary"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->CallsRelatedTo . "'", "CustomerDisplayName"); ?></a>
                              <br>
                              <span class="text-grey fs-11"><?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></span>
                              <span class="text-grey fs-11 pull-right"><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?></span>
                            </td>

                          </tr>
                      <?php }
                      } ?>
                      <?php
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType!='4' ORDER BY CallsId DESC limit 0, 15", true);
                      } else {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallingType!='4' and CallingCreatedBy='" . LOGIN_UserId . "' ORDER BY CallsId DESC limit 0, 15", true);
                      }
                      if ($FetchTasks != null) {
                        $Count = 0;
                        foreach ($FetchTasks as $Request) {
                          $Count++;
                          if ($Request->CallingType == 4) {
                            $CallReminder = "reminder blink-data";
                          } else {
                            $CallReminder = "";
                          } ?>
                          <tr class="<?php echo $CallReminder; ?>">
                            <td><?php echo CallTypes($Request->CallingType); ?></td>
                            <td><a target="_blank" href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Request->CallsRelatedTo, "e"); ?>" class="text-primary"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->CallsRelatedTo . "'", "CustomerDisplayName"); ?></a>
                              <br>
                              <span class="text-grey fs-11"><?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></span>
                              <span class="text-grey fs-11 pull-right"><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?></span>
                            </td>

                          </tr>
                      <?php }
                      } ?>
                    </table>
                  </div>
                  <a target="_blank" href="<?php echo ADMIN_URL; ?>/activity/calls/" class="pull-right btn-sm btn btn-info view-more">View All</a>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-12">
                  <h4 class="app-sub-heading">Latest Tasks</h4>
                  <div class="deal-area tasks">
                    <table class="table table-striped">
                      <?php
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks ORDER BY TasksId DESC limit 0, 15", true);
                      } else {
                        $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks where TasksCreatedBy='" . LOGIN_UserId . "' ORDER BY TasksId DESC limit 0, 15", true);
                      }
                      if ($FetchTasks != null) {
                        $SNo = 0;
                        foreach ($FetchTasks as $Request) {
                          $SNo++; ?>
                          <tr>
                            <td><i class="fa fa-tasks fs-20 text-success"></i></td>
                            <td class="text-info"><?php echo $Request->TasksName; ?></td>
                            <td><a href="<?php echo DOMAIN; ?>/admin/customers/details/?viewdataid=<?php echo SECURE($Request->TaskRelatedTo, "e"); ?>" class="text-primary"><?php echo FETCH("SELECT * FROM customers where CustomerId='" . $Request->TaskRelatedTo . "'", "CustomerDisplayName"); ?></a></td>
                            <td><?php echo $Request->TaskPriority; ?></td>
                            <td><?php echo $Request->TaskDueDate; ?></td>
                            <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->TaskCreatedFor . "'", "UserName"); ?></td>
                          </tr>
                      <?php }
                      } ?>
                    </table>
                  </div>
                  <a target="_blank" href="<?php echo ADMIN_URL; ?>/activity/" class="pull-right btn-sm btn btn-info view-more">View All</a>
                </div>
              </div>
              <br>
              <div class="row m-t-10">
                <div class="col-md-12">
                  <h4 class="app-heading">Latest Deals</h4>
                  <br>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-1">Qualifications</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications = SECURE("Qualifications", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications' and DealsCreatedBy='" . LOGIN_UserId . "'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/index.php?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-2">Need Analysis</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications = SECURE("Need Analysis", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications' and DealCreatedBy='" . LOGIN_UserId . "'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-3">Proposal & Price Quote</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications2 = SECURE("Proposal and Price Quote", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications2'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications2' and DealCreatedBy='" . LOGIN_UserId . "'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-4">Negotiation & Review</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications = SECURE("Negotiation and Review", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications' and DealCreatedBy='$UserId'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-6">Closed Won</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications = SECURE("Closed Won", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications' and DealCreatedBy='" . LOGIN_UserId . "'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 col-xs-6">
                  <div class="shadow-lg p-1r br10">
                    <h4 class="app-heading heading-5">Closed Lost</h4>
                    <div class="deal-area">
                      <?php
                      $Qualifications = SECURE("Closed Lost", 'e');
                      if (LOGIN_UserRoles == "Admin") {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications'", true);
                      } else {
                        $FetchDeals = FetchConvertIntoArray("SELECT * FROM deals where DealsStage='$Qualifications' and DealCreatedBy='" . LOGIN_UserId . "'", true);
                      }
                      if ($FetchDeals != null) {
                        foreach ($FetchDeals as $Data) { ?>
                          <p>
                            <span class="deal-name">
                              <b><?php echo SECURE($Data->DealsName, "d"); ?></b>
                            </span><br>
                            <span><?php echo $Data->DealCustomerCompanyName; ?></span>
                            <br>
                            <span class="deal-amount"><?php echo Price($Data->DealAmount); ?></span>
                            <span class="text-grey pull-right"><?php echo date("d M, Y", strtotime($Data->DealCreatedAt)); ?></span>
                            <br>
                            <span class="text-grey"><i><?php echo SECURE($Data->DealPrintType, "d"); ?></i></span>
                            <a target="_blank" href="../deals/update-deals/?dataid=<?php echo SECURE($Data->DealsId, "e"); ?>" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                          </p>
                      <?php }
                      } ?>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row m-t-10">
                <div class="col-md-3">
                  <div class="counter-widgets">
                    <div class="flex-s-b">
                      <h1><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)='$CurrentDate'"); ?> <span> Today Deals</span></h1>
                    </div>
                    <p><span class="text-grey">Total Deals :</span> <?php echo TOTAL("SELECT * FROM deals"); ?></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)='$Yesterday'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='" . $ThisWeek . "'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$ThisWeek' and DATE(DealCreatedAt)<='" . $LastWeek . "'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Month</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$ThisMonths'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Last Month</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$ThisMonths' and DATE(DealCreatedAt)<='" . $LastMonths . "'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Quatarly</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$lastthreemonths'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Half Year</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$lastsixmonths'"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Year</span>
                        <span><?php echo TOTAL("SELECT * FROM deals where DATE(DealCreatedAt)>='$thisyear'"); ?> <span> Deals</span></span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)='$CurrentDate' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Sale Conversion</span></h1>
                    <p><span class="text-grey"> Total Sale : </span></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)='$Yesterday' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisWeek' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisWeek' and DATE(invoices.InvoiceDate)<='" . $LastWeek . "' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Month</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisMonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Last Month</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisMonths' and DATE(invoices.InvoiceDate)<='" . $LastMonths . "' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Quatarly</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$lastthreemonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>Half Year</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$lastsixmonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                      <li>
                        <span>This Year</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$thisyear' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid"); ?> <span> Deals</span></span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1 class="ml-2"><span class="pl-2 text-success"><i class="fa fa-inr"></i></span> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)='$CurrentDate' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?></h1>
                    <p><span class="text-grey"> Total Sale : </span></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)='$Yesterday' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?></span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisWeek' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?></span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisWeek' and DATE(invoices.InvoiceDate)<='" . $LastWeek . "' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?> </span>
                      </li>
                      <li>
                        <span>This Month</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisMonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?> </span>
                      </li>
                      <li>
                        <span>Last Month</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$ThisMonths' and DATE(invoices.InvoiceDate)<='" . $LastMonths . "' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?> </span>
                      </li>
                      <li>
                        <span>Quatarly</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$lastthreemonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?> </span>
                      </li>
                      <li>
                        <span>Half Year</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$lastsixmonths' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?></span>
                      </li>
                      <li>
                        <span>This Year</span>
                        <span><i class="fa fa-inr"></i> <?php echo AMOUNT("SELECT * FROM quotations, deals, invoices, payments where DATE(invoices.InvoiceDate)>='$thisyear' and invoices.invoicesid=payments.PaidInvoiceId and quotations.dealid=deals.DealsId and quotations.QuotationId=invoices.quotationquotoid", "PaidAmount"); ?></span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)='$CurrentDate'"); ?> <span> Today Customers</span></h1>
                    <p><span class="text-grey"> Total Customers : </span> <?php echo TOTAL("SELECT * FROM customers"); ?></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$Yesterday'"); ?> </span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$ThisWeek'"); ?> </span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$ThisWeek' and DATE(CustomerCreatedAt)<='" . $LastWeek . "'"); ?> </span>
                      </li>
                      <li>
                        <span>This Month</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$ThisMonths'"); ?> </span>
                      </li>
                      <li>
                        <span>Last Month</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$ThisMonths' and DATE(CustomerCreatedAt)<='" . $LastMonths . "'"); ?> </span>
                      </li>
                      <li>
                        <span>Quatarly</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$lastthreemonths'"); ?> </span>
                      </li>
                      <li>
                        <span>Half Year</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$lastsixmonths'"); ?> </span>
                      </li>
                      <li>
                        <span>This Year</span>
                        <span><?php echo TOTAL("SELECT * FROM customers where DATE(CustomerCreatedAt)>='$thisyear'"); ?> </span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1><?php echo TOTAL("SELECT * FROM quotations where DATE(QuotationCreatedAt)='$CurrentDate'"); ?> <span> Quotations</span></h1>
                    <p><span class="text-grey"> Total Quotations : </span> <?php echo TOTAL("SELECT * FROM quotations"); ?></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations where DATE(QuotationCreatedAt)>='$Yesterday'"); ?> </span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations where DATE(QuotationCreatedAt)>='$ThisWeek'"); ?> </span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM quotations where DATE(QuotationCreatedAt)>='$ThisWeek' and DATE(QuotationCreatedAt)<='" . $LastWeek . "'"); ?> </span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1><?php echo TOTAL("SELECT * FROM calls where DATE(CallingCreatedAt)='$CurrentDate'"); ?> <span> Calls</span></h1>
                    <p><span class="text-grey"> Total Calls : </span> <?php echo TOTAL("SELECT * FROM calls"); ?></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM calls where DATE(CallingCreatedAt)>='$Yesterday'"); ?> </span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM calls where DATE(CallingCreatedAt)>='$ThisWeek'"); ?> </span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM calls where DATE(CallingCreatedAt)>='$ThisWeek' and DATE(CallingCreatedAt)<='" . $LastWeek . "'"); ?> </span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="counter-widgets">
                    <h1><?php echo TOTAL("SELECT * FROM events where DATE(EventCreatedAt)='$CurrentDate'"); ?> <span> Events</span></h1>
                    <p><span class="text-grey"> Total Events : </span> <?php echo TOTAL("SELECT * FROM events"); ?></p>
                    <ul>
                      <li>
                        <span>Yesterday</span>
                        <span><?php echo TOTAL("SELECT * FROM events where DATE(EventCreatedAt)>='$Yesterday'"); ?> </span>
                      </li>
                      <li>
                        <span>This Week</span>
                        <span><?php echo TOTAL("SELECT * FROM events where DATE(EventCreatedAt)>='$ThisWeek'"); ?> </span>
                      </li>
                      <li>
                        <span>Last Week</span>
                        <span><?php echo TOTAL("SELECT * FROM events where DATE(EventCreatedAt)>='$ThisWeek' and DATE(EventCreatedAt)<='" . $LastWeek . "'"); ?> </span>
                      </li>
                    </ul>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
        <!--===================================================-->
        <!--End page content-->
      </div>

      <?php include '../../include/admin/sidebar.php'; ?>
    </div>
    <?php include '../../include/admin/DEFAULT_body_footer.php'; ?>
  </div>

  <?php include '../../include/admin/DEFAULT_footer.php'; ?>
</body>

</html>