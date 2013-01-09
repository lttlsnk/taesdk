<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-recommendcate"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-recommendcate">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
  $itemNum = 3;
  $itemsArr = array();
  for ($i=1; $i <=4 ; $i++) {
    //类目
    $cate = ${'tbm_cates'.$i};
    if($cate){
      $ids = json_decode($cate);
      $rid=$ids[0]->{rid};
      $childIds = $ids[0]->{childIds};
      if($childIds){//subcate
        $childIds = explode(",", $childIds)[0];
        $cate = $shopCategoryManager-> queryById ($childIds);
      }else{//cate
        $cate = $shopCategoryManager-> queryById ($rid);
      }
    }else{
      $cate = $shopCategoryManager->queryAll()[$i-1];
    }
    $itemsArr['cate'.$i] = $cate;
    $itemsArr['catepic'.$i] = ${'tbm_pic'.$i} ? ${'tbm_pic'.$i} : $globalUrl."/default/recommendcate_".$i.".jpg";
    //宝贝
    $itemids = ${'tbm_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
    if($itemids){
      foreach($itemids as $k=>$v){
        if($k>2){break;}
        $items[$k]=$itemManager->queryById($v);
      }
    }else{
      $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
    }
    $itemsArr['items'.$i] = $items;
  }
?>
  <div class="mainbox_hd recommendcate_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
    <p class="link_list"><a class="first" href="<?=$catesLink; ?>" target="_blank">查看所有宝贝&gt;&gt;</a></p>
  </div>
  <div class="recommendcate_bd clear">
    <span class="whiterect"></span>
    <?php
      for ($i=1; $i <=4 ; $i++) {
        $cateclass = "";
        switch ($i) {
          case 1: $cateclass = "lt"; break;
          case 2: $cateclass = "rt"; break;
          case 3: $cateclass = "lb"; break;
          case 4: $cateclass = "rb"; break;
        }
        $cate = $itemsArr['cate'.$i];
        $catepic = $itemsArr['catepic'.$i];
        $catelink = $uriManager->shopCategoryURI($cate);
        $items = $itemsArr['items'.$i];
        $area = ${'tbm_area'.$i};
        $arealink = ${'tbm_arealink'.$i};
        $tag = explode("|", ${'tbm_tag'.$i});
        //redner
        echo "<div class='item {$cateclass}'>".
          "<div class='pic itempic'><a href='{$catelink}' style='background-image:url({$catepic})' target='_blank'></a></div>".
          "<div class='details'>".
          "<div class='title'><a href='{$catelink}' target='_blank'>".$cate->name."</a></div>".
          "<div class='area'><a href='{$arealink}' target='_blank'><i></i>".$area."</a></div>";
        //tab
        echo "<div class='tag'><i></i>";
        foreach ($tag as $k => $v) {
          $url = "http://shop".$_shop->id.".taobao.com?search=y&keyword=".urlencode($v);
          echo "<a href='{$url}'>".$v."</a>";
        }
        echo "</div>";
        //item
        echo "<div class='itemlist'>";
        foreach ($items as $v) {
          $itempic = $v->getPicUrl(80);
          $itemlink = $uriManager->detailURI($v);
          echo "<a href='{$itemlink}' style='background-image:url({$itempic})' target='_blank'></a>";
        }
        echo "</div>";
        echo "</div>".
          "</div>";
      }
    ?>
  </div>
</div>
