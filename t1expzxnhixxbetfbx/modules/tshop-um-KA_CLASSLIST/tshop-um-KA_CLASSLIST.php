

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_CLASSLIST"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 function isval($value)
 {
	 return $value == "" ? $val=NULL:$val=$value;
 }
 function explodeObj($arr)
 {
	 return explode("@@",$arr);
 }
 
 $announcement = explodeObj(isval($_MODULE['announcement']));
 $announcement_href = explodeObj(isval($_MODULE['announcement_href']));
 $style_announcement = "font-size:$_MODULE[fontsize]; color:$_MODULE[fontcoloe];font-weight:$_MODULE[fontweight]; font-family:$_MODULE[fontfamily]";
 foreach($announcement as $key => $val)
 {
	$announcement_html .= "<li><a style=\"".$style_announcement."\" target=\"".$_MODULE['target']."\" href=\"".$announcement_href[$key]."\" title=\"".$val."\">".$val."</a></li>";
 }
/************************************************/
 $toujian_left_1_content = explodeObj(isval($_MODULE['toujian_left_1_content']));
 $toujian_left_1_content_href = explodeObj(isval($_MODULE['toujian_left_1_content_href']));
 $toujian_left_1_content_size = explodeObj(isval($_MODULE['toujian_left_1_content_size']));
 $toujian_left_1_content_weight = explodeObj(isval($_MODULE['toujian_left_1_content_weight']));
 $toujian_left_1_content_color = explodeObj(isval($_MODULE['toujian_left_1_content_color']));
 $toujian_left_1_content_icon = explodeObj(isval($_MODULE['toujian_left_1_content_icon']));
 $i=0;
 $len = count($toujian_left_1_content);
 foreach($toujian_left_1_content as $val)
 {
	 $i++;
	 if($i<$len)
	 {
		 $str = '&nbsp;|&nbsp;';
	 }else{
		 $str = NULL;
		}
		
		$icon = strtolower($toujian_left_1_content_icon[$i-1]);
		
		if($icon == NULL){
			$icon = "background:none; display:none";
		}else{
			$icon = "background:url(assets/images/".$icon.".gif) 0 0 no-repeat";
		}
	$tuijian_1_html .= "<a target=\"".$_MODULE['target']."\" href=\"".$toujian_left_1_content_href[$i-1]."\" style=\"color:".$toujian_left_1_content_color[$i-1]."; font-weight:".$toujian_left_1_content_weight[$i-1]."; font-size:".$toujian_left_1_content_size[$i-1]."\">".$val.$str."<span style=\"".$icon."\"></span></a>";
 }
 
/************************************************/
 $toujian_left_2_content = explodeObj(isval($_MODULE['toujian_left_2_content']));
 $toujian_left_2_content_href = explodeObj(isval($_MODULE['toujian_left_2_content_href']));
 $toujian_left_2_content_size = explodeObj(isval($_MODULE['toujian_left_2_content_size']));
 $toujian_left_2_content_weight = explodeObj(isval($_MODULE['toujian_left_2_content_weight']));
 $toujian_left_2_content_color = explodeObj(isval($_MODULE['toujian_left_2_content_color']));
 $toujian_left_2_content_icon = explodeObj(isval($_MODULE['toujian_left_2_content_icon']));
$i=0;
 $len = count($toujian_left_2_content);
 foreach($toujian_left_2_content as $val)
 {
	 $i++;
	 if($i<$len)
	 {
		 $str = '&nbsp;|&nbsp;';
	 }else{
		 $str = NULL;
		}
		
		$icon = strtolower($toujian_left_2_content_icon[$i-1]);
		
		if($icon == NULL){
			$icon = "background:none; display:none";
		}else{
			$icon = "background:url(assets/images/".$icon.".gif) 0 0 no-repeat";
		}
	$tuijian_2_html .= "<a target=\"".$_MODULE['target']."\" href=\"".$toujian_left_2_content_href[$i-1]."\" style=\"color:".$toujian_left_2_content_color[$i-1]."; font-weight:".$toujian_left_2_content_weight[$i-1]."; font-size:".$toujian_left_2_content_size[$i-1]."\">".$val.$str."<span style=\"".$icon."\"></span></a>";
 }
/************************************************/
 $toujian_right_1_content = explodeObj(isval($_MODULE['toujian_right_1_content']));
 $toujian_right_1_content_href = explodeObj(isval($_MODULE['toujian_right_1_content_href']));
 $toujian_right_1_content_size = explodeObj(isval($_MODULE['toujian_right_1_content_size']));
 $toujian_right_1_content_weight = explodeObj(isval($_MODULE['toujian_right_1_content_weight']));
 $toujian_right_1_content_color = explodeObj(isval($_MODULE['toujian_right_1_content_color']));
 $toujian_right_1_content_icon = explodeObj(isval($_MODULE['toujian_right_1_content_icon']));
 $i=0;
 $len = count($toujian_right_1_content);
 foreach($toujian_right_1_content as $val)
 {
	 $i++;
	 if($i<$len)
	 {
		 $str = '&nbsp;|&nbsp;';
	 }else{
		 $str = NULL;
		}
		$icon = strtolower($toujian_right_1_content_icon[$i-1]);
		
		if($icon == NULL){
			$icon = "background:none; display:none";
		}else{
			$icon = "background:url(assets/images/".$icon.".gif) 0 0 no-repeat";
		}
	$tuijian_3_html .= "<a target=\"".$_MODULE['target']."\" href=\"".$toujian_right_1_content_href[$i-1]."\" style=\"color:".$toujian_right_1_content_color[$i-1]."; font-weight:".$toujian_right_1_content_weight[$i-1]."; font-size:".$toujian_right_1_content_size[$i-1]."\">".$str.$val."<span style=\"".$icon."\"></span></a>";
 }
 
