<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-shopnotice"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-shopnotice">
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
  $shuotxt = substr($tbm_shuotxt, 0, 18);
?>
  <div class="shopnotice_hd">
    <h3><span><?php echo $tbm_moduletitle;?></span><span><?php echo $tbm_mouduletitleen;?></span></h3>
    <p class="notice_content"><?php echo $tbm_noticecontent;?></p>
    <div class="J_TWidget notice_tab" data-widget-type="Tabs">
      <ul class="ks-switchable-nav">
        <li class="ks-active"><a href="<?php echo $tbm_weibo;?>">΢��</a></li>
        <li><a href="<?php echo $tbm_shuo;?>">�ƹ�˵</a></li>
        <li class="last"><a href="<?php echo $tbm_bangpai;?>">�����</a></li>
      </ul>
      <div class="ks-switchable-content">
        <div>
          <p><a href="<?php echo $tbm_weibo;?>" target="_blank"><?php echo $tbm_weibo;?></a></p>
        </div>
        <div style="display:none;">
          <p><?php echo $shuotxt;?></p>
          <p class="add_btn"><a href="<?php echo $tbm_shuo;?>" target="_blank"><em>+</em>��ע</a></p>
        </div>
        <div style="display:none;">
          <p><?php echo $tbm_bangpaitxt;?></p>
          <p class="add_btn"><a href="<?php echo $tbm_bangpai;?>" target="_blank"><em>+</em>����</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="shopnotice_bd ft-info-wangwang">
    <ul>
      <li>
        <span class="title"><?php echo $tbm_servicehead1; ?>��</span>
        <?php
          foreach($kefu1id as $k=>$v){
            $itemName = $kefu1name[$k];
            echo "<span><em title='�����Ҳ�ͷ��'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
          } 
        ?>
      </li>
      <li>
        <span class="title"><?php echo $tbm_servicehead2; ?>��</span>
        <?php
          foreach($kefu2id as $k=>$v){
            $itemName = $kefu2name[$k];
            echo "<span><em title='�����Ҳ�ͷ��'>$itemName</em>{$uriManager->supportTag('$v','$itemName',2,false)}</span>";
          }
         ?>
      </li>
      <li class="worktime"><?php echo $tbm_worktime; ?></li>
    </ul>
  </div>
</div>