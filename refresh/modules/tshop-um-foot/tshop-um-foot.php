<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-foot"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-foot">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $shareConfig = getShareConfig("shop",$shopId,$shopTitle);
  //service
  $defaulNickArray = array($userNick, $userNick, $userNick);
  $defaulIdArray = array(1,2,3);
  //
  $serviceName1 = $tbm_servicenick1 ? explode("|",$tbm_servicenick1) : $defaulNickArray;
  $serviceID1 = $tbm_serviceid1 ? explode("|", $tbm_serviceid1) : $defaulIdArray;
  $serviceName2 = $tbm_servicenick2 ? explode("|",$tbm_servicenick2) : $defaulNickArray;
  $serviceID2 = $tbm_serviceid2 ? explode("|", $tbm_serviceid2) : $defaulIdArray;
?>
  <div class="ft-nav">
    <div class="ft-nav-con">
      <ul>
        <li><a href="<?=$shopUrl ?>">返回首页</a> | </li>
        <li><a href="<?=$allProduct ?>">所有宝贝</a> | </li>
        <li><a href="<?=$shopRate ?>">信用评价</a> | </li>
        <li><a href="<?=$shopIntr ?>">关于我们</a> | </li>
        <li><a href="<?=$shopFavorite ?>">收藏本店</a> | </li>
        <li><a href="#top">返回顶部</a></li>
      </ul>
    </div>
  </div>
  <div class="ft-info">
    <div class="ft-info-detail">
      <ul>
        <?php
          for($i=1; $i<=4; $i++){
            $head = ${'tbm_abouthead'.$i};
            $content = ${'tbm_aboutcontent'.$i};
            echo "<li>".
                "<span class='title'>{$head}</span>".
                "<span class='content'>{$content}</span>".
              "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="ft-info-share">
        <p class="title">分享店铺到：</p>
        <div class="sns-widget" data-sharebtn='<?=$shareConfig?>'></div>
    </div>
    <div class="ft-info-wangwang">
      <ul>
        <li>
          <span class="title"><?=$tbm_servicehead1?>：</span>
          <?php
            foreach ($serviceID1 as $k => $v) {
              $itemID = $v;
              $itemName = $serviceName1[$k];
              $wangwang = $uriManager->supportTag($itemID,$itemName,$tbm_wangwangskin,false);
              echo "<span><em title='请点击右侧头像'>{$itemName}</em>{$wangwang}</span>";
            }
          ?>
        </li>
        <li>
          <span class="title"><?=$tbm_servicehead2?>：</span>
          <?php
            foreach ($serviceID2 as $k => $v) {
              $itemID = $v;
              $itemName = $serviceName1[$k];
              $wangwang = $uriManager->supportTag($itemID,$itemName,$tbm_wangwangskin,false);
              echo "<span><em title='请点击右侧头像'>{$itemName}</em>{$wangwang}</span>";
            }
          ?>
        </li>
        <li class="worktime"><?=$tbm_worktime ?></li>
      </ul>
    </div>
  </div>
</div>