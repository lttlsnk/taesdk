<?php
/**
 内容规则：
 1.必须满足模块内容规则
 2.该文件用作模块之间共享函数的定义，并最终将合并至设计师模块php页面
 */
?>
<?php
/**
 * 开始书写模块共享函数
 */
  //main vars
  $globalUrl = "../../assets/images";
  $pageLinks =$shopManager->getShopPageLinks();
  //shop
  $shopUrl = $pageLinks[0]->href;   //店铺连接
  $shopId = $_shop->id;   //店铺ID
  $shopTitle = $_shop->title;   //店铺标题
  $shopIntr = $uriManager->shopIntrURI();   //店铺介绍
  $shopFavorite = $uriManager->favoriteLink();  //店铺收藏
  $shopRate = $uriManager->rateURI();   //店铺评价
  //item
  $allProduct = $uriManager->searchURI();   //所有宝贝
  //user
  $userNick=$_user->nick;   //店主昵称
?>