

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_KEFU"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
 $qian = explode("|",$_MODULE['qian']);
 
 $hou = explode("|",$_MODULE['hou']);
 
 $qian_id = explode("|",$_MODULE['qian_id']);
 
 $hou_id = explode("|",$_MODULE['hou_id']);
?>
<div class="tb-module tshop-um tshop-um-KA_KEFU">
	<div class="title"><img src="assets/images/wangwang2.gif" /></div>
    <div class="shouqian">
        	<div class="shouqian_title"><?php echo $_MODULE['qian_title'];?></div>
            <?php 
			foreach($qian as $key => $val){
			?>
			<div class="shouqian_k">
            <?php echo $uriManager->supportTag($qian_id[$key]);echo $val;?>
            </div>
            <?php
            }
			?>
    </div>
    <div class="shouhou">
        	<div class="shouhou_title"><?php echo $_MODULE['hou_title'];?></div>
            <?php 
			foreach($hou as $key => $val){
			?>
			<div class="shouhou_k">
            <?php echo $uriManager->supportTag($hou_id[$key]);echo $val;?>
            </div>
            <?php
            }
			?>
    </div>
    <div class="yingye">
		<span class="s"><a href="<?php echo $uriManager->favoriteLink();?>" target="<?php echo $_MODULE['target'];?>"></a></span>
		<span class="y"><?php echo $_MODULE['yingye'];?></span>
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