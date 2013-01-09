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
    //����
    $itemNum = 9;
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
    <p class="link_list"><?php echo $tbm_moduleintro; ?></p>
  </div>
  <div class="hotsell_bd">
    <div class="mall-slide J_TWidget" data-widget-type="Carousel" data-widget-config="{
        'effect': 'scrollx',
                'easing': 'easeOutStrong',
                'steps':1,
                'autoplay': false,
                'viewSize': [950],
                'prevBtnCls': 'hotsell-prev',
                'nextBtnCls': 'hotsell-next'
            }">
      <a title="��һҳ" href="#" class="hotsell-prev"><i></i></a>
      <a title="��һҳ" href="#" class="hotsell-next"><i></i></a>
      <div  class="mall-content">
          <ul class="ks-switchable-content">
            <?php
              foreach ($itemsArr as $k => $v) {
                $item = $itemsArr[$k];
                $id = $item->id;
                $url = $uriManager->detailURI($item);
                $pic = $item->getPicUrl(310);
                $tip = substr($tipArr[$k], 0, 2);
                $price = $item->price;
                $title = $item->title;
                $sale =$item->soldCount;
                $collect = $item->collectedCount;
                $shareConfig = getShareConfig("item",$id,$title);
                $shareStr = "<div class='sns-widget' data-sharebtn=".$shareConfig."></div>";
                echo "<li>".
                          "<div class='pic itempic'>".
                          "<a href='{$url}' style='background-image:url({$pic});' target='_blank'></a>".
                          "</div>".
                          "<div class='detail'>".
                            "<p class='saletip'><em>".$tip."</em></p>".
                            "<h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                            "<div class='price'><i></i>��".$price.".00</div>".
                            "<div class='salenum'>".
                              "<span class='count'><i></i>�������۳���<em>".$sale."</em>��</span><span class='colect'><i></i>�����ղأ�<em>".$collect."</em>��</span>".
                            "</div>".
                            "<div class='info'><span class='itemurl'>".$url."</span><a class='ratebtn' href='#' target='_blank'>�鿴����</a><a class='detailbtn' href='{$url}' target='_blank'>��������</a></div>".
                            $shareStr.
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