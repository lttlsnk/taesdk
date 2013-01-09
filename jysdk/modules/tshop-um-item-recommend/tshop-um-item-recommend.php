<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-item-recommend"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="skin-box tb-module tshop-pbsm tshop-pbsm-shop-item-recommend tshop-um tshop-um-item-recommend">
<?php
/**
 * 开始设计PHP页面
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
    array("url"=>"http://img02.taobaocdn.com/bao/uploaded/i2/T1xga_XctoXXbWHc6a_120455.jpg", "title"=>"宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述", "link"=>"#", "price"=>"256.0", "sprice"=>"256.0", "soldCount"=>"207", "ratesNum"=>"1566", "ratesDetail"=>"一条评论，最多36个汉字，超出部分截断一条评论，最多36个汉字，超出部分截断"),
    array("url"=>"http://img04.taobaocdn.com/bao/uploaded/i4/T1UJYqXcpnXXXOA3Hb_124154.jpg", "title"=>"宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述", "link"=>"#", "price"=>"256666.0", "sprice"=>"256666.0", "soldCount"=>"207", "ratesNum"=>"1566", "ratesDetail"=>"一条评论，最多36个汉字，超出部分截断一条评论，最多36个汉字，超出部分截断"),
    array("url"=>"http://img04.taobaocdn.com/bao/uploaded/i4/T1YpYrXdJmXXcKNO71_041600.jpg", "title"=>"宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述 宝贝描述宝贝描述", "link"=>"#", "price"=>"88888888.0", "sprice"=>"88888888.0", "soldCount"=>"1", "ratesNum"=>"1", "ratesDetail"=>"一条评论，最多36个汉字，超出部分截断一条评论，最多36个汉字，超出部分截断")
  );
?>
  <div class="skin-box-hd">
      <i class="hd-icon"></i>
      <h3>
          <span>宝贝推荐3列布局</span>
      </h3>
      <div class="skin-box-act">
          <a href="http://shop51186914.daily.taobao.net/list.htm?search=y&orderType=coefp_desc" class="more">更多></a>
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
                            原价：<span class='s-price'>".$item[sprice]."</span>
                          </div>";
              }
              if($itemproArr["soldCount"]){
                $soldCount = "<div class='sale-area'>
                                已售：<span class='sale-num'>".$item[soldCount]."</span>笔
                            </div>";
              }
              if($itemproArr["ratesNum"]){
                $ratesNum = "<div class='title'>
                                <h4>
                                    评论(<a href='#'>".$item[ratesNum]."</a>)
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
                            价格：<span class='c-price'>".$item[price]."</span>
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