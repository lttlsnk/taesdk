<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-foot"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-foot">
<?php
/**
 * ��ʼ���PHPҳ��
 */
?>
<!-- <div class="skin-box">
  <div class="skin-box-hd">
    <h3><span>ʿ���ʿ���</span></h3>
    <p class="title">���ǲ��Ա���</p>
  </div>
</div> -->
<div class="ft-nav">
  <div class="ft-nav-con">
    <ul>
      <li><a href="<?php echo $shopUrl ?>">������ҳ</a> | </li>
      <li><a href="<?php echo $uriManager->searchURI(); ?>">���б���</a> | </li>
      <li><a href="<?php echo $uriManager->rateURI(); ?>">��������</a> | </li>
      <li><a href="<?php echo $uriManager->shopIntrURI(); ?>">��������</a> | </li>
      <li><a href="<?php echo $uriManager->favoriteLink(); ?>">�ղر���</a> | </li>
      <li><a href="#top">���ض���</a></li>
    </ul>
  </div>
</div>


</div>
