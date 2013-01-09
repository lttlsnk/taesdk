<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-systempie"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-systempie">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $moduleWidth = "w".$regionWidth;
  $tbm_textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("猪肉脯","牛肉干","鱿鱼丝","泡椒凤爪");
    //宝贝
    $itemNum = $tbm_itemnum ? round($tbm_itemnum/3)*3 : 6;
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
  <div class="systempie <?php echo $moduleWidth;?>">
    <div class="mainbox_hd systempie_hd">
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
    <div class="systempie_bd mainbox clear">
    <?php
      //item
      foreach ($items as $item) {
        $picWidth = $regionWidth == 950 ? 310 : 220;
        $pic = $item->getPicUrl($picWidth);
                $price = $item->price;
                $title = $item->title;
                $sale =$item->soldCount;
                $url = $uriManager->detailURI($item);
                
                echo "<div class='item'>".
                  "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                  "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                  "<div class='price'><span>￥".$price.".00</span><i></i></div>".
                  "<div class='sale'>最近30天售出<em>".$sale."</em>件</div>".
                  "</div>";
      }
    ?>
    </div>
  </div>
</div>
