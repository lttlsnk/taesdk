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
  //test data
  // $arr = array(
  // "http://img04.taobaocdn.com/bao/uploaded/i4/T1HC_oXcJkXXX0Bi70_035639.jpg_310x310.jpg",
  // "http://img03.taobaocdn.com/bao/uploaded/i3/T1QYnoXedsXXcokjc1_041606.jpg_220x220.jpg"
  // );


  //
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
          $defPic = $itemsPic[$k];
          $pic = $defPic ? $defPic : $item->getPicUrl($itemWidth);
          $price = $item->price;
          $title = $item->title;
          $sale =$item->soldCount;
          $url = $uriManager->detailURI($item);
          echo "<li>".
              "<div class='pic'><a href='{$url}' target='_blank'><img src='{$pic}' /></a></div>".
              "<div class='info'>".
              "</div>".
            "</li>";
        }
        echo "</ul>";
      }
    ?>
</div>

<!-- <div class="pubu">


<?for ($i=0;$i<4;$i++){
  $ids = explode(',',$_MODULE['idem'.$i]);
  $idem =  $itemManager->queryByIds($ids,''); 

  if(count($idem)<=0) {
  $idem = $itemManager->queryByKeyword ("","hotsell",3); 
  }
  $zdtu = explode('|',$_MODULE['zdtu'.$i]); 
?> 


  <ul class="<?if($i == 3) echo 'end'  ?> " style="display:none;">
  
    <?for ($c=0;$c<count($idem);$c++){ ?>
  
    <li>
      <h4>
          <a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?> " target="_blank" style="display:block;">
            <img style = "float:left;display:block;width:210px;" src = "<?if($zdtu[$c]) echo $zdtu[$c] else echo $arr[0]  ?> "/>
                </a>      
      
      </h4>
      

      
      <h3>
        <span>
        
            <a href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $idem[$c]->id; ?>&itemtype=1&scjjc=1">
                <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_sc.jpg">
          </a>
          
          <a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?>">
          
              <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_gm.jpg">
          </a>
          
          
        </span>
        <strong>￥:<?if($idem[$c]) echo $idem[$c]->price else echo '200'  ?> </strong>
        已售<? if($idem[$c]) echo $idem[$c]->soldCount else echo '300' ?> 件
        
        
      </h3>
      
      
      
    </li>
    
    
    <? }?> 
  
  </ul>

  
<?}?> 
   -->
  
  
  
</div>
