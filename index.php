<?php
$page = isset($_GET['page'])?$_GET['page']:1;
$pager = new Pager($shop_data, 5, $page);
echo $pager->getPrevLink().$pager->getNaviLink().$pager->getNextLink();
?>

test