/************************************************/
 $toujian_right_2_content = explodeObj(isval($_MODULE['toujian_right_2_content']));
 $toujian_right_2_content_href = explodeObj(isval($_MODULE['toujian_right_2_content_href']));
 $toujian_right_2_content_size = explodeObj(isval($_MODULE['toujian_right_2_content_size']));
 $toujian_right_2_content_weight = explodeObj(isval($_MODULE['toujian_right_2_content_weight']));
 $toujian_right_2_content_color = explodeObj(isval($_MODULE['toujian_right_2_content_color']));
 $toujian_right_2_content_icon = explodeObj(isval($_MODULE['toujian_right_2_content_icon']));
$i=0;
 $len = count($toujian_right_2_content);
 foreach($toujian_right_2_content as $val)
 {
	 $i++;
	 if($i<$len)
	 {
		 $str = '&nbsp;|&nbsp;';
	 }else{
		 $str = NULL;
		}
		$icon = strtolower($toujian_right_2_content_icon[$i-1]);
		
		if($icon == NULL){
			$icon = "background:none; display:none";
		}else{
			$icon = "background:url(assets/images/".$icon.".gif) 0 0 no-repeat";
		}
	$tuijian_4_html .= "<a target=\"".$_MODULE['target']."\" href=\"".$toujian_right_2_content_href[$i-1]."\" style=\"color:".$toujian_right_2_content_color[$i-1]."; font-weight:".$toujian_right_2_content_weight[$i-1]."; font-size:".$toujian_right_2_content_size[$i-1]."\">".$str.$val."<span style=\"".$icon."\"></span></a>";
 }
?>
<div class="tb-module tshop-um tshop-um-KA_CLASSLIST">
    <div  class="J_TWidget scroll-news" data-widget-type="Slide" 
                data-widget-config="
                {
                	'contentCls':'news-items',
                    'hasTriggers':false,
                    'effect':'scrolly',
                    'easing':'easeBothStrong',
                    'interval':<?php echo $_MODULE[interval]?>,
                    'duration':0.2
                    }
                ">
                        <ul class="news-items">
                            <?php echo $announcement_html;?>
                        </ul>
                </div>
     <div class="toujian_left">
     	<dl>
        	<dt style="width:120px;"><a target="<?php echo $_MODULE['target']?>" style="font-size:14px; font-weight:<?php echo $_MODULE['toujian_left_1_weight'];?>; color:<?php echo $_MODULE['toujian_left_1_color'];?>" href="<?php echo $_MODULE['toujian_left_1_href'];?>"><?php echo $_MODULE['toujian_left_1'];?></a></dt>
            <dd style="width:307px">
            	<?php echo $tuijian_1_html;?>
            </dd>
        </dl>
     	<dl style="margin-top:12px">
        	<dt style="width:80px;"><a target="<?php echo $_MODULE['target']?>" style="font-size:14px; font-weight:<?php echo $_MODULE['toujian_left_2_weight'];?>; color:<?php echo $_MODULE['toujian_left_2_color'];?>" href="<?php echo $_MODULE['toujian_left_2_href'];?>"><?php echo $_MODULE['toujian_left_2'];?></a></dt>
            <dd style="width:347px">
            	<?php echo $tuijian_2_html;?>
            </dd>
        </dl>
     </div>
     <div class="toujian_right">
     	<dl>
        	<dt style="width:150px"><a target="<?php echo $_MODULE['target']?>" style="font-size:14px; font-weight:<?php echo $_MODULE['toujian_right_1_weight'];?>; color:<?php echo $_MODULE['toujian_right_1_color'];?>" href="<?php echo $_MODULE['toujian_right_1_href'];?>"><?php echo $_MODULE['toujian_right_1'];?></a></dt>
            <dd style="width:294px">
            	<?php echo $tuijian_3_html;?>
            </dd>
        </dl>
     	<dl style="margin-top:12px">
        	<dt style="width:116px"><a target="<?php echo $_MODULE['target']?>" style="font-size:14px; font-weight:<?php echo $_MODULE['toujian_right_2_weight'];?>; color:<?php echo $_MODULE['toujian_right_2_color'];?>" href="<?php echo $_MODULE['toujian_right_2_href'];?>"><?php echo $_MODULE['toujian_right_2'];?></a></dt>
            <dd style="width:328px">
            	<?php echo $tuijian_4_html;?>
            </dd>
        </dl>
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