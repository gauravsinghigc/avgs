<?php
$HEADER_FILES = array("bootstrap.css", "custom.css", "font-size.css", "margin.css", "width.css", "utility.css", "bootstrap-grid.css", "bootstrap-grid.min.css", "bootstrap-grid.rtl.css", "bootstrap-grid.rtl.min.css", "bootstrap-reboot.css", "bootstrap-reboot.rtl.css", "bootstrap-utilities.css", "bootstrap.min.css");

//attache css or header files
foreach ($HEADER_FILES as $stylesheets) { ?>
 <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/<?php echo $stylesheets; ?>" />
<?php }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">