<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-waterfall"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-waterfall" style = "height:1200px;position:relative;overflow:hidden;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //main
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //self value
  $columNum = $tbm_area_show == "950" ? 4 : 5;
  $itemNum = 3; //Ĭ��ÿ��ȡ��������
  $itemWidth = 220; //ͼƬ���
  $itemsArr = array();
  $picsArr = array();
  for($i=1; $i<=$columNum; $i++){
    $ids = ${'b_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
    $items = $itemManager->queryByIds($ids,'');
    if(!$items){//Ĭ��ȡ��������ǰ3��
      $items = $itemManager ->queryByKeyword(" ","hotsell",$itemNum);
    };
    //�Զ���ͼƬ
    $picsArr[$i] = explode("|", ${'tbm_pic'.$i});
    $itemsArr[$i] = $items;
  }
?>

<div class="hd">
  <h3><?=$tbm_title_name?></h3>
  <p class="link_list"><a href="<?=$tbm_title_morelink?>" target="_blank"><?=$tbm_title_more?></a></p>
</div>
<div class="bd">
    <?php
      foreach ($itemsArr as $k => $v) {
        $items = $v;
        $itemsPic = $picsArr[$k];;
        $endClass = $k == $columNum ? "end" : "";
        //render
        echo "<ul class=".$endClass.">";
        //items
        foreach ($items as $k => $v) {
          $item = $v;
          $url = $uriManager->detailURI($item);
          $defPic = $itemsPic[$k];
          $pic = $defPic ? $defPic : $item->getPicUrl($itemWidth);
          $price = $item->price;
          $title = $item->title;
          $sale =$item->soldCount;
          $collect = $item->collectedCount;
          echo "<li>".
              "<div class='pic'><a href='{$url}' target='_blank'><img src='{$pic}' /></a></div>".
              "<div class='detail'>".
                "<div class='price'><i></i>��".$price.".00</div>".
                "<div class='salenum'>".
                  "<span class='count'><i></i>�������۳���<em>".$sale."</em>��</span><span class='colect'><i></i>�����ղأ�<em>".$collect."</em>��</span>".
                "</div>".
              "</div>".
            "</li>";
        }
        echo "</ul>";
      }
    ?>
  </div>
</div>