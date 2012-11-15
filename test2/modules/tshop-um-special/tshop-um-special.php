<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-special"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-special">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $tbm_textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("���⸬","ţ���","����˿","�ݽ���צ");
  $itemsArr = array(
    array("url"=>$globalUrl."/default/special_01.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_02.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_03.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_04.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_05.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_06.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"��ʾ��������", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88)
  );
  $itemSelector = explode(',',$tbm_itemselecter);
  foreach($itemSelector as $k=>$v){
    $item = $itemManager->queryById($v);
    $itemValue = array();
    if($item){
      $itemValue["url"] = $item->getPicUrl(220);
      $itemValue["big"] = $item->getPicUrl(310);
      $itemValue["title"] = $item->title;
      $itemValue["link"] = $uriManager->detailURI($item);
      $itemValue["price"] = $item->price;
      $itemValue["soldCount"] = $item->soldCount;
      $itemValue["collectedCount"] = $item->collectedCount;
      $itemsArr[$k] = $itemValue;
    }
  }
  $tbm_tiptxt = $tbm_tiptxt ? $tbm_tiptxt : "7��";
?>
  <div class="mainbox_hd special_hd">
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
  <div class="special_bd">
    <div class="mall-slide J_TWidget" data-widget-type="Carousel" data-widget-config="{
      'effect': 'scrollx',
              'easing': 'easeOutStrong',
              'steps':1,
              'autoplay': true,
              'viewSize': [354],
              'circular': false
          }">
            <div  class="mall-content" >
                <ul class="ks-switchable-content">
                  <?php
                    foreach ($itemsArr as $k => $v) {
                      $item = $itemsArr[$k];
                      echo "<li>".
                        "<div class='pic'>".
                          "<a href='{$item[link]}' style='background-image:url({$item[big]});' target='_blank'></a>".
                        "</div>".
                        "<div class='detail'>".
                          "<h3><a href='{$item[link]}' target='_blank'>".$item[title]."</a></h3>".
                          "<span class='price'>��".$item[price].".00</span>".
                          "<span class='count'><em>�۳���".$item[soldCount]."</em> |".
                          "<em>�ղأ�".$item[collectedCount]."</em></span>".
                        "</div>".
                      "</li>";
                    }
                  ?>
                </ul>
                <?php
                  if($tbm_tipshow == 1){
                    $tbm_tiptxt = substr($tbm_tiptxt,0,2);
                    echo "<span class='tip {$tbm_tipposition}'>".$tbm_tiptxt."</span>";
                  }
                ?>
              </div>
              <ul class="ks-switchable-nav">
                <?php
                  foreach ($itemsArr as $k => $v) {
                    $item = $itemsArr[$k];
                    $firstClass = $k == 0 ? "ks-active" : "";
                    echo "<li class='{$firstClass}'>".
                      "<div class='thumb'>".
                      "<a href='{$item[link]}' style='background-image:url({$item[url]});' target='_blank'></a>".
                      "</div>".
                      "<span class='price'>��".$item[price].".00</span>".
                      "</li>";
                  }
                ?>
              </ul>
        </div>
    </div>
</div>
