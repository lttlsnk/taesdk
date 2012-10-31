<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-zoom"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-zoom">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
    $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
    $popRandom = rand(10000,20000);
    //宝贝
    $itemGroup = $tbm_itemgroup;
    $itemRow = $tbm_modulewidth == "w750" ? 4 : 5;
    $itemNum = $itemRow*$itemGroup;
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

  <div class="zoom <?php echo $tbm_modulewidth;?>">
    <div class="mainbox_hd zoom_hd">
      <h3><?php echo $tbm_moduletitle; ?></h3>
      <p class="link_list"><a class="first" href="<?php echo $tbm_moduletxtlink; ?>" target="_blank"><?php echo $tbm_moduletxt;?></a></p>
    </div>
    <div class="zoom_bd">
      <div class="zoom_list clear">
        <ul>
          <?php
            foreach ($items as $k => $v) {
              $item = $v;
              $pic = $item->getPicUrl(160);
                      $url = $uriManager->detailURI($item);
                      echo "<li class='itempic {$popRandom}item{$k}'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></li>";
            }
          ?>
        </ul>
      </div>
      <div class="zoom_popup">
        <?php
          foreach ($items as $k => $v) {
            $item = $v;
            $pic = $item->getPicUrl(310);
            $price = $item->price;
            $title = $item->title;
            $url = $uriManager->detailURI($item);
            $points = '["cc","cc"]';
            $config = '{
              "trigger":".'.$popRandom.'item'.$k.'",
              "align":{
                "node":".'.$popRandom.'item'.$k.'",
                "offset":[0,0],
                "points":'.$points.'
              }
            }';
            //set points 先行后列判断
            if(floor($k%$itemRow)==0){
              switch ($k%$itemGroup) {
                case 0:  $points=["tl","tl"]; break;
                case ($itemGroup-1): $points=["tr","tr"]; break;
                default: $points=["tc","tc"]; break;
              }
            }
            $shareStr = "<div class='share'></div>";
            $shareStr = $tbm_itemshare == 2 ? "" : $shareStr;
                    echo "<div class='J_TWidget hidden' data-widget-type='Popup' data-widget-config='{$config}'>".
                        "<div class='popup_item'>".
                          "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                          "<div class='detail'>".
                            "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                            "<div class='price itemprice'><span>￥".$price.".00</span><i></i></div>".
                            $shareStr.
                          "</div>".
                        "</div>".
                      "</div>";
          }
        ?>
      </div>
    </div>
  </div>




</div>
