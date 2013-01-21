<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-head"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-head">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  //text_left
  $textLeft = $tbm_text_left ? explode("|",$tbm_text_left) : array("文字一","文字二","文字三");
  $textLeftLink = $tbm_text_left_link ? explode("|", $tbm_text_left_link) : array("#","#","#");
  //text_right
  $textRight = $tbm_text_right ? explode("|",$tbm_text_right) : array("文字四","文字五","文字六");
  $textRightLink = $tbm_text_right_link ? explode("|", $tbm_text_right_link) : array("#","#","#");
  //text_style
  $textColor = $text_color ? $text_color : "#86f6fa";
  $textStyle = "color:".$textColor."; font-weight:".$tbm_text_weight.
                "; font-size:".$tbm_text_size."; text-decoration:".$tbm_text_underline.";";
?>
  <div class="logo">
    <img src="<?=$tbm_logo_img?>" title="<?=$shopTitle?>" width="500" height="100" />
  </div>
  <div class="text_left">
    <?php
      foreach($textLeft as $k=>$v){
        $textlink = $textLeftLink[$k];
        $icon = $k == count($textLeft)-1 ? "" : $tbm_text_icon;
        echo "<a style='{$textStyle}' target='$tbm_text_target' href='{$textLeftLink[$k]}'>$v<em>$icon</em></a>";
      }
    ?>
  </div>
  <div class="text_right">
    <?php
      foreach($textRight as $k=>$v){
        $textlink = $textRightLink[$k];
        $icon = $k == count($textRight)-1 ? "" : $tbm_text_icon;
        echo "<a style='{$textStyle}' target='$tbm_text_target' href='{$textRightLink[$k]}'>$v<em>$icon</em></a>";
      }
    ?>
  </div>
</div>
