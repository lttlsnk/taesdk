<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-mainrecommend"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-mainrecommend">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("�ؼ���1","�ؼ���2","�ؼ���3","�ؼ���4");
  //����
  $itemNum = 7;
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
?>
  <div class="mainbox_hd mainrecommend_hd">
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
  <div class="mainrecommend_bd">
    <div class="toppic <?php echo $tbm_floatpos; ?>">
      <?php
        $item = $itemsArr[0];
        $id = $item->id;
        $pic = $item->getPicUrl(480);
        $price = $item->price;
        $price = round($price*100)/100;
        $title = $item->title;
        $sale =$item->soldCount;
        echo "<div class='pic itempic'>".
                "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                   "<span class='mask'></span>".
                   "<h3>".$title."</h3>".
                  "<span class='price'><em>��  ".$price."</em>.00</span>".
                "</a>".
              "</div>";
      ?>
    </div>
    <div class="items <?php echo $tbm_floatpos; ?>">
      <ul>
        <?php
          for($i=1; $i<$itemNum; $i++){
            $row = floor(($i-1)/3);
            $item = $itemsArr[$i];
            $id = $item->id;
            $pic = $item->getPicUrl(210);
            $price = $item->price;
            $price = round($price*100)/100;
            $title = $item->title;
            $sale =$item->soldCount;
            echo "<li class='row{$row}'>".
                      "<div class='pic itempic'>".
                      "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                        "<h3>".$title."</h3>".
                        "<span class='mask'></span>".
                      "</a>".
                      "</div>".
                      "<div class='price'><span>��".$price.".00</span><a href='{$url}' target='_blank'></a></div>".
                    "</li>";
          }
        ?>
      </ul>
    </div>
  </div>
</div>
