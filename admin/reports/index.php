<?php

//required files
require '../../require/modules.php';
require '../../require/admin/access-control.php';
require '../../require/admin/sessionvariables.php';

//page variables
$PageName = "All Deals, Invoice(Sale), Payments, Customer and Activity Reports";
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
  <?php include '../../include/admin/header_files.php'; ?>
  <script type="text/javascript">
    function SidebarActive() {
      document.getElementById("app_reports").classList.add("active");
    }
    window.onload = SidebarActive;
  </script>
  <style>
    .col-md-3 {
      margin-bottom: 1rem !important;
    }
  </style>
</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include '../../include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <h4 class="app-heading"><?php echo $PageName; ?></h4>
              </div>

              <form action="deals-reports.php" method="get" target="_blank">
                <div class="row">
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Name</label>
                    <input type="text" name="DealsName" list="DealsName" class="form-control">
                    <?php SUGGEST("deals", "DealsName", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Company/Customer Display Name</label>
                    <input type="text" name="DealCustomerCompanyName" list="DealCustomerCompanyName" class="form-control">
                    <?php SUGGEST("deals", "DealCustomerCompanyName", "ASC", null); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Stage</label>
                    <input type="text" name="DealsStage" list="DealsStage" class="form-control">
                    <?php SUGGEST("deals", "DealsStage", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Amount</label>
                    <input type="text" name="DealAmount" list="DealAmount" class="form-control">
                    <?php SUGGEST("deals", "DealAmount", "ASC", null); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Type</label>
                    <input type="text" name="DealPrintType" list="DealPrintType" class="form-control">
                    <?php SUGGEST("deals", "DealPrintType", "ASC", "d"); ?>
                  </div>
                  <div class="form-group col-lg-4 col-md-4">
                    <label>Deal Created By</label>
                    <select name="DealCreatedBy" class="form-control">
                      <?php
                      $Fetchusers = FetchConvertIntoArray("SELECT * FROM users ORDER BY UserName ASC", true);
                      if ($Fetchusers != null) {
                        foreach ($Fetchusers as $Request) {
                          $RunningUserid = $Request->UserId;
                          if ($RunningUserid == LOGIN_UserId) {
                            $selected = "selected=''";
                          } else {
                            $selected = "";
                          } ?>
                          <option value="<?php echo $Request->UserId ?>" <?php echo $selected; ?>><?php echo $Request->UserName; ?> (<?php echo $Request->UserEmailId; ?>)</option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Closing Date From</label>
                    <input type="date" value="<?php echo date("Y-m-d", strtotime("-30 days")); ?>" name="DealClosingDate1" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Closing Date To</label>
                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="DealClosingDate2" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Created Date From</label>
                    <input type="date" value="<?php echo date("Y-m-d", strtotime("-30 days")); ?>" name="DealCreatedAt1" class="form-control">
                  </div>
                  <div class="form-group col-lg-3 col-md-3">
                    <label>Deal Created Date To</label>
                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="DealCreatedAt2" class="form-control">
                  </div>
                  <div class="col-md-12 text-right">
                    <label>
                      <input type="checkbox" name="export-all" value="true"> Check This if you want to export all deals with filters.
                    </label>
                    <button name="export-reports" class="app-btn btn-md btn">Export Report</button>
                    <br>
                  </div>
                </div>
              </form>

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

        <!--End page content-->
      </div>

      <?php include '../../include/admin/sidebar.php'; ?>
    </div>
    <?php include '../../include/admin/footer.php'; ?>
  </div>



  <?php include '../../include/admin/footer_files.php'; ?>
</body>

</html>