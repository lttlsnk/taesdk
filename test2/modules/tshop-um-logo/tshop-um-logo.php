<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-logo"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-logo" style="">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $shareConfig = getShareConfig("shop",$shopId,$shopTitle);
  $logoPic = $tbm_logopic ? $tbm_logopic : $globalUrl."/logo.png";
  $notes = $tbm_notes ? explode("|",$tbm_notes) : array("����1����������������Ĺ���1������","����2����������������Ĺ���2������","����3����������������Ĺ���3������");
  $notesLink = !$tbm_noteslink ? explode("|",$tbm_noteslink) : array("#","#","#");
  //�����ٶ�
  switch ($tbm_noteSpeed) {
    case 1: $speed = 0.2; break;
    case 2: $speed = 0.5; break;
    case 3: $speed = 0.8; break;
  }
?>
  <div class="logobox" style="background-image: url(<?=$logoPic?>)"></div>
  <div class="J_TWidget topnote" data-widget-type="Slide" data-widget-config="{
          'autoplay':true,
          'effect':'scrolly',
          'steps':1,
          'duration':'<?php echo $speed; ?>',
          'interval':'2'
          }"
    >
    <div class="content"  style="<?php if($tbm_noteShow==2) echo 'display:none;' ?>">
      <ul class="ks-switchable-content">
          <?php
        foreach($notes as $k=>$v){
          $itemlink = $notesLink[$k];
          echo "<li><i></i><a target='_blank' href='{$notesLink[$k]}'>$v</a></li>";
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="link-rb">
    <ul>
      <li class="share-info">
        <span class="title">������̵���</span>
        <div class="sns-widget" data-sharebtn='<?=$shareConfig?>'></div>
      </li>
      <li class="link-list" style="<?php if($tbml_inkShow==2) echo ' display:none;' ?>">
        <a target="_blank" class="mycart" href="http://cart.taobao.com/my_cart.htm"><i></i>�ҵĹ��ﳵ</a>
        <a target="_blank" class="myorder" href="http://trade.taobao.com/trade/itemlist/list_bought_items.htm"><i></i>�ҵĶ���</a>
        <a target="_blank" class="favor" href="http://msp.taobao.com/pc/popup/sendsms.htm?shop_id=<?=$shopId?>"><i></i>�ղص��ֻ�</a>
      </li>
    </ul>
  </div>
</div>