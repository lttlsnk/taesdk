

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_HAIBAO"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
 
 
	$_MODULE['pic_img'] =="" ? $pic_img=NULL : $pic_img=$_MODULE['pic_img'];
	
	$_MODULE['pic_href'] =="" ? $pic_href=NULL : $pic_href=$_MODULE['pic_href'];
	
	$_MODULE['pic_title'] =="" ? $pic_title=NULL : $pic_title=$_MODULE['pic_title'];
	
	
	$pic_img = explode("@",$pic_img);
	
	$pic_href = explode("@",$pic_href);
	
	$pic_title = explode("@",$pic_title);
	
	$pic_len = count($pic_img);
	
	
 
 	if($regionWidth == 950||$regionWidth ==null){//展示950布局下的||单个模块调试时预览效果
		$width = "width:950px;";
		$height = $_MODULE['height'] ? $_MODULE['height'] : 400;
		
		if($_MODULE['style']==1){//风格1样式
			$w = floor(950/$pic_len);
			$stick = "width:950px; height:36px; left:0px; bottom:0px";
		}elseif($_MODULE['style']==2){//风格2样式
			
			$w2 = $pic_len*29;
			$left = (950-$w2)/2;
			$stick = "width:".$w2."px; height:8px; left:".$left."px; bottom:20px";
		}elseif($_MODULE['style']==3){//风格3样式
		
			$w2 = $pic_len*29;
			$stick = "width:".$w2."px; height:25px; right:15px; bottom:15px";
		}
	}elseif($regionWidth == 750){//展示750布局下的
		$width = "width:750px;";
		$height = $_MODULE['height'] ? $_MODULE['height'] : 300;
		
		if($_MODULE['style']==1){//风格1样式
			$w = floor(750/$pic_len);
			$stick = "width:750px; height:36px; left:0px; bottom:0px";
		}elseif($_MODULE['style']==2){//风格2样式
			
			$w2 = $pic_len*29;
			$left = (750-$w2)/2;
			$stick = "width:".$w2."px; height:8px; left:".$left."px; bottom:20px";
		}elseif($_MODULE['style']==3){//风格3样式
			$w2 = $pic_len*29;
			$stick = "width:".$w2."px; height:25px; right:15px; bottom:15px";
		}
	}
?>
<div class="tb-module tshop-um tshop-um-KA_HAIBAO">
<div class="J_TWidget haibao" style="<?php echo $width.'height:'.$height.'px';?>" data-widget-type="Slide" data-widget-config="{
    	'navCls':'stick',
    	'contentCls':'stage',
    	'activeTriggerCls':'selected',
        'triggerType':'<?php echo $_MODULE[triggerType]?>',
    	'effect':'<? echo $_MODULE[pic_xiaoguo]?>',
    	'easing':'<? echo $_MODULE[pic_flash]?>'}">
    	<ul class="stage">
			<?php
				foreach($pic_img as $key=>$val)
				{
					echo "<li style=\"".$width."height:".$height."px;\"><a style=\"height:".$height."px; ".$width." display:block; background:url(".$val.") 0 0 no-repeat\" target=\"".$_MODULE['target']."\" href=\"".$pic_href[$key]."\"></a></li>";
				}
			?>
    	</ul>
    	<ul class="stick" style="<? echo $stick; ?>">
			<?php
				$i=0;
            	foreach($pic_title as $val)
				{
					$i++;
					if($_MODULE['style'] == 1)
					{
						if($i==1)
						{
							echo "<li class=\"selected\" style=\"width:".$w."px; height:36px; border:0 none; line-height:36px;\">".$val."</li>";
						}else{
							echo "<li style=\"width:".($w-1)."px; height:36px; border-left:1px solid  #000; line-height:36px;\">".$val."</li>";
						}
					}elseif($_MODULE['style'] == 2){
						if($i==1)
						{
							echo "<li class=\"selected\" style=\"width:25px; height:8px; line-height:8px; margin:0 2px;\"></li>";
						}else{
							echo "<li style=\"width:25px; height:8px; line-height:8px; margin:0 2px;\"></li>";
						}
					}elseif($_MODULE['style']==3){
						if($i==1)
						{
							echo "<li class=\"selected\" style=\"width:25px; height:25px; line-height:25px; margin:0 2px;\">$i</li>";
						}else{
							echo "<li style=\"width:25px; height:25px; line-height:25px; margin:0 2px;\">$i</li>";
						}
					}
				}
			?>
    	</ul>
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