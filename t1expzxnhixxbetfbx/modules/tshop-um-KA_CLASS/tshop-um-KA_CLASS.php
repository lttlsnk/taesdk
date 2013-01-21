

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_CLASS"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
?>
<div class="tb-module tshop-um tshop-um-KA_CLASS">

	<div class="a_hd"><?php echo $_MODULE['class_title'];?></div>
    
    
    
<div class="J_TWidget a_class"  data-widget-type="Accordion"  data-widget-config="{
             'triggerType': 'click',
             'multiple':true,
             'triggerCls':'a_title',
             'panelCls':'a_c'
             }">
             <div class="a_title"><i></i><a class="a_cl" href="<?php echo $uriManager->searchURI();?>" target="<? echo $_MODULE['target']?>">查看全部分类&raquo;</a></div>
             <div class="a_c clearfix">
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_hotsell" target="<? echo $_MODULE['target']?>">按销量</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_newOn" target="<? echo $_MODULE['target']?>">按新品</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=price" target="<? echo $_MODULE['target']?>">按价格</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_hotkeep" target="<? echo $_MODULE['target']?>">按收藏</a>
             </div>
          <?php
		  		$allShopCategory  = $shopCategoryManager->queryAll();
		  		foreach($allShopCategory as $shopCategory){
		  ?>
             <div class="a_title"><i></i><a href="<?php echo $uriManager->shopCategoryURI ($shopCategory);?>" target="<?php echo $_MODULE['targe'];?>"><?php echo $shopCategory->name;?></a></div>
             <div class="a_c clearfix">
			 <?php
              $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
			 	foreach($subCategories as $shopCategory){
			 ?>
                 <a class="a_cb" href="<?php echo $uriManager->shopCategoryURI ($shopCategory);?>" target="<?php echo $_MODUL['target']?>"><?php echo $shopCategory->name;?></a>
             <?php
             }
			 ?>
             </div>
            <?php
            }
			?> 
</div>
</div>
<?php
/********************************************
 * 版  本：SA.1.0                           *
 * 时  间：2012.10.17 PM                    *
 * 作  者：Allen                            *
 * 旺  铺：http://xjcqc.taobao.com          *
 * 联系QQ：584643662（希望能与您为朋友！）  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>