<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-shopnotice"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-shopnotice">
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
  $shuotxt = substr($tbm_shuotxt, 0, 18);
?>
  <div class="shopnotice_hd">
    <h3><span><?php echo $tbm_moduletitle;?></span><span><?php echo $tbm_mouduletitleen;?></span></h3>
    <p class="notice_content"><?php echo $tbm_noticecontent;?></p>
    <div class="J_TWidget notice_tab" data-widget-type="Tabs">
      <ul class="ks-switchable-nav">
        <li class="ks-active"><a href="<?php echo $tbm_weibo;?>">微博</a></li>
        <li><a href="<?php echo $tbm_shuo;?>">掌柜说</a></li>
        <li class="last"><a href="<?php echo $tbm_bangpai;?>">入帮派</a></li>
      </ul>
      <div class="ks-switchable-content">
        <div>
          <p><a href="<?php echo $tbm_weibo;?>" target="_blank"><?php echo $tbm_weibo;?></a></p>
        </div>
        <div style="display:none;">
          <p><?php echo $shuotxt;?></p>
          <p class="add_btn"><a href="<?php echo $tbm_shuo;?>" target="_blank"><em>+</em>关注</a></p>
        </div>
        <div style="display:none;">
          <p><?php echo $tbm_bangpaitxt;?></p>
          <p class="add_btn"><a href="<?php echo $tbm_bangpai;?>" target="_blank"><em>+</em>加入</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="shopnotice_bd ft-info-wangwang">
    <ul>
      <li>
        <span class="title"><?php echo $tbm_servicehead1; ?>：</span>
        <?php
          foreach($kefu1id as $k=>$v){
            $itemName = $kefu1name[$k];
            echo "<span><em title='请点击右侧头像'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
          } 
        ?>
      </li>
      <li>
        <span class="title"><?php echo $tbm_servicehead2; ?>：</span>
        <?php
          foreach($kefu2id as $k=>$v){
            $itemName = $kefu2name[$k];
            echo "<span><em title='请点击右侧头像'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
          }
         ?>
      </li>
      <li class="worktime"><?php echo $tbm_worktime; ?></li>
    </ul>
  </div>
</div>