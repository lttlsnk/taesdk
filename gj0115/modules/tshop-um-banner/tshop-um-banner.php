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
  //pic���ݳ�ʼ��
  $urlArr = $tbm_pic_url ? explode("|", $tbm_pic_url) : array();
  $picNum = count($url)>0 ? count($url) : 4;
  $titleArr = $tbm_pic_title ? explode("|", $tbm_pic_title) : array("��һ���ֲ�����","�ڶ����ֲ�����","�������ֲ�����","�������ֲ�����");
  $linkArr = $tbm_pic_link ? explode("|", $tbm_pic_link) : array("#","#","#","#");
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
    <div  class="banner_content clearfix">
      <ul class="ks-switchable-content">
        <?php
          for($i=0; $i<4; $i++){
            $url = $urlArr[$i] ? $urlArr[$i] : 'assets/images/1.jpg';
            $link = $linkArr[$i];
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
            for($i=0; $i<$picNum; $i++){
              $title = $titleArr[$i];
              $activClass = '';
              if($i==0){
                $activClass = "ks-active";
              }
              echo "<li class='{$activClass}'>".$title."</li>";
            }
          }else if($tbm_type == "stylethumb"){//����ͼ
            for($i=0; $i<$picNum; $i++){
              $thumb = $urlArr[$i] ? $urlArr[$i] : 'assets/images/1.jpg';
              $activClass = '';
              if($i==0){
                $activClass = 'class = "ks-active"';
              }
              echo "<li {$activClass}><img src='{$thumb}' /></li>";
            }
          }else{//����
            for($i=0; $i<$picNum; $i++){
              $curNum = $i+1;
              $activClass = '';
              if($i==0){
                $activClass = 'class = "ks-active"';
              }
              echo "<li {$activClass}>".$curNum."</li>";
            }
          }
        ?>
      </ul>
    </div>
  </div>
</div>
