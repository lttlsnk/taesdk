

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-SA_SHISHANG"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-SA_SHISHANG">

	<ul class="SA_SHISHANG">
    	<li class="sa_shishang_1" style="background:url(<?php echo $_MODULE['img_1'];?>) 0 0 no-repeat"><a href="<?php echo $_MODULE['img_1_href'];?>" target="<?php echo $_MODULE['img_1_target'];?>" title="<?php echo $_MODULE['img_1_title'];?>"></a>
       <?php
       		if($_MODULE['title_open']=="yes"){
	   ?>
       <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.sa_shishang_1',
          'align':{
                  'node':'.sa_shishang_1',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="shishang_jia" style="width:244px; background-color:<?php echo $_MODULE['img_1_back']?>; color:<?php echo $_MODULE['img_1_color']?>"><?php echo $_MODULE['img_1_title'];?></span>
        </div>
        <?php
			}
		?>
        </li>
    	<li class="sa_shishang_2" style="background:url(<?php echo $_MODULE['img_2'];?>) 0 0 no-repeat"><a href="<?php echo $_MODULE['img_2_href'];?>" target="<?php echo $_MODULE['img_2_target'];?>" title="<?php echo $_MODULE['img_2_title'];?>"></a>
       <?php
       		if($_MODULE['title_open']=="yes"){
	   ?>
       <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.sa_shishang_2',
          'align':{
                  'node':'.sa_shishang_2',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="shishang_jia" style="width:244px; background-color:<?php echo $_MODULE['img_2_back']?>; color:<?php echo $_MODULE['img_2_color']?>"><?php echo $_MODULE['img_2_title'];?></span>
        </div>
        <?php
			}
		?>
        </li>
    	<li class="sa_shishang_3" style="background:url(<?php echo $_MODULE['img_3'];?>) 0 0 no-repeat"><a href="<?php echo $_MODULE['img_3_href'];?>" target="<?php echo $_MODULE['img_3_target'];?>" title="<?php echo $_MODULE['img_3_title'];?>"></a>
       <?php
       		if($_MODULE['title_open']=="yes"){
	   ?>
       <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.sa_shishang_3',
          'align':{
                  'node':'.sa_shishang_3',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="shishang_jia" style="width:447px; background-color:<?php echo $_MODULE['img_3_back']?>; color:<?php echo $_MODULE['img_3_color']?>"><?php echo $_MODULE['img_3_title'];?></span>
        </div>
        <?php
			}
		?>
        </li>
    	<li class="sa_shishang_4" style="background:url(<?php echo $_MODULE['img_4'];?>) 0 0 no-repeat"><a href="<?php echo $_MODULE['img_4_href'];?>" target="<?php echo $_MODULE['img_4_target'];?>" title="<?php echo $_MODULE['img_4_title'];?>"></a>
       <?php
       		if($_MODULE['title_open']=="yes"){
	   ?>
       <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.sa_shishang_4',
          'align':{
                  'node':'.sa_shishang_4',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="shishang_jia"style="width:220px; background-color:<?php echo $_MODULE['img_4_back']?>; color:<?php echo $_MODULE['img_4_color']?>"><?php echo $_MODULE['img_4_title'];?></span>
        </div>
        <?php
			}
		?>
        </li>
    	<li class="sa_shishang_5" style="background:url(<?php echo $_MODULE['img_5'];?>) 0 0 no-repeat"><a href="<?php echo $_MODULE['img_5_href'];?>" target="<?php echo $_MODULE['img_5_target'];?>" title="<?php echo $_MODULE['img_5_title'];?>"></a>
       <?php
       		if($_MODULE['title_open']=="yes"){
	   ?>
       <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.sa_shishang_5',
          'align':{
                  'node':'.sa_shishang_5',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="shishang_jia"style="width:220px; background-color:<?php echo $_MODULE['img_5_back']?>; color:<?php echo $_MODULE['img_5_color']?>"><?php echo $_MODULE['img_5_title'];?></span>
        </div>
        <?php
			}
		?>
        </li>
    </ul>
</div>
<?php
/********************************************
 * 版  本：SA.1.0                           *
 * 时  间：2012.10.17 AM                    *
 * 作  者：Allen                            *
 * 旺  铺：http://xjcqc.taobao.com          *
 * 联系QQ：584643662（希望能与您为朋友！）  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>