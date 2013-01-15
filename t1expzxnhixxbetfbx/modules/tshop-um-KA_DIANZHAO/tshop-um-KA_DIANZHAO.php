

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_DIANZHAO"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */


 $style = "text-decoration:$_MODULE[str_x]; color:$_MODULE[str_color]; font-size:$_MODULE[str_size]; font-weight:$_MODULE[str_weight]";
 /***********左文字***********/
 $_MODULE['dianzhao_left']=="" ? $dianzhao_left = NULL:$dianzhao_left=$_MODULE['dianzhao_left'];
 $_MODULE['dianzhao_left_href']=="" ? $dianzhao_left_href = NULL:$dianzhao_left_href=$_MODULE['dianzhao_left_href'];
 $dianzhao_left = explode("|", $dianzhao_left);
 $dianzhao_left_href = explode("|",$dianzhao_left_href);
 $len_left = count($dianzhao_left);
 $i=0;
 
 foreach($dianzhao_left as $val_left)
 {
	 $i++;
	 if($i<$len_left)
	 {
		 $str = '&nbsp;'.$_MODULE['str'].'&nbsp;';
	 }else{
		 $str = NULL;
		}
	$dianzhao_left_html .= "<a style=\"".$style."\" href=\"".$dianzhao_left_href[$i-1]."\" target=\"".$_MODULE['target']."\" title=\"".$val_left."\">".$val_left.$str."</a>"; 
 }
 /***********右文字***********/
 $_MODULE['dianzhao_right']=="" ? $dianzhao_right = NULL:$dianzhao_right=$_MODULE['dianzhao_right'];
 $_MODULE['dianzhao_right_href']=="" ? $dianzhao_right_href = NULL:$dianzhao_right_href=$_MODULE['dianzhao_right_href'];
 $dianzhao_right = explode("|", $dianzhao_right);
 $dianzhao_right_href = explode("|",$dianzhao_right_href);
 $len_right = count($dianzhao_right);
 $j=0;
 foreach($dianzhao_right as $val_right)
 {
	 $j++;
	 if($j<$len_right)
	 {
		 $str = '&nbsp;&nbsp;'.$_MODULE['str'].'&nbsp;&nbsp;';
	 }else{
		 $str = NULL; 
	 }
	$dianzhao_right_html .= "<a style=\"".$style."\" href=\"".$dianzhao_right_href[$j-1]."\" target=\"".$_MODULE['target']."\" title=\"".$val_right."\">".$str.$val_right."</a>"; 
 }
 $background = "background:url($_MODULE[dianzhao_center]) $_MODULE[alignment] $_MODULE[repeat]";
?>
<div class="tb-module tshop-um tshop-um-KA_DIANZHAO">
	<div class="dianzhao_left">
        <?php echo $dianzhao_left_html;?>
    </div>
    <div class="dianzhao_center" style="<?php echo $background;?>"></div>
    <div class="dianzhao_right">
        <?php echo $dianzhao_right_html;?>
    </div>
</div>
<?php
/********************************************
 * 版  本：SA.1.0                           *
 * 时  间：2012.10.13 PM                    *
 * 作  者：Allen                            *
 * 旺  铺：http://xjcqc.taobao.com          *
 * 联系QQ：584643662（希望能与您为朋友！）  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>