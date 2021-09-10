<?php
require "xmlparsing.php";

$xmlObject 	= 	Xmlparsing::getInstance();
$result		=	$xmlObject->doParsing();
echo 'Total sum of all BetAmount properties is: '.$result;
?>