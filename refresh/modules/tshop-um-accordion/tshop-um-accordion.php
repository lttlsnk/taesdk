<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-accordion"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-accordion">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  //����
    $itemNum = $tbm_itemnum ? $tbm_itemnum : 10;
    if($tbm_resources == 1){//����Ŀ�Զ���ȡ
      if($tbm_cate){
        $ids=json_decode($cates);
        $rid=$ids[0]->{rid};
        $items=$itemManager-> queryByCategory ($rid,$tbm_orders,$itemNum);
      }
    }elseif ($tbm_resources == 2) {//�ֶ�ѡ��
      $ids = $tbm_item ? explode(',',$tbm_item) : NULL;
      if($ids){
        foreach($ids as $k=>$v){
          $items[$k]=$itemManager->queryById($v);
        }
      }
    }elseif ($tbm_resources == 3) {//���ؼ��ֻ�ȡ
      $ids = $tbm_keyword;
      $items = $itemManager->queryByKeyword($ids,$tbm_orders,$itemNum);
    }
    //Ĭ��ȡ��������
    if(!$items){
      $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
    }
?>
  <div class="mainbox190_hd accordion_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
  </div>
  <div class="mainbox190_bd accordion_bd">
    <div class="J_TWidget accordion-content section" data-widget-type="Accordion" data-widget-config="{'triggerType':'mouse'}">
      <?php
        foreach ($items as $key => $item) {
          $firstClass = $key == 0 ? "ks-active" : "";
          $lastClass = $key == count($items)-1 ? "last" : "";
          $otherStyle = $key != 0 ? "display:none;" : "";
          $num = $key + 1;
          $picWidth = 80;
          $pic = $item->getPicUrl($picWidth);
                  $price = $item->price;
                  $title = $item->title;
                  $url = $uriManager->detailURI($item);
                  echo "<div class='ks-switchable-trigger clear {$firstClass} {$lastClass}'>".
                      "<i>".$num."</i><h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                    "</div>".
                    "<div class='ks-switchable-panel clear {$lastClass}' style='{$otherStyle}'>".
                      "<div class='pic itempic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                      "<div class='detail'>".
                        "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                        "<div class='price'>�� ".$price."</div>".
                        "<div class='buy'><a href='{$url}' target='_blank'>����</a></div>".
                      "</div>".
                    "</div>";
        }
      ?>
    </div>
  </div>
</div>