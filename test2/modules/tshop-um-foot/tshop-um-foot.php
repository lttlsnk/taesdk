<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-foot"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-foot">
<?php
/**
 * 开始设计PHP页面
 */
?>
<!-- <div class="skin-box">
  <div class="skin-box-hd">
    <h3><span>士大夫士大夫</span></h3>
    <p class="title">这是测试标题</p>
  </div>
</div> -->
<div class="ft-nav">
  <div class="ft-nav-con">
    <ul>
      <li><a href="<?php echo $shopUrl ?>">返回首页</a> | </li>
      <li><a href="<?php echo $uriManager->searchURI(); ?>">所有宝贝</a> | </li>
      <li><a href="<?php echo $uriManager->rateURI(); ?>">信用评价</a> | </li>
      <li><a href="<?php echo $uriManager->shopIntrURI(); ?>">关于我们</a> | </li>
      <li><a href="<?php echo $uriManager->favoriteLink(); ?>">收藏本店</a> | </li>
      <li><a href="#top">返回顶部</a></li>
    </ul>
  </div>
</div>


</div>
