<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-mainrecommend"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-mainrecommend">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $textlink = $tbm_textlink ? explode("|", $tbm_textlink) : array("关键词1","关键词2","关键词3","关键词4");
  //宝贝
  $itemNum = 7;
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
        $k;
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
?>
  <div class="mainbox_hd mainrecommend_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
    <p class="link_list">
        <?php
          foreach ($textlink as $key => $value) {
            $firstClass = $key == 0 ? "first" : "";
            $url = "http://shop".$_shop->id.".taobao.com?search=y&keyword=".urlencode($value);
            echo "<a href='{$url}' class='{$firstClass}'>".$value."</a>";
          }
        ?>
      </p>
  </div>
  <div class="mainrecommend_bd">
    <div class="toppic <?php echo $tbm_floatpos; ?>">
      <?php
        $item = $itemsArr[0];
        $id = $item->id;
        $pic = $item->getPicUrl(480);
        $price = $item->price;
        $price = round($price*100)/100;
        $title = $item->title;
        $sale =$item->soldCount;
        echo "<div class='pic itempic'>".
                "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                   "<span class='mask'></span>".
                   "<h3>".$title."</h3>".
                  "<span class='price'><em>￥  ".$price."</em>.00</span>".
                "</a>".
              "</div>";
      ?>
    </div>
    <div class="items <?php echo $tbm_floatpos; ?>">
      <ul>
        <?php
          for($i=1; $i<$itemNum; $i++){
            $row = floor(($i-1)/3);
            $item = $itemsArr[$i];
            $id = $item->id;
            $pic = $item->getPicUrl(210);
            $price = $item->price;
            $price = round($price*100)/100;
            $title = $item->title;
            $sale =$item->soldCount;
            echo "<li class='row{$row}'>".
                      "<div class='pic itempic'>".
                      "<a href='{$url}' style='background-image:url({$pic});' target='_blank'>".
                        "<h3>".$title."</h3>".
                        "<span class='mask'></span>".
                      "</a>".
                      "</div>".
                      "<div class='price'><span>￥".$price.".00</span><a href='{$url}' target='_blank'></a></div>".
                    "</li>";
          }
        ?>
      </ul>
    </div>
  </div>
</div>
