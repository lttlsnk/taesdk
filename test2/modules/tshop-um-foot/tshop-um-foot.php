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
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $shareConfig = getShareConfig("shop",$shopId,$shopTitle);
  //service
  $defaulNickArray = array($userNick, $userNick, $userNick);
  $defaulIdArray = array(1,2,3);
  //
  $serviceName1 = $tbm_servicenick1 ? explode("|",$tbm_servicenick1) : $defaulNickArray;
  $serviceID1 = $tbm_serviceid1 ? explode("|", $tbm_serviceid1) : $defaulIdArray;
  $serviceName2 = $tbm_servicenick2 ? explode("|",$tbm_servicenick2) : $defaulNickArray;
  $serviceID2 = $tbm_serviceid2 ? explode("|", $tbm_serviceid2) : $defaulIdArray;
?>
  <div class="ft-nav">
    <div class="ft-nav-con">
      <ul>
        <li><a href="<?=$shopUrl ?>">������ҳ</a> | </li>
        <li><a href="<?=$allProduct ?>">���б���</a> | </li>
        <li><a href="<?=$shopRate ?>">��������</a> | </li>
        <li><a href="<?=$shopIntr ?>">��������</a> | </li>
        <li><a href="<?=$shopFavorite ?>">�ղر���</a> | </li>
        <li><a href="#top">���ض���</a></li>
      </ul>
    </div>
  </div>
  <div class="ft-info">
    <div class="ft-info-detail">
      <ul>
        <?php
          for($i=1; $i<=4; $i++){
            $head = ${'tbm_abouthead'.$i};
            $content = ${'tbm_aboutcontent'.$i};
            echo "<li>".
                "<span class='title'>{$head}</span>".
                "<span class='content'>{$content}</span>".
              "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="ft-info-share">
        <p class="title">������̵���</p>
        <div class="sns-widget" data-sharebtn='<?=$shareConfig?>'></div>
    </div>
    <div class="ft-info-wangwang">
      <ul>
        <li>
          <span class="title"><?=$tbm_servicehead1?>��</span>
          <?php
            foreach ($serviceID1 as $k => $v) {
              $itemID = $v;
              $itemName = $serviceName1[$k];
              $wangwang = $uriManager->supportTag($itemID,$itemName,$tbm_wangwangskin,false);
              echo "<span><em title='�����Ҳ�ͷ��'>{$itemName}</em>{$wangwang}</span>";
            }
          ?>
        </li>
        <li>
          <span class="title"><?=$tbm_servicehead2?>��</span>
          <?php
            foreach ($serviceID2 as $k => $v) {
              $itemID = $v;
              $itemName = $serviceName1[$k];
              $wangwang = $uriManager->supportTag($itemID,$itemName,$tbm_wangwangskin,false);
              echo "<span><em title='�����Ҳ�ͷ��'>{$itemName}</em>{$wangwang}</span>";
            }
          ?>
        </li>
        <li class="worktime"><?=$tbm_worktime ?></li>
      </ul>
    </div>
  </div>
</div>