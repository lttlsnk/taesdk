<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-postarea"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-postarea">
<?php
/**
 * 开始设计PHP页面
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
                                "<div class='price clear'><span class='hd'>售价</span><span class='bd'>￥：<em>".$price."</em><i>".$tip."</i></span></div>".
                                "<div class='count'>已售：<em>".$sale."</em> |  收藏：<em>".$collect."</em></div>".
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