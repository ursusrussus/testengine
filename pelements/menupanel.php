<?php
if ($GLOBALS['registered']) {
	include("menupanel_reg.php");
}
else {
	include ("menupanel_unreg.php");
}
?>