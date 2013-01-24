<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-banner"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-banner">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $numArr = array('一','二','三','四','五','六','七','八');
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //init value
  //pic数据初始化
  for($i=1; $i<=$tbm_num; $i++){
    $url = ${'tbm_pic'.$i.'_url'};
    ${'tbm_pic'.$i.'_url'} = $url ? $url : $globalUrl.'/default/topbanner.jpg';
    $title = ${'tbm_pic'.$i.'_title'};
    ${'tbm_pic'.$i.'_title'} = $title ? $title : '第'.$numArr[$i-1].'张轮播文字';
    $link = ${'tbm_pic'.$i.'_link'};
    ${'tbm_pic'.$i.'_link'} = $link ? $link : "#";
  }
?>
<div style="">海报</div>
  <div class="banner_slide J_TWidget" data-widget-type="Carousel" style="height:<?php echo $tbm_mainheight.'px' ?>;" data-widget-config="{
        'navCls':'banner_nav_con',
        'effect': '<?php echo $tbm_effect ?>',
        'easing': '<?php echo $tbm_easing ?>', 
        'steps':1,
        'viewSize': 950,
        'delay': <?php echo $tbm_delay ?>,
          'duration': <?php echo $tbm_duration ?>,
          'autoplay':<?php echo $tbm_autoplay ?>,
        'circular': true,
        'prevBtnCls': 'pre',
        'nextBtnCls': 'next',
        'disableBtnCls': 'disable'
        }">
    <div  class="banner_content clearfix" style="height:<?php echo $tbm_mainheight.'px' ?>;">
      <ul class="ks-switchable-content">
        <?php
          for($i=1; $i<=4; $i++){
            $url = ${'tbm_pic'.$i.'_url'};
            $link = ${'tbm_pic'.$i.'_link'};
            echo "<li><a target='_blank' href='{$link}' style='background-image:url({$url});'></a></li>";
          }
        ?>
      </ul>
    </div>
    <div  class="J_TWidget btns <?php echo $tbm_arrow; ?>" data-widget-type="Popup" data-widget-config="{
      'trigger':'.banner_content',
      'align':{
        'node':'.banner_content',
        'offset':[0,0],
        'points':['cc','cc']
      }
    }">
      <a class="pre" title="上一张"><i></i></a>
      <a class="next" title="下一张"><i></i></a>
    </div>
    <div class="banner_nav <?php echo $tbm_type; ?>">
      <span class="alphabg"></span>
      <ul class="banner_nav_con">
        <?php
          if($tbm_type == "stylebar"){//标题
            for($i=1; $i<=$tbm_num; $i++){
              $title = ${'tbm_pic'.$i.'_title'};
              $activClass = '';
              if($i==1){
                $activClass = "ks-active";
              }
              echo "<li class='{$activClass}'>".$title."</li>";
            }
          }else if($tbm_type == "stylethumb"){//缩略图
            for($i=1; $i<=$tbm_num; $i++){
              $thumb = ${'tbm_pic'.$i.'_url'};
              $activClass = '';
              if($i==1){
                $activClass = 'class = "ks-active"';
              }
              echo "<li {$activClass}><img src='{$thumb}' /></li>";
            }
          }else{//数字
            for($i=1; $i<=$tbm_num; $i++){
              $activClass = '';
              if($i==1){
                $activClass = 'class = "ks-active"';
              }
              echo "<li {$activClass}>".$i."</li>";
            }
          }
        ?>
      </ul>
    </div>
  </div>
</div>
