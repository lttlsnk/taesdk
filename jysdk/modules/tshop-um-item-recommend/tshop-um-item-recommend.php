<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-item-recommend"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="skin-box tb-module tshop-pbsm tshop-pbsm-shop-item-recommend tshop-um tshop-um-item-recommend">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value @_@
  $itemline = "item".$tbm_itemline."line1";
  $itempro = explode("@_@", $tbm_itempro);
  $itemproArr = array("sprice"=>false, "soldCount"=>false, "ratesNum"=>false, "ratesDetail"=>false);
  foreach($itempro as $k=>$v){
    switch ($v) {
      case 'sprice':
        $itemproArr[sprice] = true;
        break;
      case 'soldCount':
        $itemproArr[soldCount] = true;
        break;
      case 'ratesNum':
        $itemproArr[ratesNum] = true;
        break;
      case 'ratesDetail':
        $itemproArr[ratesDetail] = true;
        break;
    }
  }
  //item data
  $itemNum = $tbm_itemnum ? $tbm_itemnum : 3;
  $itemArr = array(
    array("url"=>"http://img02.taobaocdn.com/bao/uploaded/i2/T1xga_XctoXXbWHc6a_120455.jpg", "title"=>"���������������� ���������������� ���������������� ����������������", "link"=>"#", "price"=>"256.0", "sprice"=>"256.0", "soldCount"=>"207", "ratesNum"=>"1566", "ratesDetail"=>"һ�����ۣ����36�����֣��������ֽض�һ�����ۣ����36�����֣��������ֽض�"),
    array("url"=>"http://img04.taobaocdn.com/bao/uploaded/i4/T1UJYqXcpnXXXOA3Hb_124154.jpg", "title"=>"���������������� ���������������� ���������������� ����������������", "link"=>"#", "price"=>"256666.0", "sprice"=>"256666.0", "soldCount"=>"207", "ratesNum"=>"1566", "ratesDetail"=>"һ�����ۣ����36�����֣��������ֽض�һ�����ۣ����36�����֣��������ֽض�"),
    array("url"=>"http://img04.taobaocdn.com/bao/uploaded/i4/T1YpYrXdJmXXcKNO71_041600.jpg", "title"=>"���������������� ���������������� ���������������� ����������������", "link"=>"#", "price"=>"88888888.0", "sprice"=>"88888888.0", "soldCount"=>"1", "ratesNum"=>"1", "ratesDetail"=>"һ�����ۣ����36�����֣��������ֽض�һ�����ۣ����36�����֣��������ֽض�")
  );
?>
  <div class="skin-box-hd">
      <i class="hd-icon"></i>
      <h3>
          <span>�����Ƽ�3�в���</span>
      </h3>
      <div class="skin-box-act">
          <a href="http://shop51186914.daily.taobao.net/list.htm?search=y&orderType=coefp_desc" class="more">����></a>
      </div>
  </div>
  <div class="skin-box-bd">
      <div class="<?php echo $itemline?>">
          <?php
            for($i=1; $i<=$itemNum; $i++){
              $num = $i>3 ? rand(1,3): $i;
              $item = $itemArr[$num-1];
              $last = $i%$tbm_itemline==0 ? "last" : "";
              //show pro
              $sprice = ""; $soldCount = ""; $ratesNum = ""; $ratesDetail = "";
              if($itemproArr["sprice"]){
                $sprice = "<div class='sprice-area'>
                            ԭ�ۣ�<span class='s-price'>".$item[sprice]."</span>
                          </div>";
              }
              if($itemproArr["soldCount"]){
                $soldCount = "<div class='sale-area'>
                                ���ۣ�<span class='sale-num'>".$item[soldCount]."</span>��
                            </div>";
              }
              if($itemproArr["ratesNum"]){
                $ratesNum = "<div class='title'>
                                <h4>
                                    ����(<a href='#'>".$item[ratesNum]."</a>)
                                </h4>
                            </div>";
              }
              if($itemproArr["ratesDetail"]){
                $ratesDetail = "<p class='rate J_TRate'>".$item[ratesDetail]."</p>";
              }
              if($ratesNum || $ratesDetail){
                $rates = "<dd class='rates'>".$ratesNum.$ratesDetail."</dd>";
              }
              //redner
              echo "<dl class='item {$last}'  data-id=''>".
                "<dt class='photo'>
                  <a href='#'><img src='{$item[url]}' />
                  </a>
                </dt>".
                "<dd class='detail'>
                    <a class='item-name' href='#'>".$item[title]."</a>
                    <div class='attribute'>
                        <div class='cprice-area'>
                            �۸�<span class='c-price'>".$item[price]."</span>
                        </div>
                        ".$sprice.$soldCount."
                    </div>
                </dd>".
                $rates.
              "</dl>";
            }
          ?>
      </div>
  </div>
</div>