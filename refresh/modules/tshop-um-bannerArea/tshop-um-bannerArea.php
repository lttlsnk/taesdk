<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-bannerArea"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-bannerArea">
<?php
/**
 * ��ʼ���PHPҳ��
 */
?>
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $itemURL = array($globalUrl."/default/banner1.jpg", $globalUrl."/default/banner2.jpg", $globalUrl."/default/banner3.jpg");
  $itemTitle = array("ͼƬ1","ͼƬ2","ͼƬ3");
  $itemLink = array($shopUrl, $shopUrl, $shopUrl);
  //ѡȡ����
  if($tbm_datafrom == 1){
    $itemSelector = explode(',',$tbm_itemselecter);
    foreach($itemSelector as $k=>$v){
      $item = $itemManager->queryById($v);
      $itemURL[$k] = $item->getPicUrl(310);
      $itemTitle[$k] = $item->title;
      $itemLink[$k] = $uriManager->detailURI($item);
    }
  }elseif ($tbm_datafrom == 2) {//�Զ���
    $tbm_bannerpic = explode('|',$tbm_bannerpic);
    $tbm_bannertitle = explode('|',$tbm_bannertitle);
    $tbm_bannerlink = explode('|',$tbm_bannerlink);
    for($i=0; $i<3; $i++){
      $itemURL[$i] = $tbm_bannerpic[$i] ? $tbm_bannerpic[$i] : $itemURL[$i];
      $itemTitle[$i] = $tbm_bannertitle[$i] ? $tbm_bannertitle[$i] : $itemTitle[$i];
      $itemLink[$i] = $tbm_bannerlink[$i] ? $tbm_bannerlink[$i] : $itemLink[$i];
    }
  }
?>
  
  <ul class="clear">
    <?php
      foreach($itemURL as $k=>$v){
        echo '<li>'.
          "<a href='{$itemLink[$k]}' style='background-image:url({$itemURL[$k]});' target='_blank'>".
          '<span><em class="alphabg"></em><em>'.$itemTitle[$k].'</em></span>'.
          '</a></li>';
      }
    ?>
  </ul>
</div>
