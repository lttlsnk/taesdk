

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_CLASS"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
 
?>
<div class="tb-module tshop-um tshop-um-KA_CLASS">

	<div class="a_hd"><?php echo $_MODULE['class_title'];?></div>
    
    
    
<div class="J_TWidget a_class"  data-widget-type="Accordion"  data-widget-config="{
             'triggerType': 'click',
             'multiple':true,
             'triggerCls':'a_title',
             'panelCls':'a_c'
             }">
             <div class="a_title"><i></i><a class="a_cl" href="<?php echo $uriManager->searchURI();?>" target="<? echo $_MODULE['target']?>">�鿴ȫ������&raquo;</a></div>
             <div class="a_c clearfix">
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_hotsell" target="<? echo $_MODULE['target']?>">������</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_newOn" target="<? echo $_MODULE['target']?>">����Ʒ</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=price" target="<? echo $_MODULE['target']?>">���۸�</a>
				<a class="a_cl" href="<?php echo $uriManager->searchURI();?>&orderType=_hotkeep" target="<? echo $_MODULE['target']?>">���ղ�</a>
             </div>
          <?php
		  		$allShopCategory  = $shopCategoryManager->queryAll();
		  		foreach($allShopCategory as $shopCategory){
		  ?>
             <div class="a_title"><i></i><a href="<?php echo $uriManager->shopCategoryURI ($shopCategory);?>" target="<?php echo $_MODULE['targe'];?>"><?php echo $shopCategory->name;?></a></div>
             <div class="a_c clearfix">
			 <?php
              $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
			 	foreach($subCategories as $shopCategory){
			 ?>
                 <a class="a_cb" href="<?php echo $uriManager->shopCategoryURI ($shopCategory);?>" target="<?php echo $_MODUL['target']?>"><?php echo $shopCategory->name;?></a>
             <?php
             }
			 ?>
             </div>
            <?php
            }
			?> 
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