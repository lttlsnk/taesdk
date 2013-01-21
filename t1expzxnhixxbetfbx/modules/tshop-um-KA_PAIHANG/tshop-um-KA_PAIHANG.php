

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_PAIHANG"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
 
 
	$ids=explode(",",$_MODULE['m_item']);
	
	$item = $itemManager->queryByIds($ids,$_MODULE['m_paixu']);


?>
<div class="tb-module tshop-um tshop-um-KA_PAIHANG clearfix">


    	<div class="a_hd">宝贝排行膀</div>
    	
        
        <?php
        	foreach($item as $val){
		?>
        <div class="a_baobei">
        	<a class="a_img" href="http://item.taobao.com/item.htm?id=<?php echo $val->id;?>" target="<?php echo $_MODULE['target'];?>" style="background:url(<?php echo $val->getPicUrl(80);?>) 0 0 no-repeat"></a>
            <div class="a_info">
            	<a class="a_title"  href="http://item.taobao.com/item.htm?id=<?php echo $val->id;?>" target="<?php echo $_MODULE['target'];?>" title=""><?php echo $val->title;?></a>
                <div class="a_price">价格：<b><?php echo $val->price;?></b></div>
                <div class="a_sold">售出：<b><?php echo $val->soldCount;?></b></div>
            </div>
        </div>
        <?php
			}
		?>
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