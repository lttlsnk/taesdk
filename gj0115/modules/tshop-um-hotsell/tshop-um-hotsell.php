<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-hotsell"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-hotsell">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
    //self value
    $tipArr = array("�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�","�ۿ�");
    $tipArr = $tbm_tip ? array_merge(explode("|", $tbm_tip), $tipArr) : $tipArr;
    $textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("�ؼ���1","�ؼ���2","�ؼ���3","�ؼ���4");
    $rebateArr = array(10,10,10,10);
    $rebateArr = $tbm_rebate ? array_merge(explode("|", $tbm_rebate), $rebateArr) : $rebateArr;
    //����
    $itemNum = 4;
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

  <div class="mainbox_hd hotsell_hd">
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
  <div class="hotsell_bd">
    <div class="mall-slide J_TWidget" data-widget-type="Carousel" data-widget-config="{
        'effect': 'fade',
        'easing': 'easeOutStrong',
        'steps':1,
        'autoplay': false,
        'viewSize': [950]
    }">
      <div  class="mall-content">
          <ul class="ks-switchable-content">
            <?php
              foreach ($itemsArr as $k => $v) {
                $item = $itemsArr[$k];
                $pic = $item->getPicUrl(400);
                $price = $item->price;
                $title = $item->title;
                $sale =$item->soldCount;
                $rebate = $rebateArr[$k];
                $rebate = is_numeric($rebate) ? $rebate : 10;
                $original = round($price/($rebate/10));
                $saving = $original - $price;
                echo "<li>".
                          "<div class='detail'>".
                          "<h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                            "<div class='price'><i></i>".$price.".00<a href='{$url}' target='_blank'></a></div>".
                            "<div class='info'>".
                              "<ul class='salecon'>".
                                "<li><em>ԭ��</em><del>��".$original."</del></li>".
                                "<li><em>�ۿ�</em><span>".$rebate."</span></li>".
                                "<li class='last'><em>��ʡ</em><span>��".$saving."</span></li>".
                              "</ul>".
                              "<p class='tip'><span><em>".$sale."</em>���ѹ���</span>�������ޣ��Ͽ��µ���</p>".
                            "</div>".
                          "</div>".
                          "<div class='pic itempic'>".
                          "<a href='{$url}' style='background-image:url({$pic});' target='_blank'></a>".
                          "</div>".
                        "</li>";
              }
            ?>
          </ul>
        </div>
        <ul class="ks-switchable-nav clear">
          <?php
            foreach ($itemsArr as $k => $v) {
              $item = $itemsArr[$k];
              $url = $uriManager->detailURI($item);
              $pic = $item->getPicUrl(120);
              $firstClass = $k == 0 ? "ks-active" : "";
              echo "<li class='{$firstClass} itempic'>".
                "<a href='{$url}' style='background-image:url({$pic});' target='_blank'></a>".
                "</li>";
            }
          ?>
        </ul>
    </div>
  </div>
</div>