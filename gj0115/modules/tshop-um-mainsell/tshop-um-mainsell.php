<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-mainsell"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-mainsell">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $tipArr = array("�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�");
  $tipArr = $tbm_tip ? array_merge(explode("|", $tbm_tip), $tipArr) : $tipArr;
  $textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("�ؼ���1","�ؼ���2","�ؼ���3","�ؼ���4");
  //����
  $itemNum = 8;
  if($tbm_resources == 1){//����Ŀ�Զ���ȡ
    if($tbm_cate){
      $ids=json_decode($cates);
      $rid=$ids[0]->{rid};
      $itemsArr=$itemManager-> queryByCategory ($rid,$tbm_orders,$itemNum);
    }
  }elseif ($tbm_resources == 2) {//�ֶ�ѡ��
    $ids = $tbm_item ? explode(',',$tbm_item) : NULL;
    if($ids){
      foreach($ids as $k=>$v){
        $k;
        $itemsArr[$k]=$itemManager->queryById($v);
      }
    }
  }elseif ($tbm_resources == 3) {//���ؼ��ֻ�ȡ
    $ids = $tbm_keyword;
    $itemsArr = $itemManager->queryByKeyword($ids,$tbm_orders,$itemNum);
  }
  //Ĭ��ȡ��������
  if(!$itemsArr){
    $itemsArr = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
  }
?>
  <div class="mainbox_hd mainsell_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
    <p class="link_list">
        <?php
          foreach ($textlink as $key => $value) {
            $firstClass = $key == 0 ? "first" : "";
            $url = "http://shop".$_shop->id.".taobao.com?search=y&keyword=".urlencode($value);
            echo "<a href='{$url}' class='{$firstClass}'>".$value."</a>";
          }
        ?>
      </p>
  </div>
  <div class="mainsell_bd">
    <div class="item_left">
      <ul>
        <?php
          for($i=0; $i<3; $i++){
            $item = $itemsArr[$i];
            $id = $item->id;
            $pic = $item->getPicUrl(220);
            $price = $item->price;
            $title = $item->title;
            $sale =$item->soldCount;
            $linkConfig = '{"key":"'.$id.'","type":2, "skinType":2}';
            echo "<li>".
                      "<div class='pic itempic'>".
                      "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                        "<span class='price'>�۸�".$price."</span>".
                        "<span class='mask'></span>".
                      "</a>".
                      "</div>".
                      "<div class='detail'>".
                        "<h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                        "<div class='sns-widget' data-like='{$linkConfig}'></div>".
                        "<div class='sell'>�۳�(<em>".$sale."</em>)</div>".
                      "</div>".
                    "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="item_center">
      <ul>
        <?php
          for($i=3; $i<5; $i++){
            $item = $itemsArr[$i];
            $id = $item->id;
            //pic
            if($i==3){
              $pic = $item->getPicUrl(460);
              $pic = $tbm_cpic1 ? $tbm_cpic1 : $pic;
            }else{
              $pic = $item->getPicUrl(670);
              $pic = $tbm_cpic2 ? $tbm_cpic2 : $pic;
            }
            $price = $item->price;
            $title = $item->title;
            $sale =$item->soldCount;
            $linkConfig = '{"key":"'.$id.'","type":2, "skinType":2}';
            //render
            echo "<li class='item{$i}'>".
                    "<div class='pic itempic'>".
                      "<a href='{$url}' style='background-image:url({$pic});' target='_blank'></a>".
                    "</div>".
                    "<div class='detail'>".
                        "<span class='tip'></span>".
                        "<h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                        "<div class='sns-widget' data-like='{$linkConfig}'></div>".
                        "<div class='sell'>�۳�(<em>".$sale."</em>)</div>".
                        "<div class='price'><span>".$price."RMB</span><a href='{$url}' target='_blank'></a></div>".
                    "</div>".
                  "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="item_right">
      <ul>
        <?php
          for($i=5; $i<8; $i++){
            $item = $itemsArr[$i];
            $id = $item->id;
            $pic = $item->getPicUrl(220);
            $price = $item->price;
            $title = $item->title;
            $sale =$item->soldCount;
            $linkConfig = '{"key":"'.$id.'","type":2, "skinType":2}';
            echo "<li>".
                      "<div class='pic itempic'>".
                      "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                        "<span class='price'>�۸�".$price."</span>".
                        "<span class='mask'></span>".
                      "</a>".
                      "</div>".
                      "<div class='detail'>".
                        "<h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                        "<div class='sns-widget' data-like='{$linkConfig}'></div>".
                        "<div class='sell'>�۳�(<em>".$sale."</em>)</div>".
                      "</div>".
                    "</li>";
          }
        ?>
      </ul>
    </div>
  </div>
</div>
