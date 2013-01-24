<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-textrecommend"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-textrecommend">  
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $notes = $tbm_notice_text ? explode("|",$tbm_notice_text) : array("����1����������������Ĺ���1������","����2����������������Ĺ���2������","����3����������������Ĺ���3������");
  $notesLink = !$tbm_notice_link ? explode("|",$tbm_notice_link) : array("#","#","#");
  $noteStyle = "color:".$tbm_fontcolor."; font-weight:".$tbm_fontweight."; font-size:".$tbm_fontsize.
                "; font-family:".$tbm_fontfamily;
  $interval = $tbm_interval ? $tbm_interval: "3";
  //textLeft
  $leftSub1 = $tbm_text_left_sub1 ? explode("|",$tbm_text_left_sub1) : array("�˶��·�","�˶�����","����ţ��","ѧ����װ");
  $leftSubLink1 = $tbm_text_left_sub_link1 ? explode("|",$tbm_text_left_sub_link1) : array("#","#","#","#");
  $leftSub2 = $tbm_text_left_sub2 ? explode("|",$tbm_text_left_sub2) : array("�˶��·�","�˶�����","����ţ��","ѧ����װ");
  $leftSubLink2 = $tbm_text_left_sub_link2 ? explode("|",$tbm_text_left_sub_link2) : array("#","#","#","#");
  //textRight
  $rightSub1 = $tbm_text_right_sub1 ? explode("|",$tbm_text_right_sub1) : array("�˶��·�","�˶�����","����ţ��","ѧ����װ");
  $rightSubLink1 = $tbm_text_right_sub_link1 ? explode("|",$tbm_text_right_sub_link1) : array("#","#","#","#");
  $rightSub2 = $tbm_text_right_sub2 ? explode("|",$tbm_text_right_sub2) : array("�˶��·�","�˶�����","����ţ��","ѧ����װ");
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
