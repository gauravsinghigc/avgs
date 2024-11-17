<?php
require 'require/modules.php';
session_start();
session_destroy();

header("location: " . DOMAIN . "/auth/admin/");
