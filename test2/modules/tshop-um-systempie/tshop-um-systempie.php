<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-systempie"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-systempie">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $moduleWidth = "w".$regionWidth;
  $tbm_textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("���⸬","ţ���","����˿","�ݽ���צ");
    //����
    $itemNum = $tbm_itemnum ? round($tbm_itemnum/3)*3 : 6;
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
  <div class="systempie <?php echo $moduleWidth;?>">
    <div class="mainbox_hd systempie_hd">
      <h3><?php echo $tbm_moduletitle; ?></h3>
      <p class="link_list">
        <?php
          foreach ($tbm_textlink as $key => $value) {
            $firstClass = $key == 0 ? "first" : "";
            $url = "http://shop".$_shop->id.".taobao.com?search=y&keyword=".urlencode($value);
            echo "<a href='{$url}' class='{$firstClass}'>".$value."</a>";
          }
        ?>
      </p>
    </div>
    <div class="systempie_bd mainbox clear">
    <?php
      //item
      foreach ($items as $item) {
        $picWidth = $regionWidth == 950 ? 310 : 220;
        $pic = $item->getPicUrl($picWidth);
                $price = $item->price;
                $title = $item->title;
                $sale =$item->soldCount;
                $url = $uriManager->detailURI($item);
                
                echo "<div class='item'>".
                  "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                  "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                  "<div class='price'><span>��".$price.".00</span><i></i></div>".
                  "<div class='sale'>���30���۳�<em>".$sale."</em>��</div>".
                  "</div>";
      }
    ?>
    </div>
  </div>
</div>
