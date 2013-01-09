<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-tabslide"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-tabslide">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $itemNum = 4;
  $tabWidth = floor(950/$tbm_tabnum);
  $titleArr = array();
  $itemsArr = array();
  for ($i=1; $i<=$tbm_tabnum ; $i++) {
    //title
    $titleArr[$i] = ${'tbm_biaoti'.$i};
    //items
    $resources = ${'tbm_resources'.$i};
    $order = ${'tbm_order'.$i};
    $items = array();
    if($resources == 1){//����Ŀ�Զ���ȡ
      $cate = ${'tbm_cates'.$i};
      if($cate){
        $ids=json_decode($cates);
        $rid=$ids[0]->{rid};
        $items=$itemManager-> queryByCategory ($rid,$orders,$itemNum);
      }
    }elseif ($resources == 2) {//�ֶ�ѡ��
      $ids = ${'tbm_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
      if($ids){
        foreach($ids as $k=>$v){
          $items[$k]=$itemManager->queryById($v);
        }
      }
    }elseif ($resources == 3) {//���ؼ��ֻ�ȡ
      $ids = ${'tbm_keyword'.$i};
      $items = $itemManager->queryByKeyword($ids,$orders,$itemNum);
    }
    //Ĭ��ȡ��������
    if(!$items){
      $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
    }
    $itemsArr[$i] = $items;
  }
?>

  <div class="J_TWidget" data-widget-type="Tabs"  data-widget-config="{
      'effect':'scrollx',
      'viewSize': 970
    }">
    <ul class="ks-switchable-nav">
      <?php
        foreach ($titleArr as $k => $v) {
          $first = $k==1 ? "class='ks-active'" : "";
          echo "<li {$first} style='width:{$tabWidth}px;'>".$v."</li>";
        }
      ?>
    </ul>
    <div class="content_con">
      <div class="ks-switchable-content mainbox">
        <?php
          foreach ($itemsArr as $k => $v) {
            $show = $k != 1 ? "style='display:none;'" : "";
            echo "<div class='items' {$show}>";
            //item
            $items = $itemsArr[$k];
            foreach ($items as $item) {
              $pic = $item->getPicUrl(220);
                      $price = $item->price;
                      $title = $item->title;
                      $sale =$item->soldCount;
                      $url = $uriManager->detailURI($item);
                      $shareStr = "";
                      $shareStr = $tbm_itemshare == 2 ? "" : $shareStr;
                      
                      echo "<div class='item'>".
                        "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                        "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                        "<div class='price'><span>��".$price.".00</span><i></i></div>".
                        "<div class='sale'>���30���۳�<em>".$sale."</em>��</div>".
                        $shareStr.
                        "</div>";
            }
            echo "</div>";
          }
        ?>
      </div>
    </div>
  </div>
</div>