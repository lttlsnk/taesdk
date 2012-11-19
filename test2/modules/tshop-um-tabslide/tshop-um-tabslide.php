<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-tabslide"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-tabslide">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $itemNum = 4;
  $tabWidth = floor(950/$tbm_tabnum);
  $titleArr = array();
  $itemsArr = array();
  for ($i=1; $i<=$tbm_tabnum ; $i++) {
    //title
    $titleArr[$i] = ${'tbm_biaoti'.$i};
    //items
    $resources = ${'tbm_resources'.$i};
    $order = ${'tbm_order'.$i};
    $items = array();
    if($resources == 1){//按类目自动获取
      $cate = ${'tbm_cates'.$i};
      if($cate){
        $ids=json_decode($cates);
        $rid=$ids[0]->{rid};
        $items=$itemManager-> queryByCategory ($rid,$orders,$itemNum);
      }
    }elseif ($resources == 2) {//手动选择
      $ids = ${'tbm_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
      if($ids){
        foreach($ids as $k=>$v){
          $items[$k]=$itemManager->queryById($v);
        }
      }
    }elseif ($resources == 3) {//按关键字获取
      $ids = ${'tbm_keyword'.$i};
      $items = $itemManager->queryByKeyword($ids,$orders,$itemNum);
    }
    //默认取热销宝贝
    if(!$items){
      $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
    }
    $itemsArr[$i] = $items;
  }
?>

  <div class="J_TWidget" data-widget-type="Tabs"  data-widget-config="{
      'effect':'scrollx',
      'viewSize': 970
    }">
    <ul class="ks-switchable-nav">
      <?php
        foreach ($titleArr as $k => $v) {
          $first = $k==1 ? "class='ks-active'" : "";
          echo "<li {$first} style='width:{$tabWidth}px;'>".$v."</li>";
        }
      ?>
    </ul>
    <div class="content_con">
      <div class="ks-switchable-content mainbox">
        <?php
          foreach ($itemsArr as $k => $v) {
            $show = $k != 1 ? "style='display:none;'" : "";
            echo "<div class='items' {$show}>";
            //item
            $items = $itemsArr[$k];
            foreach ($items as $item) {
              $pic = $item->getPicUrl(220);
                      $price = $item->price;
                      $title = $item->title;
                      $sale =$item->soldCount;
                      $url = $uriManager->detailURI($item);
                      $shareStr = "";
                      $shareStr = $tbm_itemshare == 2 ? "" : $shareStr;
                      
                      echo "<div class='item'>".
                        "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                        "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                        "<div class='price'><span>￥".$price.".00</span><i></i></div>".
                        "<div class='sale'>最近30天售出<em>".$sale."</em>件</div>".
                        $shareStr.
                        "</div>";
            }
            echo "</div>";
          }
        ?>
      </div>
    </div>
  </div>
</div>