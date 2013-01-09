<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-categories"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-categories">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $searchUrl = $uriManager->searchURI();
  $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
  //分类数据
  $cateArr = array();
  if($tbm_catedata == 1){//手动填写
    for($i=1; $i<=6; $i++){
      $title = ${'tbm_cate'.$i.'_title'};
      if($title){
        $link = ${'tbm_cate'.$i.'_link'};
        $cateArr['title'.$i] = $title;
        $cateArr['link'.$i] = $link;
        //sub
        $cateArr['subtitle'.$i] = explode("|", ${'tbm_cate'.$i.'_sub'});
        $cateArr['sublink'.$i] = explode("|", ${'tbm_cate'.$i.'_sublink'});
        $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
      }
    }
  }elseif ($tbm_catedata == 2) {//自动获取
    $allCategory = $shopCategoryManager->queryAll();
    foreach ($allCategory as $k => $cate) {
      $i = $k + 1;
      $cateArr['title'.$i] = $cate->name;
      $cateArr['link'.$i] = $uriManager->shopCategoryURI($cate);
      //sub
      $subCategories = $shopCategoryManager-> querySubCategories($cate->id);
      foreach ($subCategories as $subKey => $subValue) {
        $cateArr['subtitle'.$i][$subKey] = $subValue->name;
        $cateArr['sublink'.$i][$subKey] = $uriManager->shopCategoryURI($subValue);
      }
      $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
    }
  }elseif ($tbm_catedata == 3) {//手动选择
    $selectCategory = json_decode($tbm_cateselect);
    foreach ($selectCategory as $k => $v) {
      $i = $k + 1;
      $cate = $shopCategoryManager-> queryById ($v->{rid});
      $cateArr['title'.$i] = $cate->name;
      $cateArr['link'.$i] = $uriManager->shopCategoryURI($cate);
      //sub
      $subCategories = explode(",",$v->childIds);
      foreach ($subCategories as $subKey => $subValue) {
        $sub_cate = $shopCategoryManager-> queryById ($subValue);
        $cateArr['subtitle'.$i][$subKey] = $sub_cate->name;
        $cateArr['sublink'.$i][$subKey] = $uriManager->shopCategoryURI($sub_cate);
      }
      $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
    }
  }
?>
  <div class="mainbox_hd categories_hd">
    <h3><?=$tbm_moduletitle; ?></h3>
    <p class="link_list">
      <a href="<?php echo $catesLink; ?>" target="_blank">查看所有分类&gt;&gt;</a>
      <a href="<?php echo $searchUrl; ?>&orderType=_hotsell" target="_blank">按销量</a>
          <a href="<?php echo $searchUrl; ?>&orderType=_newOn" target="_blank">按新品</a>
          <a href="<?php echo $searchUrl; ?>&orderType=price" target="_blank">按价格</a>
          <a href="<?php echo $searchUrl; ?>&orderType=_hotkeep" target="_blank">按收藏</a>
    </p>
  </div>
  <div class="categories_bd clear">
      <dl>
        <?php
          $len = count($cateArr)/5;
          for($i=1; $i<=$len; $i++){
            $title = $cateArr['title'.$i];
            if($title){
              $link = $cateArr['link'.$i];
              echo "<dt><a href='{$link}' target='_blank'>".$title."</a></dt>";

              //sub
              echo "<dd>";
              $sub = $cateArr['subtitle'.$i];
              foreach ($sub as $k => $v) {
                $sub_title = $cateArr['subtitle'.$i][$k];
                $sub_link = $cateArr['sublink'.$i][$k];
                $sub_class = "hot_".$cateArr['subhot'.$i][$k];
                $sub_divide = $k == (count($sub)-1) ? "" :"  |";
                echo "<a class='{$sub_class}' href='{$sub_link}' target='_blank'>".$sub_title."</a>".$sub_divide;
              }
              echo "</dd>";
            }
          }
        ?>
      </dl>
    </div>
</div>