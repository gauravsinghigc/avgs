<?php include(__DIR__ . "/../message.php"); ?>

<script src="<?php echo ASSETS_URL; ?>/admin/js/jquery-2.1.1.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/fast-click/fastclick.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/switchery/switchery.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/metismenu/metismenu.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/scripts.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/parsley/parsley.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/jquery-steps/jquery-steps.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/masked-input/bootstrap-inputmask.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/moment-range/moment-range.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/summernote/summernote.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/screenfull/screenfull.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/demo/wizard.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/select.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/demo/form-wizard.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/toggler.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/admin/js/demo/tables-datatables.js"></script>
<script>
 function Databar(data) {
  databar = document.getElementById("" + data + "");
  if (databar.style.display === "block") {
   databar.style.display = "none";
  } else {
   databar.style.display = "block";
  }
 }
</script>

<script>
 tagger(document.querySelector('[name="options"]'), {});
</script>

<script>
 uploadimage.onchange = evt => {
  const [file] = uploadimage.files
  if (file) {
   ImgPreview.src = URL.createObjectURL(file);
  }
 }
</script>

<script>
 uploadfile.onchange = evt => {
  const [file] = uploadfile.files
  if (file) {
   FilePreview.src = URL.createObjectURL(file);
  }
 }
</script>

<script>
 var triggerTabList = [].slice.call(document.querySelectorAll('#myTab'))
 triggerTabList.forEach(function(triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function(event) {
   event.preventDefault()
   tabTrigger.show()
  })
 });
</script>
<script>
 $(function() {
  $('.selectpicker').selectpicker();
 });
</script>