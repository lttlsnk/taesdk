<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-postarea"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-postarea">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
  $areaNum = $tbm_tabgroup*2;
  $itemNum = 3;
  $itemsArr = array();
  for ($i=1; $i<=$areaNum ; $i++) {
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
  <div class="mainbox_hd postarea_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
    <p class="link_list"><a class="first" href="<?php echo $tbm_moduletxtlink; ?>" target="_blank"><?php echo $tbm_moduletxt;?></a></p>
  </div>
  <div class="postarea_bd">
    <?php
      foreach ($itemsArr as $k => $v) {
        $items = $itemsArr[$k];
        $tip = ${'b_tip'.$k};
                $config = '{
                  "effect": "scrollx",
                  "easing": "easeOutStrong",
                  "steps":1,
                  "autoplay": false,
                  "viewSize": [465] 
                }';

          $shareConfig = getShareConfig("item",$id,$title);
          $shareStr = "<div class='sns-widget' data-sharebtn=".$shareConfig."></div>";
                echo "<div class='items clear'>".
                    "<div class='mall-slide J_TWidget' data-widget-type='Carousel' data-widget-config='{$config}'>".
                      "<div class='mall-content'>".
                        "<ul class='ks-switchable-content'>";
                        foreach ($items as $key => $value) {
                          $item = $value;
                          $url = $uriManager->detailURI($item);
                    $pic = $item->getPicUrl(220);
                          $price = $item->price;
                          $title = $item->title;
                          $sale =$item->soldCount;
                          $collect = $item->collectedCount;
                          echo "<li>".
                              "<div class='pic itempic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                              "<div class='detail'>".
                                "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                                "<div class='price clear'><span class='hd'>�ۼ�</span><span class='bd'>����<em>".$price."</em><i>".$tip."</i></span></div>".
                                "<div class='count'>���ۣ�<em>".$sale."</em> |  �ղأ�<em>".$collect."</em></div>".
                                $shareStr.
                              "</div>".
                            "</li>";
                        }
                echo      "</ul>".
                      "</div>".
                      "<ul class='ks-switchable-nav clear'>";
                      foreach ($items as $key => $value) {
                        $item = $value;
                        $url = $uriManager->detailURI($item);
                        $pic = $item->getPicUrl(120);
                        $firstClass = $key == 0 ? "ks-active" : "";
                        echo "<li class='{$firstClass} itempic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></li>";
                            }
                        echo  "</ul>".
                          "</div>".
                        "</div>";
      }
    ?>
  </div> 
</div>