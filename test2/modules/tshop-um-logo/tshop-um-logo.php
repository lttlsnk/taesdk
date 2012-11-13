<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-logo"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-logo" style="">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $shareConfig = getShareConfig("shop",$shopId,$shopTitle);
  $logoPic = $tbm_logopic ? $tbm_logopic : $globalUrl."/logo.png";
  $notes = $tbm_notes ? explode("|",$tbm_notes) : array("公告1：请在这里输入你的公告1的内容","公告2：请在这里输入你的公告2的内容","公告3：请在这里输入你的公告3的内容");
  $notesLink = !$tbm_noteslink ? explode("|",$tbm_noteslink) : array("#","#","#");
  //公告速度
  switch ($tbm_noteSpeed) {
    case 1: $speed = 0.2; break;
    case 2: $speed = 0.5; break;
    case 3: $speed = 0.8; break;
  }
?>
  <div class="logobox" style="background-image: url(<?=$logoPic?>)"></div>
  <div class="J_TWidget topnote" data-widget-type="Slide" data-widget-config="{
          'autoplay':true,
          'effect':'scrolly',
          'steps':1,
          'duration':'<?php echo $speed; ?>',
          'interval':'2'
          }"
    >
    <div class="content"  style="<?php if($tbm_noteShow==2) echo 'display:none;' ?>">
      <ul class="ks-switchable-content">
          <?php
        foreach($notes as $k=>$v){
          $itemlink = $notesLink[$k];
          echo "<li><i></i><a target='_blank' href='{$notesLink[$k]}'>$v</a></li>";
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="link-rb">
    <ul>
      <li class="share-info">
        <span class="title">分享店铺到：</span>
        <div class="sns-widget" data-sharebtn='<?=$shareConfig?>'></div>
      </li>
      <li class="link-list" style="<?php if($tbml_inkShow==2) echo ' display:none;' ?>">
        <a target="_blank" class="mycart" href="http://cart.taobao.com/my_cart.htm"><i></i>我的购物车</a>
        <a target="_blank" class="myorder" href="http://trade.taobao.com/trade/itemlist/list_bought_items.htm"><i></i>我的订单</a>
        <a target="_blank" class="favor" href="http://msp.taobao.com/pc/popup/sendsms.htm?shop_id=<?=$shopId?>"><i></i>收藏到手机</a>
      </li>
    </ul>
  </div>
</div>