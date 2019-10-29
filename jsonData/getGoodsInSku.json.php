<?php 

require_once ('../DAL/DBConn.php');
$dal = new tartarus();
$fetch = $dal->getGoodsInSku();
echo(json_encode($fetch));
