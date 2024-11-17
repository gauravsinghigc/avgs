<?php
$FOOTER_FILES = array("bootstrap.bundle.js", "custom.js", "bootstrap.js", "bootstrap.esm.js", "bootstrap.min.js", "bootstrap.esm.min.js");

//attache css or header files
foreach ($FOOTER_FILES as $script) { ?>
 <script src="<?php echo ASSETS_URL; ?>/js/<?php echo $script; ?>"></script>
<?php }
?>
<script>
 //scroll acitivity
 window.onscroll = function() {
  myFunction();
 };
 var header2 = document.getElementById("header");
 var sticky = header2.offsetTop;

 function myFunction() {
  if (window.pageYOffset > sticky) {
   header2.classList.add("fixed-top");
   header2.classList.add("bg-white");
  } else {
   header2.classList.remove("fixed-top");
   header2.classList.remove("bg-white");
  }
 }
</script>