

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_JUHUASUAN"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
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
                <span class="ju_obj"><h1>��<?php echo $bao[$i]->price;?></h1>
                    <h2><?php echo "���ۿ�";?></h2>
                    <h3>��0</h3>
                </span>
                <span class="ju_con">
                	<h1><?php echo $bao[$i]->soldCount;?>���ѹ���</h1>
                	<h2>�������ޣ��Ͻ��µ��ɣ�</h2>
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
 * ��  ����SA.1.0                           *
 * ʱ  �䣺2012.10.17 PM                    *
 * ��  �ߣ�Allen                            *
 * ��  �̣�http://xjcqc.taobao.com          *
 * ��ϵQQ��584643662��ϣ��������Ϊ���ѣ���  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>