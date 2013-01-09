<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-stararea"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-stararea">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $moduleWidth = "w".$regionWidth;
  $tbm_textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("韩国小零食","饼干");
  $tip = $tbm_tip ? substr($tbm_tip, 0, 2) : "热卖";
  $popRandom = rand(20000,30000);
  //宝贝
  $itemNum = $regionWidth == "950" ? $tbm_itemgroup*4 : $tbm_itemgroup*3;
  if($tbm_resources == 1){//按类目自动获取
    if($tbm_cate){
      $ids=json_decode($cates);
      $rid=$ids[0]->{rid};
      $items=$itemManager-> queryByCategory ($rid,$tbm_orders,$itemNum);
    }
  }elseif ($tbm_resources == 2) {//手动选择
    $ids = $tbm_item ? explode(',',$tbm_item) : NULL;
    if($ids){
      foreach($ids as $k=>$v){
        $items[$k]=$itemManager->queryById($v);
      }
    }
  }elseif ($tbm_resources == 3) {//按关键字获取
    $ids = $tbm_keyword;
    $items = $itemManager->queryByKeyword($ids,$tbm_orders,$itemNum);
  }
  //默认取热销宝贝
  if(!$items){
    $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
  }
?>
  <div class="stararea <?php echo $moduleWidth;?>">
    <div class="mainbox_hd stararea_hd">
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
    <div class="stararea_bd clear">
      <div class="stararea_list clear">
      <?php
        //item
        foreach ($items as $k => $item) {
          $picWidth = $tbm_modulewidth == "w950" ? 220 : 310;
          $pic = $item->getPicUrl($picWidth);
                  $price = $item->price;
                  $title = $item->title;
                  $url = $uriManager->detailURI($item);
                  
                  echo "<div class='item'>".
                      "<div class='pic {$popRandom}itempic{$k}'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                      "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                      "<div class='tip'>".$tip."</div>".
                    "</div>";
        }
      ?>
      </div>
      <div class="stararea_popup">
        <?php
          foreach ($items as $k => $v) {
            $item = $v;
                    $price = $item->price;
                    $sold =$item->soldCount;
                    $config = '{
                      "trigger":".'.$popRandom.'itempic'.$k.'",
                      "align":{
                        "node":".'.$popRandom.'itempic'.$k.'",
                        "offset":[0,0],
                        "points":["bc","bc"]
                      }
                    }';
                 echo "<div class='J_TWidget hidden' data-widget-type='Popup' data-widget-config='{$config}' style='visibility: hidden; position: absolute;'>".
                        "<div class='popup_item'>". 
                        "<span class='price'>￥<em>".$price."</em></span>".
                        "<span class='sold'>已售出：<em>".$sold."</em></span>".
                      "</div>".
                  "</div>";
                }
            ?>
      </div>
    </div>
  </div>
</div>