

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_PAIHANG"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
 
 
	$ids=explode(",",$_MODULE['m_item']);
	
	$item = $itemManager->queryByIds($ids,$_MODULE['m_paixu']);


?>
<div class="tb-module tshop-um tshop-um-KA_PAIHANG clearfix">


    	<div class="a_hd">�������а�</div>
    	
        
        <?php
        	foreach($item as $val){
		?>
        <div class="a_baobei">
        	<a class="a_img" href="http://item.taobao.com/item.htm?id=<?php echo $val->id;?>" target="<?php echo $_MODULE['target'];?>" style="background:url(<?php echo $val->getPicUrl(80);?>) 0 0 no-repeat"></a>
            <div class="a_info">
            	<a class="a_title"  href="http://item.taobao.com/item.htm?id=<?php echo $val->id;?>" target="<?php echo $_MODULE['target'];?>" title=""><?php echo $val->title;?></a>
                <div class="a_price">�۸�<b><?php echo $val->price;?></b></div>
                <div class="a_sold">�۳���<b><?php echo $val->soldCount;?></b></div>
            </div>
        </div>
        <?php
			}
		?>
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