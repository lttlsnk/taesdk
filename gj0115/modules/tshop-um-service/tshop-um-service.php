<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-service"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-service">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $defaulNickArray = array($userNick, $userNick, $userNick);
  $defaulIdArray = array(1,2,3);
  $kefu1name = $tbm_servicenick1 ? explode("|", $tbm_servicenick1) : array($u,$u,$u);
  $kefu1id = $tbm_serviceid1 ? explode("|", $tbm_serviceid1) : array($u,$u,$u);
  $kefu2name = $tbm_servicenick2 ? explode("|", $tbm_servicenick2) : array($u,$u,$u);
  $kefu2id = $tbm_serviceid2 ? explode("|", $tbm_serviceid2) : array($u,$u,$u);
  //�ղ�
  $collectPic = $tbm_collectpic ? $tbm_collectpic : "assets/images/collect.png";
  $collectStyle = "background-image: url($collectpic);"."height:$height;";
  //����ʱ��
  $worktimetxt = explode("|", $tbm_worktimetxt);
  //
?>
  <div class="mainbox190_hd service_hd">
    <img src="assets/images/wangwangeye.gif" />
  </div>
  <div class="mainbox190_bd service_bd">
    <ul>
      <?php
        //��ǰ�ͷ�
        echo "<li class='kefu'>".
            "<h4>".$tbm_servicehead1."</h4>".
            "<div class='item_bd'>";
        foreach($kefu1id as $k=>$v) {
          $itemName = $kefu1name[$k];
          echo "<span><em title='�����Ҳ�ͷ��'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
        }
        echo  "</div>".
          "</li>";
        //�ۺ�ͷ�
        echo "<li class='kefu'>".
            "<h4>".$tbm_servicehead2."</h4>".
            "<div class='item_bd'>";
        foreach($kefu2id as $k=>$v) {
          $itemName = $kefu2name[$k];
          echo "<span><em title='�����Ҳ�ͷ��'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
        }
        echo  "</div>".
          "</li>";
        //�ղ�
        echo "<li class='collect'>".
            "<a href='{$shopFavorite}' style='background-image:url({$collectPic}); height:{$tbm_collectheight}px;' target='_blank' title='�ղر���'></a>".
          "</li>";
        //����ʱ��
        echo "<li class='worktime'>".
            "<h4>".$tbm_worktimetitle."</h4>";
          foreach ($worktimetxt as $v) {
            echo "<p>".$v."</p>";
          }
        echo "</li>";
      ?>
    </ul>
  </div>
</div>
