<?php

//required files
$PageDirLevel = "../../../";
require $PageDirLevel . "require/auto/admin-auto-load.php";

//requested files files
if (isset($_GET['viewdataid'])) {
  $RequestCustomerId = SECURE($_GET['viewdataid'], "d");
  $_SESSION['RequestCustomerId'] = $RequestCustomerId;
} else {
  $RequestCustomerId = $_SESSION['RequestCustomerId'];
}

//page variables
$PageSqls = "SELECT * FROM customers where CustomerId='$RequestCustomerId'";

//required files
$PageName = GET_DATA("CustomerDisplayName");
$CustomerProfileImage = GET_DATA("CustomerProfileImage");

//images
//userimages
if ($CustomerProfileImage == "user.png") {
  $CustomerProfileImage = STORAGE_URL . "/default/tool-img/user.png";
} else {
  $CustomerProfileImage = STORAGE_URL . "/users/$RequestCustomerId/$CustomerProfileImage";
}
//non image person placholders 
$UserImagePlaceholde = STORAGE_URL . "/default/tool-img/user.png";


?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $PageName; ?> | <?php echo APP_NAME; ?></title>
  <?php include $PageDirLevel . 'include/admin/header_files.php'; ?>

</head>

<body>
  <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <?php include $PageDirLevel . 'include/admin/header.php'; ?>

    <div class="boxed">
      <!--CONTENT CONTAINER-->
      <!--===================================================-->
      <div id="content-container">
        <div id="page-content">
          <!--====start content===============================================-->

          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="app-heading flex-s-b">
                    <span class="p-t-5"><?php echo $PageName; ?></span>
                  </h4>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="customer-details">
                    <div class="image-header">
                      <img src="<?php echo $CustomerProfileImage; ?>" alt="<?php echo $PageName; ?>" class="img-fluid">
                      <h3 class="text-white">
                        <?php echo GET_DATA("CustomerSalutation"); ?> <?php echo GET_DATA("CustomerFirstname"); ?> <?php echo GET_DATA("Customerlastname"); ?>
                        <br>
                        <i><?php echo GET_DATA("CompanyName"); ?></i>
                      </h3>
                    </div>
                    <div class="customer-details">
                      <center class="p-1r">
                        <a href="edit-customer.php?viewid=<?php echo SECURE($RequestCustomerId, "e"); ?>" class="btn btn-sm btn-primary">Edit Details</a>
                      </center>
                      <table class="table table-striped">
                        <tr>
                          <th>
                            CustomerId
                          </th>
                          <td>
                            C00<?php echo GET_DATA("CustomerId"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Company Name
                          </th>
                          <td>
                            <?php echo GET_DATA("CompanyName"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Display Name
                          </th>
                          <td class="text-primary">
                            <?php echo GET_DATA("CustomerDisplayName"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Work Phone
                          </th>
                          <td class="text-info">
                            <?php echo GET_DATA("CustomerWorkPhone"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Mobile Phone
                          </th>
                          <td class="text-info">
                            <?php echo GET_DATA("CustomerMobilePhone"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Email Id
                          </th>
                          <td class="text-primary">
                            <?php echo GET_DATA("CustomerEmailId"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            2nd Email Id
                          </th>
                          <td class="text-primary">
                            <?php echo GET_DATA("CustomerSecondaryEmail"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Other Email-ID
                          </th>
                          <td class="text-primary">
                            <?php echo GET_DATA("CustomerOtherEmail"); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Website
                          </th>
                          <td class="text-info">
                            <a href="<?php echo GET_DATA("CustomerWebsite"); ?>"><?php echo GET_DATA("CustomerWebsite"); ?></a>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            Remarks & Notes
                          </th>
                          <td class="text-info">
                            <?php echo SECURE(GET_DATA("CustomerRemarks"), 'd'); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            CreatedBy
                          </th>
                          <td class="text-info">
                            <?php echo $Createdby = FETCH("SELECT * from users where UserId='" . GET_DATA("CustomerCreatedBy") . "'", "UserName"); ?> (UID<?php echo GET_DATA("CustomerCreatedBy"); ?>)
                          </td>
                        </tr>
                        <tr>
                          <th>
                            CreatedAt
                          </th>
                          <td class="text-info">
                            <?php echo ReturnValue(GET_DATA("CustomerCreatedAt")); ?>
                          </td>
                        </tr>
                        <tr>
                          <th>
                            UpdatedAt
                          </th>
                          <td class="text-info">
                            <?php echo ReturnValue(GET_DATA("CustomerUpdatedAt")); ?>
                          </td>
                        </tr>
                      </table>
                      <h3 class="table-heading"><i class="fa fa-map-marker text-success"></i> Billing Address
                      </h3>

                      <?php $SelectBillingAddress = FetchConvertIntoArray("SELECT * FROM customer_billing_address where CustomerId='$RequestCustomerId'", true);
                      if ($SelectBillingAddress != null) {
                        foreach ($SelectBillingAddress as $Address) { ?>
                          <div class="address">
                            <p>
                              <i class="fa fa-map-marker text-success"></i>
                              <?php echo SECURE($Address->CustomerStreetAddress, "d"); ?> <?php echo $Address->CustomerCity; ?> <?php echo $Address->CustomerState; ?>
                              <?php echo $Address->CustomerCountry; ?> - <?php echo $Address->CustomerPincode; ?>
                            </p>
                            <a href="edit-address.php?addressid=<?php echo SECURE($Address->CustomerBillingAddress, "e"); ?>" class="btn btn-sm btn-info pull-right" style="margin-top:-0.7rem;"><i class="fa fa-edit"></i> Edit </a>
                            <br>
                          </div>
                      <?php }
                      } ?>
                      <center class="m-t-3 p-1r">
                        <a href="add-address.php?viewid=<?php echo SECURE($RequestCustomerId, "e"); ?>" class="btn btn-sm btn-primary">Add Address</a>
                      </center>

                      <h3 class="table-heading"><i class="fa fa-truck text-primary"></i> Shipping Address</h3>

                      <?php $SelectShippingAddress = FetchConvertIntoArray("SELECT * FROM customer_shipping_address where CustomerId='$RequestCustomerId'", true);
                      if ($SelectShippingAddress != null) {
                        foreach ($SelectShippingAddress as $Address) { ?>
                          <div class="address">
                            <p>
                              <i class="fa fa-map-marker text-success"></i>
                              <?php echo SECURE($Address->CustomerStreetAddress1, "d"); ?> <?php echo $Address->CustomerCity1; ?> <?php echo $Address->CustomerState1; ?>
                              <?php echo $Address->CustomerCountry1; ?> - <?php echo $Address->CustomerPincode1; ?>
                            </p>
                            <a href="edit-address2.php?addressid=<?php echo SECURE($Address->CustomerShippingAddress, "e"); ?>" class="btn btn-sm btn-info pull-right" style="margin-top:-0.7rem;"><i class="fa fa-edit"></i> Edit</a>
                            <br>
                          </div>
                      <?php }
                      } ?>


                      <h3 class="table-heading"><i class="fa fa-users text-primary"></i> Contact Person</h3>
                      <?php
                      $SelectContactPersons = FetchConvertIntoArray("SELECT * FROM customer_contact_person where CustomerId='$RequestCustomerId'", true);
                      if ($SelectContactPersons != null) {
                        foreach ($SelectContactPersons as $Persons) { ?>
                          <div class="contact-person">
                            <div class="img-area">
                              <img src="<?php echo $UserImagePlaceholde; ?>">
                            </div>
                            <div class="desc-area">
                              <p>
                                <span class="name"><?php echo $Persons->CustomerContactPersonName; ?></span><br>
                                <span class="text-grey"><i><?php echo $Persons->CustomerContactPersonDesignation; ?>@<?php echo $Persons->CustomerContactPersonDepartment; ?></i></span>
                                <span><i class="fa fa-phone text-info"></i> <?php echo $Persons->CustomerContactPersonPhone; ?></span><br>
                                <span><i class="fa fa-envelope text-danger"></i> <?php echo $Persons->CustomerContactPersonEmailId; ?></span><br>
                                <span><i class="fa fa-briefcase text-primary"></i> <?php echo $Persons->CustomerContactPersonWorkEmailId; ?></span>
                              </p>
                              <a href="edit-person.php?personid=<?php echo SECURE($Persons->CustomerContactPersons, "e"); ?>" class="btn btn-sm btn-info pull-right" style="margin-top:-0.7rem;"><i class="fa fa-edit"></i> Edit </a>
                            </div>
                          </div>
                      <?php }
                      } ?>
                      <center class="m-t-3 p-1r">
                        <a href="add-person.php?viewid=<?php echo SECURE($RequestCustomerId, "e"); ?>" class="btn btn-sm btn-primary">Add Person</a>
                      </center>
                    </div>
                  </div>
                  <center class="p-1r">
                    <?php
                    if (LOGIN_UserRoles == "Admin") {
                      $Checkdeals = CHECK("SELECT * from deals where DealCustomerId='$RequestCustomerId'");
                      if ($Checkdeals == null) { ?>
                        <div class="col-md-12">
                          <div class="btn-group btn-group-sm">
                            <a onclick="Databar('custs_<?php echo $RequestCustomerId; ?>')" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete Customers</a>
                          </div>
                        </div>
                    <?php }
                    } ?>
                  </center>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                  <div class="customer-dashboard">
                    <div class="dash-heading">
                      <h4 class="app-sub-heading"><i class="fa fa-user"></i> Dashboard</h4>
                    </div>
                    <div class="row dash-counters">

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><?php echo TOTAL("SELECT * from deals where DealCustomerId='$RequestCustomerId'"); ?></h2>
                          <p>Deals</p>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><?php echo TOTAL("SELECT * FROM quotations where QuotationReceiver='$RequestCustomerId'"); ?></h2>
                          <p>Quotations</p>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><?php echo TOTAL("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and quotations.QuotationReceiver='$RequestCustomerId'"); ?></h2>
                          <p>Invoices</p>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><span class="text-success">Rs.</span><?php echo $NetPaybleAMount = AMOUNT("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and quotations.QuotationReceiver='$RequestCustomerId'", "QuotationAmount"); ?></h2>
                          <p>Receiable Amount</p>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><span class="text-success">Rs.</span><?php echo $PaidAmountTotal = AMOUNT("SELECT * FROM payments where PaidCustomerId='$RequestCustomerId' ORDER BY PaymentId", "PaidAmount"); ?></h2>
                          <p>Paid Amount</p>
                        </div>
                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                        <div class="counter">
                          <h2 class="m-b-0"><span class="text-success">Rs.</span><?php echo $NetPaybleAMount - $PaidAmountTotal; ?></h2>
                          <p>Balance</p>
                        </div>
                      </div>

                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <div class="flex-s-b app-sub-heading">
                          <h4 class="m-b-0"><i class="fa fa-user"></i> All Deals</h4>
                          <a target="_blank" href="../../deals/add-deal.php" class="btn btn-sm btn-danger">Add Deals</a>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                          <?php $SelectDeals = FetchConvertIntoArray("SELECT * from deals where DealCustomerId='$RequestCustomerId' ORDER BY DealsId DESC", true);
                          if ($SelectDeals != null) {
                            $Count = 0;
                            foreach ($SelectDeals as $Deals) {
                              $Count++; ?>
                              <div class="col-lg-6 col-md-6 col-sm-6 col-6 col-12">
                                <a href="<?php echo DOMAIN; ?>/admin/deals/update-deals/?dataid=<?php echo SECURE($Deals->DealsId, "e"); ?>">
                                  <div class="quato-area">
                                    <b class="fs-15"><?php echo SECURE($Deals->DealsName, "d"); ?></b>
                                    <span class="flex-s-b">
                                      <span class="text-grey fs-12"> DEALID<?php echo $Count; ?> : <?php echo DATE_FORMATE2("d M, Y", $Deals->DealCreatedAt); ?></span>
                                      <span class="text-grey fs-12"> Closing Date: <?php echo DATE_FORMATE2("d M, Y", $Deals->DealClosingDate); ?></span>
                                    </span>
                                    <hr>
                                    <p class="mb-0">
                                      <i><b> Status:</b> <?php echo SECURE($Deals->DealsStage, "d"); ?></i><br>
                                      <span><b> Type:</b> <?php echo SECURE($Deals->DealPrintType, "d"); ?></span><br>
                                    </p>
                                    <p class="">
                                      <span class="price-box"> <?php echo Price($Deals->DealAmount); ?></span>
                                    </p>
                                    <hr>
                                    <span class="btn btn-sm btn-info">Update Status</span>
                                  </div>
                                </a>
                              </div>
                          <?php }
                          } ?>
                        </div>
                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> All Quotations</h4>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Sno</th>
                              <th>QuotationNo</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $Quotations = FetchConvertIntoArray("SELECT * FROM quotations where QuotationReceiver='$RequestCustomerId' ORDER BY QuotationId DESC", true);
                            if ($Quotations != null) {
                              $Count = 0;
                              foreach ($Quotations as $Data) {
                                $Count++; ?>
                                <tr>
                                  <td><?php echo $Count; ?></td>
                                  <td><?php echo $Data->QuotationNo; ?></td>
                                  <td><?php echo Price($Data->QuotationAmount); ?></td>
                                  <td><?php echo date("d M, Y", strtotime($Data->QuotationCreatedAt)); ?></td>
                                  <td><?php echo $Data->QuotationStatus; ?></td>
                                  <td width="20%">
                                    <div class="flex-s-b">
                                      <?php
                                      $CheckInvoice = CHECK("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "' and InvoiceStatus='Ordered'");
                                      if ($CheckInvoice == null) { ?>
                                        <form action="<?php echo CONTROLLER; ?>/ordercontroller.php" method="POST">
                                          <input type="text" name="QuotationId" value="<?php echo SECURE($Data->QuotationId, "e"); ?>" hidden="">
                                          <?php FormPrimaryInputs(true); ?>
                                          <button type="submit" name="generateorder" value="true" class="btn btn-sm btn-primary">Generate Invoice</button>
                                        </form>
                                        <form action="<?php echo CONTROLLER; ?>/quotationcontroller.php" method="POST">
                                          <input type="text" name="QuotationId" value="<?php echo SECURE($Data->QuotationId, "e"); ?>" hidden="">
                                          <?php FormPrimaryInputs(true); ?>
                                          <button type="submit" name="cancelquotations" value="true" class="btn btn-sm btn-warning">Cancel Quotation</button>
                                        </form>
                                      <?php } else { ?>
                                        <span class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Ordered</span>
                                      <?php } ?>

                                    </div>
                                  </td>
                                </tr>
                            <?php }
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> All Invoices</h4>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Sno</th>
                              <th>InvoiceNo</th>
                              <th>Amount</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $Quotations = FetchConvertIntoArray("SELECT * FROM quotations, invoices where quotations.QuotationId=invoices.quotationquotoid and quotations.QuotationReceiver='$RequestCustomerId' ORDER BY QuotationId DESC", true);
                            if ($Quotations != null) {
                              $Count = 0;
                              foreach ($Quotations as $Data) {
                                $Count++;
                                $InvoiceDate = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceDate");
                                $InvoiceNumber = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceNumber");
                                $InvoiceStatus = FETCH("SELECT * FROM invoices where quotationquotoid='" . $Data->QuotationId . "'", "InvoiceStatus");
                            ?>
                                <tr>
                                  <td><?php echo $Count; ?></td>
                                  <td><?php echo $InvoiceNumber; ?></td>
                                  <td><?php echo Price($Data->QuotationAmount); ?></td>
                                  <td><?php echo date("d M, Y", strtotime($Data->QuotationCreatedAt)); ?></td>
                                  <td><?php echo $Data->QuotationStatus; ?></td>
                                  <td width="20%">
                                    <div class="flex-s-b">
                                      <span class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> <?php echo $InvoiceStatus; ?></span>
                                    </div>
                                  </td>
                                </tr>
                            <?php }
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> Payments</h4>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Sno</th>
                              <th>PaidAmount</th>
                              <th>PaidDate</th>
                              <th>PaidMode</th>
                            </tr>
                          </thead>
                          <?php
                          $fetchPayments = FetchConvertIntoArray("SELECT * FROM payments where PaidCustomerId='$RequestCustomerId' ORDER BY PaymentId DESC", true);
                          if ($fetchPayments != null) {
                            $Count = 0;
                            foreach ($fetchPayments as $Data) {
                              $Count++; ?>
                              <tr>
                                <td><?php echo $Count; ?></td>
                                <td><?php echo Price($Data->PaidAmount); ?></td>
                                <td><?php echo $Data->PaidDate; ?></td>
                                <td><?php echo $Data->PaymentMode; ?></td>
                              </tr>
                          <?php }
                          }
                          ?>
                        </table>
                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> All Tasks</h4>
                      </div>
                      <div class="col-md-12 pl-2 pr-2">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Priority</th>
                              <th>TaskDueDate</th>
                              <th>CreatedFor</th>
                            </tr>
                          </thead>
                          <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM tasks where TaskRelatedto='$RequestCustomerId' ORDER BY TasksId DESC", true);
                          if ($FetchTasks != null) {
                            $Count = 0;
                            foreach ($FetchTasks as $Request) {
                              $Count++; ?>
                              <tr>
                                <td><?php echo $Count; ?></td>
                                <td><?php echo $Request->TasksName; ?></td>
                                <td><?php echo $Request->TaskPriority; ?></td>
                                <td><?php echo $Request->TaskDueDate; ?></td>
                                <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->TaskCreatedFor . "'", "UserName"); ?></td>
                              </tr>
                          <?php }
                          } ?>
                        </table>

                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> All Calls</h4>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Type</th>
                              <th>DateTime</th>
                              <th>CallingBy</th>
                              <th>Notes</th>
                            </tr>
                          </thead>
                          <?php $FetchTasks = FetchConvertIntoArray("SELECT * FROM calls where CallsRelatedTo='$RequestCustomerId' ORDER BY CallsId DESC", true);
                          if ($FetchTasks != null) {
                            $Count = 0;
                            foreach ($FetchTasks as $Request) {
                              $Count++; ?>
                              <tr>
                                <td><?php echo CallTypes($Request->CallingType); ?></td>
                                <td><i class="fa fa-calendar text-primary"></i> <?php echo $Request->CallingDate; ?>, <?php echo $Request->CallingTime; ?></td>
                                <td><?php echo FETCH("SELECT * FROM users where UserId='" . $Request->CallingCreatedBy . "'", "UserName"); ?></td>
                                <td><?php echo html_entity_decode(SECURE($Request->CallingNotes, "d")); ?></td>
                              </tr>
                          <?php }
                          } ?>
                        </table>
                      </div>
                    </div>

                    <div class="row dash-counters">
                      <div class="col-md-12 m-t-10">
                        <h4 class="app-sub-heading"><i class="fa fa-user"></i> All Events</h4>
                      </div>
                      <div class="col-md-12">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Sno</th>
                              <th>EventName</th>
                              <th>EventDate</th>
                              <th>EventTime</th>
                              <th>CreatedAt</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $FetchEvents = FetchConvertIntoArray("SELECT * FROM events where EventRelatedTo='$RequestCustomerId' ORDER BY EventsId DESC", true);
                            if ($FetchEvents != null) {
                              $Sno = 0;
                              foreach ($FetchEvents as $Data) {
                                $Sno++; ?>
                                <tr>
                                  <td><?php echo $Sno; ?></td>
                                  <td><?php echo $Data->EventsName; ?></td>
                                  <td><?php echo $Data->EventsDateFrom; ?></td>
                                  <td><?php echo $Data->EventsTimeFrom; ?></td>
                                  <td><?php echo $Data->EventCreatedAt; ?></td>
                                </tr>
                            <?php }
                            } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <!--End page content-->
        </div>

        <?php include $PageDirLevel . 'include/admin/sidebar.php'; ?>
      </div>
      <?php include $PageDirLevel . 'include/admin/footer.php'; ?>
    </div>

    <section class="popup-background" id="custs_<?php echo $RequestCustomerId; ?>">
      <div class="action-area">
        <div class="ref-image">
          <img src="<?php echo ActionDeleteImage; ?>" class="pop-img blink-data">
        </div>
        <div class="activity-details">
          <h3 class="action-title">
            <span class="action-title-text"><?php echo ActionDeleteTitle; ?></span>
          </h3>
          <p class="action-desc">
            <span class="action-desc-text"><?php echo ActionDeleteMessage; ?></span>
          </p>
        </div>
        <div class="activity-action">
          <a onclick="Databar('custs_<?php echo $RequestCustomerId; ?>')" class="btn btn-lg btn-danger"><?php echo ActionDeleteCancel; ?></a>
          <a href="<?php echo DOMAIN; ?>/controller/customercontroller.php?delete_customers=<?php echo SECURE("true", "e"); ?>&access_url=<?php echo SECURE(RUNNING_URL, "e"); ?>&AuthToken=<?php echo SECURE(VALIDATOR_REQ, "e"); ?>&control_id=<?php echo SECURE($RequestCustomerId, "e"); ?>" class="btn btn-lg btn-success"><?php echo ActionDeleteConfirm; ?></a>
        </div>
      </div>
    </section>
    <?php include $PageDirLevel . 'include/admin/footer_files.php'; ?>
</body>

</html>