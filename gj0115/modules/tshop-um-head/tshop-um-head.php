<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-head"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-head">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  //text_left
  $textLeft = $tbm_text_left ? explode("|",$tbm_text_left) : array("����һ","���ֶ�","������");
  $textLeftLink = $tbm_text_left_link ? explode("|", $tbm_text_left_link) : array("#","#","#");
  //text_right
  $textRight = $tbm_text_right ? explode("|",$tbm_text_right) : array("������","������","������");
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
