<?php 
require_once '../../../core/functions.php';
session_start();
session_destroy();

redirect("../../../index.php");