<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-waterfall"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-waterfall" style = "height:1200px;position:relative;overflow:hidden;">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //main
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //self value
  $columNum = $tbm_area_show == "950" ? 4 : 5;
  $itemNum = 3; //默认每列取宝贝个数
  $itemWidth = 220; //图片宽度
  $itemsArr = array();
  $picsArr = array();
  for($i=1; $i<=$columNum; $i++){
    $ids = ${'b_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
    $items = $itemManager->queryByIds($ids,'');
    if(!$items){//默认取热销宝贝前3个
      $items = $itemManager ->queryByKeyword(" ","hotsell",$itemNum);
    };
    //自定义图片
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
                "<div class='price'><i></i>￥".$price.".00</div>".
                "<div class='salenum'>".
                  "<span class='count'><i></i>宝贝已售出：<em>".$sale."</em>笔</span><span class='colect'><i></i>人气收藏：<em>".$collect."</em>人</span>".
                "</div>".
              "</div>".
            "</li>";
        }
        echo "</ul>";
      }
    ?>
  </div>
</div>