<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-special"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-special">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $tbm_textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("猪肉脯","牛肉干","鱿鱼丝","泡椒凤爪");
  $itemsArr = array(
    array("url"=>$globalUrl."/default/special_01.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_02.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_03.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_04.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_05.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88),
    array("url"=>$globalUrl."/default/special_06.jpg", "big"=>$globalUrl."/default/special_big.jpg", "title"=>"显示宝贝标题", "link"=>$shopUrl, "price"=>256, "soldCount"=>100, "collectedCount"=>88)
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
  $tbm_tiptxt = $tbm_tiptxt ? $tbm_tiptxt : "7折";
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
                          "<span class='price'>￥".$item[price].".00</span>".
                          "<span class='count'><em>售出：".$item[soldCount]."</em> |".
                          "<em>收藏：".$item[collectedCount]."</em></span>".
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
                      "<span class='price'>￥".$item[price].".00</span>".
                      "</li>";
                  }
                ?>
              </ul>
        </div>
    </div>
</div>
