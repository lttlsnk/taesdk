

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_HAIBAO"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
 
	$_MODULE['pic_img'] =="" ? $pic_img=NULL : $pic_img=$_MODULE['pic_img'];
	
	$_MODULE['pic_href'] =="" ? $pic_href=NULL : $pic_href=$_MODULE['pic_href'];
	
	$_MODULE['pic_title'] =="" ? $pic_title=NULL : $pic_title=$_MODULE['pic_title'];
	
	
	$pic_img = explode("@",$pic_img);
	
	$pic_href = explode("@",$pic_href);
	
	$pic_title = explode("@",$pic_title);
	
	$pic_len = count($pic_img);
	
	
 
 	if($regionWidth == 950||$regionWidth ==null){//չʾ950�����µ�||����ģ�����ʱԤ��Ч��
		$width = "width:950px;";
		$height = $_MODULE['height'] ? $_MODULE['height'] : 400;
		
		if($_MODULE['style']==1){//���1��ʽ
			$w = floor(950/$pic_len);
			$stick = "width:950px; height:36px; left:0px; bottom:0px";
		}elseif($_MODULE['style']==2){//���2��ʽ
			
			$w2 = $pic_len*29;
			$left = (950-$w2)/2;
			$stick = "width:".$w2."px; height:8px; left:".$left."px; bottom:20px";
		}elseif($_MODULE['style']==3){//���3��ʽ
		
			$w2 = $pic_len*29;
			$stick = "width:".$w2."px; height:25px; right:15px; bottom:15px";
		}
	}elseif($regionWidth == 750){//չʾ750�����µ�
		$width = "width:750px;";
		$height = $_MODULE['height'] ? $_MODULE['height'] : 300;
		
		if($_MODULE['style']==1){//���1��ʽ
			$w = floor(750/$pic_len);
			$stick = "width:750px; height:36px; left:0px; bottom:0px";
		}elseif($_MODULE['style']==2){//���2��ʽ
			
			$w2 = $pic_len*29;
			$left = (750-$w2)/2;
			$stick = "width:".$w2."px; height:8px; left:".$left."px; bottom:20px";
		}elseif($_MODULE['style']==3){//���3��ʽ
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
 * ��  ����SA.1.0                           *
 * ʱ  �䣺2012.10.16 PM                    *
 * ��  �ߣ�Allen                            *
 * ��  �̣�http://xjcqc.taobao.com          *
 * ��ϵQQ��584643662��ϣ��������Ϊ���ѣ���  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>