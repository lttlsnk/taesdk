

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_KEFU"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
 $qian = explode("|",$_MODULE['qian']);
 
 $hou = explode("|",$_MODULE['hou']);
 
 $qian_id = explode("|",$_MODULE['qian_id']);
 
 $hou_id = explode("|",$_MODULE['hou_id']);
?>
<div class="tb-module tshop-um tshop-um-KA_KEFU">
	<div class="title"><img src="assets/images/wangwang2.gif" /></div>
    <div class="shouqian">
        	<div class="shouqian_title"><?php echo $_MODULE['qian_title'];?></div>
            <?php 
			foreach($qian as $key => $val){
			?>
			<div class="shouqian_k">
            <?php echo $uriManager->supportTag($qian_id[$key]);echo $val;?>
            </div>
            <?php
            }
			?>
    </div>
    <div class="shouhou">
        	<div class="shouhou_title"><?php echo $_MODULE['hou_title'];?></div>
            <?php 
			foreach($hou as $key => $val){
			?>
			<div class="shouhou_k">
            <?php echo $uriManager->supportTag($hou_id[$key]);echo $val;?>
            </div>
            <?php
            }
			?>
    </div>
    <div class="yingye">
		<span class="s"><a href="<?php echo $uriManager->favoriteLink();?>" target="<?php echo $_MODULE['target'];?>"></a></span>
		<span class="y"><?php echo $_MODULE['yingye'];?></span>
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