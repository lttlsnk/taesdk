<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-hotsell"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-hotsell">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
    //self value
    $tipArr = array("折扣","折扣","折扣","折扣","折扣","折扣","折扣","折扣","折扣");
    $tipArr = $tbm_tip ? array_merge(explode("|", $tbm_tip), $tipArr) : $tipArr;
    //宝贝
    $itemNum = 9;
    if($tbm_resources == 1){//按类目自动获取
      if($tbm_cate){
        $ids=json_decode($cates);
        $rid=$ids[0]->{rid};
        $itemsArr=$itemManager-> queryByCategory ($rid,$tbm_orders,$itemNum);
      }
    }elseif ($tbm_resources == 2) {//手动选择
      $ids = $tbm_item ? explode(',',$tbm_item) : NULL;
      if($ids){
        foreach($ids as $k=>$v){
          $itemsArr[$k]=$itemManager->queryById($v);
        }
      }
    }elseif ($tbm_resources == 3) {//按关键字获取
      $ids = $tbm_keyword;
      $itemsArr = $itemManager->queryByKeyword($ids,$tbm_orders,$itemNum);
    }
    //默认取热销宝贝
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
      <a title="上一页" href="#" class="hotsell-prev"><i></i></a>
      <a title="下一页" href="#" class="hotsell-next"><i></i></a>
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
                            "<div class='price'><i></i>￥".$price.".00</div>".
                            "<div class='salenum'>".
                              "<span class='count'><i></i>宝贝已售出：<em>".$sale."</em>笔</span><span class='colect'><i></i>人气收藏：<em>".$collect."</em>人</span>".
                            "</div>".
                            "<div class='info'><span class='itemurl'>".$url."</span><a class='ratebtn' href='#' target='_blank'>查看好评</a><a class='detailbtn' href='{$url}' target='_blank'>宝贝详情</a></div>".
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