<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-banner"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-banner">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $numArr = array('һ','��','��','��','��','��','��','��');
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //init value
  //pic���ݳ�ʼ��
  for($i=1; $i<=$tbm_num; $i++){
    $url = ${'tbm_pic'.$i.'_url'};
    ${'tbm_pic'.$i.'_url'} = $url ? $url : $globalUrl.'/default/topbanner.jpg';
    $title = ${'tbm_pic'.$i.'_title'};
    ${'tbm_pic'.$i.'_title'} = $title ? $title : '��'.$numArr[$i-1].'���ֲ�����';
    $link = ${'tbm_pic'.$i.'_link'};
    ${'tbm_pic'.$i.'_link'} = $link ? $link : "#";
  }
?>
<div style="">����</div>
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
      <a class="pre" title="��һ��"><i></i></a>
      <a class="next" title="��һ��"><i></i></a>
    </div>
    <div class="banner_nav <?php echo $tbm_type; ?>">
      <span class="alphabg"></span>
      <ul class="banner_nav_con">
        <?php
          if($tbm_type == "stylebar"){//����
            for($i=1; $i<=$tbm_num; $i++){
              $title = ${'tbm_pic'.$i.'_title'};
              $activClass = '';
              if($i==1){
                $activClass = "ks-active";
              }
              echo "<li class='{$activClass}'>".$title."</li>";
            }
          }else if($tbm_type == "stylethumb"){//����ͼ
            for($i=1; $i<=$tbm_num; $i++){
              $thumb = ${'tbm_pic'.$i.'_url'};
              $activClass = '';
              if($i==1){
                $activClass = 'class = "ks-active"';
              }
              echo "<li {$activClass}><img src='{$thumb}' /></li>";
            }
          }else{//����
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
