

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_BOTTOM"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
 $b_title = explode("|",$_MODULE['b_title']);
 
  $b_href = explode("|",$_MODULE['b_href']);
 
 
  $k_id = explode("|",$_MODULE['k_id']);
  $k_title = explode("|",$_MODULE['k_title']);
?>
<div class="tb-module tshop-um tshop-um-KA_BOTTOM">
	
    <div class="b_title">
    	<?php
        	foreach($b_title as $key => $val){
		?>
    	<a target="_blank" href="<?php echo $b_href[$key];?>"><?php echo $val;?></a>
        <?php
			}
		?>
    </div>
    <div class="b_list">
    	<div class="b_r"><a href="<?php echo $_MODULE['b_r_href'];?>" target="_blank"><?php echo $_MODULE['b_r'];?></a></div>
    	<div class="b_x"><a href="<?php echo $_MODULE['b_x_href'];?>" target="_blank"><?php echo $_MODULE['b_x'];?></a></div>
    	<div class="b_k"><a href="<?php echo $_MODULE['b_k_href'];?>" target="_blank"><?php echo $_MODULE['b_k'];?></a></div>
        <div class="b_h">
        	<?php
            	for($i=0;$i<4;$i++){
			?>
            <div class="b_hh"> <?php echo $uriManager->supportTag($k_id[$i]).$k_title[$i];?></div>
            <?php
				}
			?>
        </div>
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