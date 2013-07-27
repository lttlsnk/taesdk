<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-service"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-service">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $defaulNickArray = array($userNick, $userNick, $userNick);
  $defaulIdArray = array(1,2,3);
  $kefu1name = $tbm_servicenick1 ? explode("|", $tbm_servicenick1) : array($u,$u,$u);
  $kefu1id = $tbm_serviceid1 ? explode("|", $tbm_serviceid1) : array($u,$u,$u);
  $kefu2name = $tbm_servicenick2 ? explode("|", $tbm_servicenick2) : array($u,$u,$u);
  $kefu2id = $tbm_serviceid2 ? explode("|", $tbm_serviceid2) : array($u,$u,$u);
  //收藏
  $collectPic = $tbm_collectpic ? $tbm_collectpic : "assets/images/collect.png";
  $collectStyle = "background-image: url($collectpic);"."height:$height;";
  //工作时间
  $worktimetxt = explode("|", $tbm_worktimetxt);
  //
?>
  <div class="mainbox190_hd service_hd">
    <img src="assets/images/wangwangeye.gif" />
  </div>
  <div class="mainbox190_bd service_bd">
    <ul>
      <?php
        //售前客服
        echo "<li class='kefu'>".
            "<h4>".$tbm_servicehead1."</h4>".
            "<div class='item_bd'>";
        foreach($kefu1id as $k=>$v) {
          $itemName = $kefu1name[$k];
          echo "<span><em title='请点击右侧头像'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
        }
        echo  "</div>".
          "</li>";
        //售后客服
        echo "<li class='kefu'>".
            "<h4>".$tbm_servicehead2."</h4>".
            "<div class='item_bd'>";
        foreach($kefu2id as $k=>$v) {
          $itemName = $kefu2name[$k];
          echo "<span><em title='请点击右侧头像'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
        }
        echo  "</div>".
          "</li>";
        //收藏
        echo "<li class='collect'>".
            "<a href='{$shopFavorite}' style='background-image:url({$collectPic}); height:{$tbm_collectheight}px;' target='_blank' title='收藏本店'></a>".
          "</li>";
        //在线时间
        echo "<li class='worktime'>".
            "<h4>".$tbm_worktimetitle."</h4>";
          foreach ($worktimetxt as $v) {
            echo "<p>".$v."</p>";
          }
        echo "</li>";
      ?>
    </ul>
  </div>
</div>
