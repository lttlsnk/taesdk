<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-accordion"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-accordion">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  //宝贝
    $itemNum = $tbm_itemnum ? $tbm_itemnum : 10;
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
  <div class="mainbox190_hd accordion_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
  </div>
  <div class="mainbox190_bd accordion_bd">
    <div class="J_TWidget accordion-content section" data-widget-type="Accordion" data-widget-config="{'triggerType':'mouse'}">
      <?php
        foreach ($items as $key => $item) {
          $firstClass = $key == 0 ? "ks-active" : "";
          $lastClass = $key == count($items)-1 ? "last" : "";
          $otherStyle = $key != 0 ? "display:none;" : "";
          $num = $key + 1;
          $picWidth = 80;
          $pic = $item->getPicUrl($picWidth);
                  $price = $item->price;
                  $title = $item->title;
                  $url = $uriManager->detailURI($item);
                  echo "<div class='ks-switchable-trigger clear {$firstClass} {$lastClass}'>".
                      "<i>".$num."</i><h3><a href='{$url}' target='_blank'>".$title."</a></h3>".
                    "</div>".
                    "<div class='ks-switchable-panel clear {$lastClass}' style='{$otherStyle}'>".
                      "<div class='pic itempic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                      "<div class='detail'>".
                        "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                        "<div class='price'>￥ ".$price."</div>".
                        "<div class='buy'><a href='{$url}' target='_blank'>购买</a></div>".
                      "</div>".
                    "</div>";
        }
      ?>
    </div>
  </div>
</div>