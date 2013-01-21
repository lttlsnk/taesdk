

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_BOTTOM"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
 $b_title = explode("|",$_MODULE['b_title']);
 
  $b_href = explode("|",$_MODULE['b_href']);
 
 
  $k_id = explode("|",$_MODULE['k_id']);
  $k_title = explode("|",$_MODULE['k_title']);
?>
<div class="tb-module tshop-um tshop-um-KA_BOTTOM">
	
    <div class="b_title">
    	<?php
        	foreach($b_title as $key => $val){
		?>
    	<a target="_blank" href="<?php echo $b_href[$key];?>"><?php echo $val;?></a>
        <?php
			}
		?>
    </div>
    <div class="b_list">
    	<div class="b_r"><a href="<?php echo $_MODULE['b_r_href'];?>" target="_blank"><?php echo $_MODULE['b_r'];?></a></div>
    	<div class="b_x"><a href="<?php echo $_MODULE['b_x_href'];?>" target="_blank"><?php echo $_MODULE['b_x'];?></a></div>
    	<div class="b_k"><a href="<?php echo $_MODULE['b_k_href'];?>" target="_blank"><?php echo $_MODULE['b_k'];?></a></div>
        <div class="b_h">
        	<?php
            	for($i=0;$i<4;$i++){
			?>
            <div class="b_hh"> <?php echo $uriManager->supportTag($k_id[$i]).$k_title[$i];?></div>
            <?php
				}
			?>
        </div>
    </div>
</div>

<?php
/********************************************
 * 版  本：SA.1.0                           *
 * 时  间：2012.10.16 PM                    *
 * 作  者：Allen                            *
 * 旺  铺：http://xjcqc.taobao.com          *
 * 联系QQ：584643662（希望能与您为朋友！）  *
 * T E L: 18623601682                       *
 ********************************************/ 
?>