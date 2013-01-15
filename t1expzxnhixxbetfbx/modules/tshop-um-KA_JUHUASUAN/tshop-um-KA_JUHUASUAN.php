

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_JUHUASUAN"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */

	$ids=explode(",",$_MODULE['baobei_s']);
	
	$bao = $itemManager->queryByIds($ids,$_MODULE['baobei_p']);


if($_MODULE['ju_open']=="shou"){
	$baobei_title = explode("|",$_MODULE['baobei_title']);
	$baobei_zhekou = explode("|",$_MODULE['baobei_zhekou']);
	$baobei_con = explode("|",$_MODULE['baobei_con']);
	$baobei_img = explode("|",$_MODULE['baobei_img']);
}
  $_MODULE['title_wenzi']==""? $title_wenzi = NULL:$title_wenzi=$_MODULE['title_wenzi'];
 $_MODULE['title_href']==""? $title_href = NULL:$title_href=$_MODULE['title_href'];
 $title_wenzi = explode("|",$title_wenzi);
 $title_href = explode("|",$title_href);
 $i=0;
 $title_len = count($title_wenzi);
 foreach($title_wenzi as $key=>$vals)
 {
	 $i++;
	 if($i<$title_len)
	 {
		 $str = '&nbsp;|&nbsp;';
	 }else{
		 $str = NULL;
		}
	$title_html .="<a href=\"".$title_href[$key]."\" target=\"".$_MODULE['target']."\" title=\"".$vals."\">$str$vals</a>"; 
}







	
	
?>
<div class="tb-module tshop-um tshop-um-KA_JUHUASUAN">
	<?php
    if($_MODULE['title_open']=="yes"){
	?>
    <div class="baobeititle">
    	<ul>
        	<li class="title"><?php echo $_MODULE['title'];?></li>
            <li class="more">
            	<a target="<?php echo $_MODULE['target'];?>" href="<?php echo $_MODULE['more'];?>"></a>
            </li>
        	<li class="title_wenzi">
            	<?php echo $title_html;?>
            </li>
        </ul>
    </div>
    <?php
    }
	?>
    
    <div class="J_TWidget juhuasuan" data-widget-type="Slide" data-widget-config="{
    	'navCls':'stick',
    	'contentCls':'stage',
    	'activeTriggerCls':'selected',
        'triggerType':'<?php echo $_MODULE[triggerType]?>',
    	'effect':'<? echo $_MODULE[pic_xiaoguo]?>',
    	'easing':'<? echo $_MODULE[pic_flash]?>'}">
    	<div class="stage">
        <?php
        for($i=0;$i<4;$i++){
			if($_MODULE['ju_open']=="auto"){
		?>
        <dl>
        	<dt>
            	<span class="ju_title"><?php echo $bao[$i]->title;?></span>
                <span class="ju_jia"><a href="http://item.taobao.com/item.htm?id=<?php echo $bao[$i]->id;?>" target="<?php echo $_MODULE['target'];?>"><?php echo $bao[$i]->price;?></a></span>
                <span class="ju_obj"><h1>￥<?php echo $bao[$i]->price;?></h1>
                    <h2><?php echo "无折扣";?></h2>
                    <h3>￥0</h3>
                </span>
                <span class="ju_con">
                	<h1><?php echo $bao[$i]->soldCount;?>人已购买</h1>
                	<h2>数量有限，赶紧下单吧！</h2>
                </span>
            </dt>
            <dd>
            	<a href="http://item.taobao.com/item.htm?id=<?php echo $bao[$i]->id;?>" target="_blank"><img src="<?php echo $bao[$i]->getPicUrl(460,460);?>" title="<?php echo $bao[$i]->title;?>" alt="<?php echo $bao[$i]->title;?>" /></a>
            </dd>
    	</dl>
        <?
        }else{
		?>	
        <dl>
        	<dt>
            	<span class="ju_title"><?php echo $baobei_title[$i];?></span>
                <span class="ju_jia"><a href="http://item.taobao.com/item.htm?id=<?php echo $bao[$i]->title;?>" target="<?php echo $_MODULE['target'];?>"><?php echo $bao[$i]->price;?></a></span>
                <span class="ju_obj_title" style="vertical-align: middle;"><h1><?php echo $_MODULE['yuan-title'];?></h1>
                    <h2><?php echo $_MODULE['zhe-title'];?></h2>
                    <h3><?php echo $_MODULE['shen-title'];?></h3>
                </span>
                <span class="ju_obj" style="vertical-align: middle;">
                	<h1><?php echo $bao[$i]->price;?></h1>
                    <h2><?php echo $baobei_zhekou[$i];?></h2>
                    <h3><?php $z = $bao[$i]->price;$zs = floatval("0.".$baobei_zhekou[$i]);echo $z*$zs;?></h3>
                </span>
                <span class="ju_con">
                	
                	<h2><?php echo $baobei_title[$i];?></h2>
                </span>
            </dt>
            <dd>
            	<a href="http://item.taobao.com/item.htm?id=<?php echo $bao[$i]->id;?>" target="_blank"><img src="<?php echo $baobei_img[$i];?>" title="<?php echo $baobei_title[$i];?>" alt="<?php echo $baobei_title[$i];?>" /></a>
            </dd>
    	</dl>
		<?php
		}}
		?>
		</div>
    	
        <ul class="stick">
        <?php
        	for($i=0; $i<4;$i++){
				$i==0 ? $css = 'class="selected"':$css = '';
				if($_MODULE['ju_open']=="auto"){
		?>
			<li <?php echo $css;?>><img src="<?php echo $bao[$i]->getPicUrl(120,120);?>" width="119" height="119" /></li>
         <?php
			}else{
		 ?>
			<li <?php echo $css;?>><img src="<?php echo $baobei_img[$i];?>" width="119" height="119" /></li>
         <?php
		}}
		?>
    	</ul>
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