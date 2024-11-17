<form action="<?php echo DOMAIN; ?>/controller/customercontroller.php" method="POST">
  <input type="number" id="formscounts" value="1" hidden="">
  <?php FormPrimaryInputs(true); ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="input-block">
        <h4 class="app-heading">Customer Details</h4>
        <div class="form-group form-group-2 flex-s-b">
          <label>Customer type <?php echo $req; ?></label>
          <div class="raw-inputs" onclick="tax()">
            <span>
              <input type="radio" name="CustomerType" id="taxationvalue1" value="Company" checked=""> Company
            </span>
            <span>
              <input type="radio" name="CustomerType" id="taxationvalue2" value="Individual"> Individual
            </span>
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Primay Contact Person</label>
            <div class="raw-inputs">
              <span>
                <select class="form-control-3" id="salute" name="CustomerSalutation">
                  <?php InputOptions(["Mr.", "Mrs.", "Ms.", "Miss", "Dr."]) ?>
                </select>
              </span>
              <span class="width-40-pr">
                <input type="text" id="ifname" oninput="DisplayName()" name="CustomerFirstname" class="form-control-3" placeholder="First name">
              </span>
              <span class="width-40-pr">
                <input type="text" id="ilname" oninput="DisplayName()" name="Customerlastname" class="form-control-3" placeholder="Last name">
              </span>
            </div>
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Company Name </label>
            <input type="text" name="CompanyName" oninput="DisplayName()" id="icname" class="form-control-3">
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Customer Display name <?php echo $req; ?></label>
            <select name="CustomerDisplayName" onmouseover="DisplayName()" class="form-control-3" required="">
              <option value="null">Select Display Name</option>
              <option value="" id="fname"></option>
              <option value="" id="c2name"></option>
            </select>
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Customer Phone</label>
            <div class="raw-inputs">
              <span>
                <select class="p-inputs form-control-3" name="CountryPhoneCode">
                  <?php InputCountryCodes(); ?>
                </select>
              </span>
              <span>
                <input type="text" name="CustomerWorkPhone" class="form-control-3" placeholder="Work">
              </span>
              <span>
                <input type="text" name="CustomerMobilePhone" class="form-control-3" placeholder="Mobile">
              </span>
            </div>
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Customer Email-ID </label>
            <input type="email" name="CustomerEmailId" class="form-control-3 m-r-5" placeholder="email@domain.tld">
            <input type="email" name="CustomerSecondaryEmail" class="form-control-3 m-r-5" placeholder="secondary email">
            <input type="email" name="CustomerOtherEmail" class="form-control-3 m-r-5" placeholder="other email">
          </div>

          <div class="form-group form-group-2 flex-s-b">
            <label>Website </label>
            <input type="text" name="CustomerWebsite" class="form-control-3">
          </div>

          <h4 class="app-heading mt-4">More Details</h4>
          <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label id="taxationname">GST No</label>
              <input type="text" name="CustomerTaxationNumber" value="" class="form-control-3">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Currency Preferance</label>
              <select name="CustomerCurrenciePreference fstdropdown-select" id="First" class="form-control-3">
                <?php echo CurrencyOptions(); ?>
              </select>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Balance</label>
              <input name="CustomerBalance" class="form-control-3" type="number" value="0" placeholder="Rs.">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12 p-1">
              <h4 class="app-heading">Billing & Shipping Address</h4>
              <h4>Billing Address</h4>
              <label>Street Address</label>
              <textarea name="CustomerStreetAddress" id="Address1" class="form-control-3" style="height:100% !important;line-height:100% !important;" rows="4"></textarea>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>City</label>
              <input name="CustomerCity" id="Address2" list="city2" class="form-control-3" type="text" placeholder="">
              <datalist id="city2">
                <?php foreach (STATE_AND_CITY as $key => $State) {
                  foreach ($State as $City) { ?>
                    <option value="<?php echo $City; ?>"></option>
                <?php
                  }
                } ?>
              </datalist>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>State</label>
              <input name="CustomerState" id="Address3" list="states" class="form-control-3" type="text" placeholder="">
              <datalist id="states">
                <?php foreach (STATES as $State) { ?>
                  <option value="<?php echo $State; ?>"></option>
                <?php } ?>
              </datalist>
            </div>
            <div class=" form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Country</label>
              <input name="CustomerCountry" id="Address4" class="form-control-3" type="text" placeholder="">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Zip Code/Pincode</label>
              <input name="CustomerPincode" id="Address5" class="form-control-3" type="text" placeholder="">
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12 p-1">
              <h4>Shipping Address
                <span class="float-right text-grey"><input type="checkbox" onclick="CopyAddress()" value="true" id="copyaddress"> Same As Above</span>
              </h4>
              <label>Street Address</label>
              <textarea name="CustomerStreetAddress1" id="Address11" class="form-control-3" style="height:100% !important;line-height:100% !important;" rows="4"></textarea>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>City</label>
              <input name="CustomerCity1" id="Address22" list="city" class="form-control-3" type="text" placeholder="">
              <datalist id="city">
                <?php foreach (STATE_AND_CITY as $key => $State) {
                  foreach ($State as $City) { ?>
                    <option value="<?php echo $City; ?>"></option>
                <?php
                  }
                } ?>
              </datalist>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>State</label>
              <input name="CustomerState1" id="Address33" list="states2" class="form-control-3" type="text" placeholder="">
              <datalist id="states2">
                <?php foreach (STATES as $State) { ?>
                  <option value="<?php echo $State; ?>"></option>
                <?php } ?>
              </datalist>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Country</label>
              <input name="CustomerCountry1" id="Address44" class="form-control-3" type="text" placeholder="">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
              <label>Zip Code/Pincode</label>
              <input name="CustomerPincode1" id="Address55" class="form-control-3" type="text" placeholder="">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 p-1">
              <h4 class="app-heading">Contact Person</h4>
            </div>
            <div id="contactperson" class="border-bottom">
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Name</label>
                <input name="CustomerContactPersonName[]" type="text" value="" class="form-control-3">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Phone</label>
                <input name="CustomerContactPersonPhone[]" type="text" value="" class="form-control-3">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Email</label>
                <input name="CustomerContactPersonEmailId[]" type="email" value="" class="form-control-3">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Work Email</label>
                <input name="CustomerContactPersonWorkEmailId[]" type="email" value="" class="form-control-3">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Designation</label>
                <input name="CustomerContactPersonDesignation[]" type="text" value="" class="form-control-3">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-6 p-1">
                <label>Person Department</label>
                <input name="CustomerContactPersonDepartment[]" type="text" value="" class="form-control-3">
              </div>
              <div class="col-md-12">
                <hr>
              </div>
            </div>

            <div id="forms-person">

            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-12 p-1">
              <a class="btn btn-sm btn-default" onclick="AddMoreForms()"><i class="fa fa-plus"></i> More Person</a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 p-1">
              <h4 class="app-heading">Remarks</h4>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-12 p-1">
              <label>Remarks</label>
              <textarea name="CustomerRemarks" id="editor" class="form-control-3" rows="5" style="height:auto !important;line-height:auto !important;"></textarea>
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 text-center">
              <br>
              <button name="SaveCustomer" class="btn btn-md app-btn" Type="submit">Save New Customer</button>
              <button class="btn btn-lg btn-secondary" Type="reset">Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


