<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-topbanner"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-topbanner">
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
    $thumb = ${'tbm_pic'.$i.'_thumb'};
    ${'tbm_pic'.$i.'_thumb'} = $thumb ? $thumb : ${'tbm_pic'.$i.'_url'};
    $title = ${'tbm_pic'.$i.'_title'};
    ${'tbm_pic'.$i.'_title'} = $title ? $title : '��'.$numArr[$i-1].'���ֲ�����';
    $link = ${'tbm_pic'.$i.'_link'};
    ${'tbm_pic'.$i.'_link'} = $link ? $link : $shopUrl;
  }
?>
  
  <div class="banner_slide J_TWidget" data-widget-type="Carousel" data-widget-config="{
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
    <div  class="banner_content clearfix" >
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
    <div  class="J_TWidget hidden btns" data-widget-type="Popup" data-widget-config="{
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
              if($i==1){
                echo '<li class="ks-active">'.$title.'</li>';
              }else{
                echo '<li>'.$title.'</li>';
              }
            }

          }else if($tbm_type == "stylethumb"){//����ͼ
            for($i=1; $i<=$tbm_num; $i++){
              $thumb = ${'tbm_pic'.$i.'_thumb'};
              if($i==1){
                echo "<li class='ks-active' style='background-image:url({$thumb});'></li>";
              }else{
                echo "<li style='background-image:url({$thumb});'></li>";
              }
            }
          }else{//����
            for($i=1; $i<=$tbm_num; $i++){//����
              if($i==1){
                echo '<li class="ks-active">'.$i.'</li>';
              }else{
                echo '<li>'.$i.'</li>';
              }
            }
          }
        ?>
      </ul>
    </div>
  </div>
</div>