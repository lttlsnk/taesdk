<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-textrecommend"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-textrecommend">  
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $notes = $tbm_notice_text ? explode("|",$tbm_notice_text) : array("公告1：请在这里输入你的公告1的内容","公告2：请在这里输入你的公告2的内容","公告3：请在这里输入你的公告3的内容");
  $notesLink = !$tbm_notice_link ? explode("|",$tbm_notice_link) : array("#","#","#");
  $noteStyle = "color:".$tbm_fontcolor."; font-weight:".$tbm_fontweight."; font-size:".$tbm_fontsize.
                "; font-family:".$tbm_fontfamily;
  $interval = $tbm_interval ? $tbm_interval: "3";
  //textLeft
  $leftSub1 = $tbm_text_left_sub1 ? explode("|",$tbm_text_left_sub1) : array("运动衣服","运动裤子","宽松牛仔","学生套装");
  $leftSubLink1 = $tbm_text_left_sub_link1 ? explode("|",$tbm_text_left_sub_link1) : array("#","#","#","#");
  $leftSub2 = $tbm_text_left_sub2 ? explode("|",$tbm_text_left_sub2) : array("运动衣服","运动裤子","宽松牛仔","学生套装");
  $leftSubLink2 = $tbm_text_left_sub_link2 ? explode("|",$tbm_text_left_sub_link2) : array("#","#","#","#");
  //textRight
  $rightSub1 = $tbm_text_right_sub1 ? explode("|",$tbm_text_right_sub1) : array("运动衣服","运动裤子","宽松牛仔","学生套装");
  $rightSubLink1 = $tbm_text_right_sub_link1 ? explode("|",$tbm_text_right_sub_link1) : array("#","#","#","#");
  $rightSub2 = $tbm_text_right_sub2 ? explode("|",$tbm_text_right_sub2) : array("运动衣服","运动裤子","宽松牛仔","学生套装");
  $rightSubLink2 = $tbm_text_right_sub_link2 ? explode("|",$tbm_text_right_sub_link2) : array("#","#","#","#");
  //textStyle
  $titleStyle = "color:".$tbm_title_color."; font-weight:".$tbm_title_fontweight.";";
  $subStyle = "color:".$tbm_sub_color."; font-weight:".$tbm_sub_fontweight."; font-size:".$tbm_sub_fontsize.";";
?>
  <div class="J_TWidget notice" data-widget-type="Slide" data-widget-config="{
          'autoplay':true,
          'effect':'scrolly',
          'steps':1,
          'duration':'1',
          'interval':'<?php echo $interval; ?>'
          }"
    >
    <div class="content">
      <ul class="ks-switchable-content">
      <?php
        foreach($notes as $k=>$v){
          $itemlink = $notesLink[$k];
          echo "<li><a style='{$noteStyle}' target='_blank' href='{$itemlink}'>$v</a></li>";
        }
      ?>
      </ul>
    </div>
  </div>
  <div class="text_recommend">
    <div class="text_left">
      <dl>
        <?php
          for($i=1; $i<=2; $i++){
            $title = ${'tbm_text_left'.$i};
            $link = ${'tbm_text_left_link'.$i};
            echo "<dt class='title{$i}'><a style='{$titleStyle}' href='{$link}'>$title</a></dt>";
            //sub
            $sub = ${'leftSub'.$i};
            echo "<dd class='sub{$i}'><ul>";
            foreach($sub as $k=>$v){
              $subLink = ${'leftSubLink'.$i}[$k];
              $last = $k == count($leftSub1)-1 ? "" : "|";
              echo "<li><a style='{$subStyle}' target='_blank' href='{$subLink}'>$v</a><em style='{$subStyle}'>".$last."</em></li>";
            }
            echo "</ul></dd><dd class='clear'></dd>";
          }
        ?>
      </dl>
    </div>
    <div class="text_right">
      <dl>
        <?php
          for($i=1; $i<=2; $i++){
            $title = ${'tbm_text_right'.$i};
            $link = ${'tbm_text_right_link'.$i};
            echo "<dt class='title{$i}'><a style='{$titleStyle}' href='{$link}'>$title</a></dt>";
            //sub
            echo "<dd class='sub{$i}'><ul>";
            $sub = ${'rightSub'.$i};
            foreach($sub as $k=>$v){
              $subLink = ${'rightSubLink'.$i}[$k];
              $last = $k == count($leftSub1)-1 ? "" : "|";
              echo "<li><a style='{$subStyle}' target='_blank' href='{$subLink}'>$v</a><em style='{$subStyle}'>".$last."</em></li>";
            }
            echo "</ul></dd><dd class='clear'></dd>";
          }
        ?>
      </dl>
    </div>
  </div>
</div>
