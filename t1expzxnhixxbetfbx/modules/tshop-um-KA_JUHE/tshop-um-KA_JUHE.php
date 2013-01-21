

<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-KA_JUHE"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
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
                    
                    

<div class="tb-module tshop-um tshop-um-KA_JUHE">
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
    <div class="juhe_L">
    	<dl>
        	<dt class="juhe_L_1"><a href="<?php echo $_MODULE['juhe_1_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_1_img'];?>" title="<?php echo $_MODULE['juhe_1_title'];?>" alt="<?php echo $_MODULE['juhe_1_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_1',
          'align':{
                  'node':'.juhe_L_1',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_1_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_1_title'];?></h1>
            </dd>
        </dl>
    	<dl>
        	<dt class="juhe_L_2"><a href="<?php echo $_MODULE['juhe_2_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_2_img'];?>" title="<?php echo $_MODULE['juhe_2_title'];?>" alt="<?php echo $_MODULE['juhe_2_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_2',
          'align':{
                  'node':'.juhe_L_2',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_2_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_1_title'];?></h1>
            </dd>
        </dl>
    	<dl>
        	<dt class="juhe_L_3"><a href="<?php echo $_MODULE['juhe_3_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_3_img'];?>" title="<?php echo $_MODULE['juhe_3_title'];?>" alt="<?php echo $_MODULE['juhe_3_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_3',
          'align':{
                  'node':'.juhe_L_3',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_3_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_3_title'];?></h1>
            </dd>
        </dl>
    </div>
    <div class="juhe_C">
    	<dl class="juhe_C_A">
        	<dt><a href="<?php echo $_MODULE['juhe_4_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_4_img'];?>" title="<?php echo $_MODULE['juhe_4_title'];?>" alt="<?php echo $_MODULE['juhe_4_title'];?>" /></a>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_4_title'];?></h1>
                <span class="juhe_title">
                    <h4><?php echo $_MODULE['juhe_4_jia'];?></h4>
                </span>
            </dd>
        </dl>
    	<dl class="juhe_C_B">
        	<dt><a href="<?php echo $_MODULE['juhe_5_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_5_img'];?>" title="<?php echo $_MODULE['juhe_5_title'];?>" alt="<?php echo $_MODULE['juhe_5_title'];?>" /></a>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_5_title'];?></h1>
                <span class="juhe_title">
                    <h4><?php echo $_MODULE['juhe_5_jia'];?></h4>
                </span>
            </dd>
        </dl>
    </div>
    <div class="juhe_R">
    	<dl>
        	<dt class="juhe_L_6"><a href="<?php echo $_MODULE['juhe_6_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_6_img'];?>" title="<?php echo $_MODULE['juhe_6_title'];?>" alt="<?php echo $_MODULE['juhe_6_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_6',
          'align':{
                  'node':'.juhe_L_6',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_6_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_6_title'];?></h1>
            </dd>
        </dl>
    	<dl>
        	<dt class="juhe_L_7"><a href="<?php echo $_MODULE['juhe_7_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_7_img'];?>" title="<?php echo $_MODULE['juhe_7_title'];?>" alt="<?php echo $_MODULE['juhe_7_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_7',
          'align':{
                  'node':'.juhe_L_7',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_7_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_7_title'];?></h1>
            </dd>
        </dl>
    	<dl>
        	<dt class="juhe_L_8"><a href="<?php echo $_MODULE['juhe_8_href'];?>" target="<?php echo $_MODULE['target'];?>"><img src="<?php echo $_MODULE['juhe_8_img'];?>" title="<?php echo $_MODULE['juhe_8_title'];?>" alt="<?php echo $_MODULE['juhe_8_title'];?>" /></a>
            <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.juhe_L_8',
          'align':{
                  'node':'.juhe_L_8',
                  'offset':[0,0],
                  'points':['bc','bc']
                  }
            }">
    		<span class="juhe_p1"><?php echo $_MODULE['juhe_8_jia'];?></span>
        </div>
        </dt>
            <dd>
            	<h1><?php echo $_MODULE['juhe_8_title'];?></h1>
            </dd>
        </dl>
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