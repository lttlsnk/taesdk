

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_MAIN"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */

 
 
	$m_item=explode(",",$_MODULE['m_item']);
	
	$main = $itemManager->queryByIds($m_item,$_MODULE['m_paixu']);
 
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
<div class="tb-module tshop-um tshop-um-KA_MAIN">


    
    
    
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
    
    
    <div class="m_list clearfix">
    	<?php
		$i=0;
        foreach($main as $val){
			 $i++;
			  if($i%3!=0){
				  $margin_right="5px";
				 }else{
					 $margin_right="0px";
				}
		?>
        <div class="m_item m_item_<?php echo $i;?>" style="margin-right:<?php echo $margin_right;?>">
        	<a style="background:url(<?php echo $val->getPicUrl(240);?>) 0 0 no-repeat;" href="http://item.taobao.com/item.html?id=<?php echo $val->id;?>" target="<?php $_MODULE['target'];?>"></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.m_item_<?php echo $i;?>',
          'align':{
                  'node':'.m_item_<?php echo $i;?>',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="pr"><?php echo $val->title;?></span>
        </div>
        </div>
        <?php
		}
		?>
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