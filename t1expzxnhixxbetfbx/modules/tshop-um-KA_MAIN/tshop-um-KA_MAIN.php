

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_MAIN"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
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
 * 版  本：SA.1.0                           *
 * 时  间：2012.10.16 PM                    *
 * 作  者：Allen                            *
 * 旺  铺：http://xjcqc.taobao.com          *
 * 联系QQ：584643662（希望能与您为朋友！）  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>