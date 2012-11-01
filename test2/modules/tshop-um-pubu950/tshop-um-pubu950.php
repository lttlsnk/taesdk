

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-pubu950"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-pubu950" style = "height:1200px;position:relative;overflow:hidden;">

<? 
	$arr = array(
	"http://img04.taobaocdn.com/bao/uploaded/i4/T1HC_oXcJkXXX0Bi70_035639.jpg_310x310.jpg",
	"http://img03.taobaocdn.com/bao/uploaded/i3/T1QYnoXedsXXcokjc1_041606.jpg_220x220.jpg"
	);

?>

<div class="warp">



<div style="height:40px; display:<?=$_MODULE['xyin']?>" class="titel">
	<div class="titel_name"><span><?=$_MODULE['bt1']	 ?> </span></div>
	<div class="titel_more"><a href="http://www.taobao.com/">+ <?=$_MODULE['bt2']?></a></div>
</div>


<div class="pubu">


<?for ($i=0;$i<4;$i++){
	$ids = explode(',',$_MODULE['idem'.$i]);
	$idem =  $itemManager->queryByIds($ids,''); 

	if(count($idem)<=0) {
	$idem = $itemManager->queryByKeyword ("","hotsell",3); 
	}
	$zdtu = explode('|',$_MODULE['zdtu'.$i]); 
?> 


	<ul class="<?if($i == 3) echo 'end'  ?> ">
	
		<?for ($c=0;$c<count($idem);$c++){ ?>
	
		<li>
			<h4>
			    <a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?> " target="_blank" style="display:block;">
				    <img style = "float:left;display:block;width:210px;" src = "<?if($zdtu[$c]) echo $zdtu[$c] else echo $arr[0]  ?> "/>
                </a>			
			
			</h4>
			

			
			<h3>
				<span>
				
				    <a href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $idem[$c]->id; ?>&itemtype=1&scjjc=1">
				        <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_sc.jpg">
					</a>
					
					<a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?>">
					
					    <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_gm.jpg">
					</a>
					
					
				</span>
				<strong>￥:<?if($idem[$c]) echo $idem[$c]->price else echo '200'  ?> </strong>
				已售<? if($idem[$c]) echo $idem[$c]->soldCount else echo '300' ?> 件
				
				
			</h3>
			
			
			
		</li>
		
		
		<? }?> 
	
	</ul>

	
<?}?> 
	
	
	
	
</div>





</div>

</div>
