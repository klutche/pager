クラス
//ページング
class Pager {
 
private $dataArr = array();
private $pageNum = null;
private $maxPageNum = null;
 
function __construct($data, $maxRecodeNum, $pageNum = '') {
$start = ($pageNum == 1)?0:($pageNum-1) * $maxRecodeNum;
$end = $start + $maxRecodeNum;
for ($i=$start; $i<$end; $i++) {
     $this->dataArr[] = $data[$i];
}
$count = count($data);
$this->maxPageNum = ceil($count / $maxRecodeNum);
$this->pageNum = intval($pageNum);
}

//指定されたページの配列を返す
function getPageData() {
return $this->dataArr;
}

//ページナビ
function getNaviLink() {
$naviLink = '';
for ($i = 1; $i <= $this->maxPageNum ; $i++) {
if ($i != $this->pageNum) {
$naviLink .= sprintf('<a href="%s?page=%d">%d</a>&nbsp;', $_SERVER['SCRIPT_NAME'], $i, $i);
} else {
$naviLink .= sprintf('<b><a href="%s?page=%d">%d</a></b>&nbsp;', $_SERVER['SCRIPT_NAME'], $i, $i);
}
}
return $naviLink;
}

//次のページへのリンク
function getNextLink() {
if ($this->maxPageNum > $this->pageNum) {
return sprintf('<a href="%s?page=%d">Next</a>&nbsp;', $_SERVER['SCRIPT_NAME'], $this->pageNum + 1);
}
}

//前のページへのリンク
function getPrevLink() {
if ($this->pageNum != 1) {
return sprintf('<a href="%s?page=%d">Prev</a>&nbsp;', $_SERVER['SCRIPT_NAME'], $this->pageNum - 1);
}
}

}

表示
<?php
$page = isset($_GET['page'])?$_GET['page']:1;
$pager = new Pager($shop_data, 5, $page);
echo $pager->getPrevLink().$pager->getNaviLink().$pager->getNextLink();
?>