<script>
  function AddMoreForms() {
    var formscounts = document.getElementById("formscounts");
    var personform = '<div class="border-bottom"><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Name</label><input name="CustomerContactPersonName[]" type="text" value="" class="form-control-3"></div><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Phone</label><input name="CustomerContactPersonPhone[]" type="text" value="" class="form-control-3"></div><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Email</label><input name="CustomerContactPersonEmailId[]" type="email" value="" class="form-control-3"></div><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Work Email</label><input name="CustomerContactPersonWorkEmailId[]" type="email" value="" class="form-control-3"></div><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Designation</label><input name="CustomerContactPersonDesignation[]" type="text" value="" class="form-control-3"></div><div class="form-group col-lg-6 col-md-6 col-sm-6 col-6"><label>Person Department</label><input name="CustomerContactPersonDepartment[]" type="text" value="" class="form-control-3"></div><div class="col-md-12"><hr></div></div>';
    var PersonFillableForsm = "";
    for (var start = 1; start <= +document.getElementById("formscounts").value; start++) {
      PersonFillableForsm += personform;
    }
    document.getElementById("formscounts").value = start;
    document.getElementById("forms-person").innerHTML = PersonFillableForsm;
  }
</script>
<script>
  function CopyAddress() {
    if (document.getElementById("copyaddress").checked) {
      document.getElementById("Address11").value = document.getElementById("Address1").value;
      document.getElementById("Address22").value = document.getElementById("Address2").value;
      document.getElementById("Address33").value = document.getElementById("Address3").value;
      document.getElementById("Address44").value = document.getElementById("Address4").value;
      document.getElementById("Address55").value = document.getElementById("Address5").value;
    } else {
      document.getElementById("Address11").value = "";
      document.getElementById("Address22").value = "";
      document.getElementById("Address33").value = "";
      document.getElementById("Address44").value = "";
      document.getElementById("Address55").value = "";
    }
  }
</script>
<script>
  function ViewTab(data) {
    var viewdata = data;
    if (viewdata === "moredetails") {
      document.getElementById("moredetails").style.display = "block";
      document.getElementById("address").style.display = "none";
      document.getElementById("contactperson").style.display = "none";
      document.getElementById("remarks").style.display = "none";
    } else if (viewdata === "address") {
      document.getElementById("moredetails").style.display = "none";
      document.getElementById("address").style.display = "block";
      document.getElementById("contactperson").style.display = "none";
      document.getElementById("remarks").style.display = "none";
    } else if (viewdata === "contactperson") {
      document.getElementById("moredetails").style.display = "none";
      document.getElementById("address").style.display = "none";
      document.getElementById("contactperson").style.display = "block";
      document.getElementById("remarks").style.display = "none";
    } else if (viewdata === "remarks") {
      document.getElementById("moredetails").style.display = "none";
      document.getElementById("address").style.display = "none";
      document.getElementById("contactperson").style.display = "none";
      document.getElementById("remarks").style.display = "Block";
    }
  }
</script>
<script>
  function tax() {
    if (document.getElementById("taxationvalue1").checked) {
      document.getElementById("taxationname").innerHTML = "GST No";
    } else {
      document.getElementById("taxationname").innerHTML = "PAN No";
    }
  }
</script>

<script>
  function DisplayName() {
    var salute = document.getElementById("salute");
    var ifname = document.getElementById("ifname");
    var ilname = document.getElementById("ilname");
    var icname = document.getElementById("icname");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var cname = document.getElementById("cname");
    var fullname = document.getElementById("fullname");
    var c2name = document.getElementById("c2name");
    var c3name = document.getElementById("c3name");

    fname.value = salute.value + " " + ifname.value + " " + ilname.value;
    fname.innerHTML = salute.value + " " + ifname.value + " " + ilname.value;

    c2name.value = icname.value;
    c2name.innerHTML = icname.value;

  }
</script>