<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-bannerArea"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-bannerArea">
<?php
/**
 * 开始设计PHP页面
 */
?>
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $itemURL = array($globalUrl."/default/banner1.jpg", $globalUrl."/default/banner2.jpg", $globalUrl."/default/banner3.jpg");
  $itemTitle = array("图片1","图片2","图片3");
  $itemLink = array($shopUrl, $shopUrl, $shopUrl);
  //选取宝贝
  if($tbm_datafrom == 1){
    $itemSelector = explode(',',$tbm_itemselecter);
    foreach($itemSelector as $k=>$v){
      $item = $itemManager->queryById($v);
      $itemURL[$k] = $item->getPicUrl(310);
      $itemTitle[$k] = $item->title;
      $itemLink[$k] = $uriManager->detailURI($item);
    }
  }elseif ($tbm_datafrom == 2) {//自定义
    $tbm_bannerpic = explode('|',$tbm_bannerpic);
    $tbm_bannertitle = explode('|',$tbm_bannertitle);
    $tbm_bannerlink = explode('|',$tbm_bannerlink);
    for($i=0; $i<3; $i++){
      $itemURL[$i] = $tbm_bannerpic[$i] ? $tbm_bannerpic[$i] : $itemURL[$i];
      $itemTitle[$i] = $tbm_bannertitle[$i] ? $tbm_bannertitle[$i] : $itemTitle[$i];
      $itemLink[$i] = $tbm_bannerlink[$i] ? $tbm_bannerlink[$i] : $itemLink[$i];
    }
  }
?>
  
  <ul class="clear">
    <?php
      foreach($itemURL as $k=>$v){
        echo '<li>'.
          "<a href='{$itemLink[$k]}' style='background-image:url({$itemURL[$k]});' target='_blank'>".
          '<span><em class="alphabg"></em><em>'.$itemTitle[$k].'</em></span>'.
          '</a></li>';
      }
    ?>
  </ul>
</div>
