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
  $kefugroup = "http://www.taobao.com/go/act/other/wwgroup.php?uid=&tribeid=".$tbm_kefugroupid;
  //
  $worktimetxt = explode("|", $tbm_worktimetxt);
  //
  $codepic = $tbm_codepic ? $tbm_codepic : $globalUrl."/default/service_code.jpg";
  $codetxt = $tbm_codetxt ? $tbm_codetxt : "�ֻ�ɨ���ά�뼴�ɵ�¼���꣬�ֻ�������ʵ�ݡ�";
?>
  <div class="mainbox190_hd service_hd">
    <h3><?php echo $tbm_moduletitle; ?></h3>
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
        //����Ⱥ
        if($tbm_kefugroupshow == 1){
          echo "<li class='kefugroup'>".
              "<a href='{$kefugroup}' target='_blank'><img src='http://img04.taobaocdn.com/tps/i4/T1fdykXgtiXXXXXXXX-63-20.gif' alt='����ι۸�Ⱥ' /></a>".
              "<span>".$tbm_kefugrouptxt."</span>".
            "</li>";
        }
        //����ʱ��
        echo "<li class='worktime'>".
            "<h4>".$tbm_worktimetitle."</h4>";
          foreach ($worktimetxt as $v) {
            echo "<p>".$v."</p>";
          }
        echo "</li>";
        //�ֻ���ά��
        if($tbm_codeshow == 1){
          echo "<li class='code'>".
              "<div class='code_pic'><img src='$codepic' width='75' height='75' alt='�ֻ���ά��' /></div>".
              "<p><a href='{$tbm_codelink}' target='_blank'>".$codetxt."</a></p>".
            "</li>";
        }
      ?>
    </ul>
  </div>
</div>
