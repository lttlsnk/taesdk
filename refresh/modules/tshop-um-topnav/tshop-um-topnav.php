<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-topnav"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-topnav">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $systemNavTitle = $tbm_systemnavtitle ? explode("|",$tbm_systemnavtitle) : array("店铺交流","关于我们");
  $systemNavLink = $tbm_systemnavlink ? explode("|",$tbm_systemnavlink) : array("#","#");
  $catesLink = 'http://shop'. $shopId .'.taobao.com/?search=y';
  $allShopCategory = $shopCategoryManager->queryAll();
  //self set
  $fontColor = $tbm_fontcolor ? $tbm_fontcolor : "#FFF";
  $bgColorHover = $tbm_bgcolorhover ? $tbm_bgcolorhover : "#FFF";
?>
  <div class="topnav_con">
    <div class="menu">
      <ul>
        <li><a href="<?php echo $shopUrl; ?>">首页</a></li>
        <?php
          if($tbm_catesshow == 1){
            echo '<li class="all_cates"><a href="'.$catesLink.'" target="_blank"><span>全部分类</span><i></i></a></li>';
          }
          if($tbm_catesshow == 1){
            echo '<li><a href="'.$shopRate.'" target="_blank">信用评价</a></li>';
          }
          //三种导航模式
          if($tbm_navmode == 3){//自动导航模式
            /*$shopUrl2 = str_replace('.mall.taobao.com', '.tmall.com', $uriManager->searchURI());
            $index =explode('?',$shopUrl2);
            $links = $shopManager->getShopPageLinks();
            for($i=1; $i<count($links); $i++){
              $link = $links[$i];
              $url = $link->href;
              $text = $link->text;
              if (preg_match('/\/.*(view_page-|pageId=)(\d+)/', $url, $matches)) {
                $url = $index[0].'view_page-'.$matches[2].'.htm';
              }
              echo'<li><a target="_blank" href="'.$url.'">'.$text.'</a></li>';
            }*/
            foreach ($systemNavTitle as $k=> $v) {
              echo '<li><a href="'.$systemNavLink[$k].'" target="_blank">'.$v.'</a></li>';
            }
            echo '</ul>';
          }else{
            if($tbm_navmode == 1){//系统导航
              $curCategory = $allShopCategory;
            }else if($tbm_navmode ==2){//选择分类导航
              $curCategory = array();
              $curSubCategory = array();
              $curCategoryData = $tbm_selectcates;
              $curCategoryData = json_decode($curCategoryData);
              foreach($curCategoryData as $k=>$v){
                $cate = $shopCategoryManager-> queryById ($v->{rid});
                array_push($curCategory, $cate);
                //sub
                if($v->childIds){
                  $sub_cate_data = explode(",",$v->childIds);
                  $sub_cate_arr = array();
                  foreach($sub_cate_data as $subcate){
                    $sub_cate = $shopCategoryManager-> queryById ($subcate);
                    array_push($sub_cate_arr, $sub_cate);
                  }
                  $curSubCategory[$k] = $sub_cate_arr;
                }
              }
            }
            // 一级类目
            foreach($curCategory as $shopCategory){
              //一级类目
              $cate_url  = $uriManager->shopCategoryURI($shopCategory); //
                  $cate_name = $shopCategory->name;
                  $cate_id = $shopCategory->id;
              echo '<li><a href="'.$cate_url.'" class="cate'.$cate_id.'">'.$cate_name.'</a></li>';  
            }
            echo '</ul>';
            //二级类目
            foreach($curCategory as $k => $shopCategory){
              $cate_name = $shopCategory->name;
              $cate_id = $shopCategory->id;
              if($tbm_navmode ==2){
                $subCategories = $curSubCategory[$k];
              }else{
                $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
              }
              if ($subCategories){
                $pop_config = "{
                  'trigger':'.cate".$cate_id."',
                  'align':{
                    'node':'.cate".$cate_id."',
                    'offset':[0,0],
                    'points':['bl','tl']
                  }
                }";
                echo '<div class="J_TWidget cate_sub hidden" data-widget-type="Popup" data-widget-config="'.$pop_config.'">'.
                  '<div class="hd">'.
                  '<a href="'.$cate_url.'" class="cate'.$cate_id.'">'.$cate_name.'</a>'.
                  '</div>'.
                  '<div class="bd"><dl>';
                foreach($subCategories as $subCategory){
                  $sub_cate_url = $uriManager->shopCategoryURI($subCategory);
                  $sub_cate_name = $subCategory->name;
                  echo '<dd><a href="'.$sub_cate_url.'">'.$sub_cate_name.'</a></dd>';
                }
                echo '</dl></div></div>';
              }
            }
          }
        ?>
      <!-- </ul> -->
    </div>
    <!--全部分类弹出层 star-->
    <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
      'trigger':'.all_cates',
      'align':{
        'node':'.all_cates',
        'offset':[10,0],
        'points':['bl','tl']
    }
    }">
      <div class="cates_popup">
        <div class="hd">
          <a href="<?php echo $catesLink; ?>" target="_blank"><span>全部分类</span><i></i></a>
        </div>
        <div class="bd">
          <dl>
            <dt><a href="<?php echo $allProduct; ?>" target="_blank">查看所有宝贝&gt;&gt;</a></dt>
            <dd>
              <a href="<?php echo $allProduct; ?>&orderType=_hotsell" target="_blank">按销量</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=_newOn" target="_blank">按新品</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=price" target="_blank">按价格</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=_hotkeep" target="_blank">按收藏</a>
            </dd>
            <?php
              foreach($allShopCategory as $shopCategory){
                //一级类目
                $cate_url  = $uriManager->shopCategoryURI($shopCategory); //
                    $cate_name = $shopCategory->name;
                echo '<dt><a href="'.$cate_url.'">'.$cate_name.'</a></dt>';
                //二级类目
                $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
                if ($subCategories){
                  echo '<dd>';
                  foreach($subCategories as $subCategory){
                    $sub_cate_url = $uriManager->shopCategoryURI($subCategory);
                    $sub_cate_name = $subCategory->name;
                    echo '<a href="'.$sub_cate_url.'">'.$sub_cate_name.'</a><span>|</span>';
                  }
                  echo '</dd>';
                }
              }
            ?>
          </dl>
        </div>
      </div>
    </div>
    <!--全部分类弹出层 end-->
  </div>
</div>