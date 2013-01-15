

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-SA_BAOBEIZHANSHI"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
  if($_MODULE['baobei_form']=="system")
 {
	$ids=explode(",",$_MODULE['baobei_system']);
	$items = $itemManager->queryByIds($ids,$_MODULE['baobei_paixu']);
 }elseif($_MODULE['baobei_form']=="zidingyi"){
	 
	$_MODULE['baobei_img'] == "" ? $baobei_img=NULL:$baobei_img = $_MODULE['baobei_img'];
 	
	$_MODULE['baobei_title'] == "" ? $baobei_title=NULL:$baobei_title = $_MODULE['baobei_title'];
 	
	$_MODULE['baobei_href'] == "" ? $baobei_href=NULL:$baobei_href = $_MODULE['baobei_href'];
 	
	$_MODULE['baobei_price'] == "" ? $baobei_price=NULL:$baobei_price = $_MODULE['baobei_price'];
	
	$baobei_img = explode("|",$baobei_img);
	
	$baobei_title = explode("|",$baobei_title);
	
	$baobei_href = explode("|",$baobei_href);
	
	$baobei_price = explode("|",$baobei_price);
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
<div class="tb-module tshop-um tshop-um-SA_BAOBEIZHANSHI">
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
    
    <div class="bbzs">
    	<div class="bbzsd">
        	<a href="<?php echo $_MODULE['bbzsd_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['bbzsd_img'];?>" title="<?php echo $_MODULE['bbzsd_title'];?>" alt="<?php echo $_MODULE['bbzsd_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.bbzsd',
          'align':{
                  'node':'.bbzsd',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span><?php echo $_MODULE['bbzsd_title'];?></span>
        </div>
         </div>
        <div class="bbzsx">
        	
<?php
  	  if($_MODULE['baobei_form']=="system"){
		  for($j=0;$j<6;$j++){
			  if(($j+1)%3!=0){
				  $margin_right="3px";
				 }else{
					 $margin_right="0px";
				}
	?>
    <dl style="margin-right:<?php echo $margin_right;?>">
    	<dt class="bbzsx_<?php echo $j?>">
        	<a href="http://item.taobao.com/item.htm?id=<?php echo $items[$j]->id;?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $items[$j]->picUrl;?>"  title="<?php echo $items[$j]->title;?>" alt="<?php echo $items[$j]->title;?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.bbzsx_<?php echo $j?>',
          'align':{
                  'node':'.bbzsx_<?php echo $j?>',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span><?php echo $items[$j]->title;?></span>
        </div>
        </dt>
        <dd>
        	<a href="http://item.taobao.com/item.htm?id=<?php echo $items[$j]->id;?>" target="<?php echo $_MODULE['target'];?>"><?php echo $items[$j]->price;?></a>
        </dd>
    </dl>
    <?php
		  }
		 }elseif($_MODULE['baobei_form']=="zidingyi"){
			 for($i=0;$i<6;$i++){
			  if(($i+1)%3!=0){
				  $margin_right="3px";
				 }else{
					 $margin_right="0px";
				}
	?>
    <dl style="margin-right:<?php echo $margin_right;?>">
    	<dt class="bbzsx_<?php echo $i?>">
        	<a href="<?php echo $baobei_href[$i];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $baobei_img[$i];?>"  title="<?php echo $baobei_title[$i];?>" alt="<?php echo $baobei_title[$i];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.bbzsx_<?php echo $i?>',
          'align':{
                  'node':'.bbzsx_<?php echo $i?>',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span><?php echo $baobei_title[$i];?></span>
        </div>
        </dt>
        <dd>
        	<a href="http://item.taobao.com/item.htm?id=<?php echo $baobei_href[$i];?>" target="<?php echo $_MODULE['target'];?>"><?php echo $baobei_price[$i];?></a>
        </dd>
    </dl>
    <?php
	  }}
	  ?>
        </div>
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