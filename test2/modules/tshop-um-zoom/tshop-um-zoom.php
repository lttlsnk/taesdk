<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-zoom"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-zoom">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
    $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
    $popRandom = rand(10000,20000);
    //����
    $itemGroup = $tbm_itemgroup;
    $itemRow = $tbm_modulewidth == "w750" ? 4 : 5;
    $itemNum = $itemRow*$itemGroup;
    if($tbm_resources == 1){//����Ŀ�Զ���ȡ
      if($tbm_cate){
        $ids=json_decode($cates);
        $rid=$ids[0]->{rid};
        $items=$itemManager-> queryByCategory ($rid,$tbm_orders,$itemNum);
      }
    }elseif ($tbm_resources == 2) {//�ֶ�ѡ��
      $ids = $tbm_item ? explode(',',$tbm_item) : NULL;
      if($ids){
        foreach($ids as $k=>$v){
          $items[$k]=$itemManager->queryById($v);
        }
      }
    }elseif ($tbm_resources == 3) {//���ؼ��ֻ�ȡ
      $ids = $tbm_keyword;
      $items = $itemManager->queryByKeyword($ids,$tbm_orders,$itemNum);
    }
    //Ĭ��ȡ��������
    if(!$items){
      $items = $itemManager->queryByKeyword(" ","hotsell",$itemNum);
    }
?>

  <div class="zoom <?php echo $tbm_modulewidth;?>">
    <div class="mainbox_hd zoom_hd">
      <h3><?php echo $tbm_moduletitle; ?></h3>
      <p class="link_list"><a class="first" href="<?php echo $tbm_moduletxtlink; ?>" target="_blank"><?php echo $tbm_moduletxt;?></a></p>
    </div>
    <div class="zoom_bd">
      <div class="zoom_list clear">
        <ul>
          <?php
            foreach ($items as $k => $v) {
              $item = $v;
              $pic = $item->getPicUrl(160);
                      $url = $uriManager->detailURI($item);
                      echo "<li class='itempic {$popRandom}item{$k}'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></li>";
            }
          ?>
        </ul>
      </div>
      <div class="zoom_popup">
        <?php
          foreach ($items as $k => $v) {
            $item = $v;
            $pic = $item->getPicUrl(310);
            $price = $item->price;
            $title = $item->title;
            $url = $uriManager->detailURI($item);
            $points = '["cc","cc"]';
            $config = '{
              "trigger":".'.$popRandom.'item'.$k.'",
              "align":{
                "node":".'.$popRandom.'item'.$k.'",
                "offset":[0,0],
                "points":'.$points.'
              }
            }';
            //set points ���к����ж�
            if(floor($k%$itemRow)==0){
              switch ($k%$itemGroup) {
                case 0:  $points=["tl","tl"]; break;
                case ($itemGroup-1): $points=["tr","tr"]; break;
                default: $points=["tc","tc"]; break;
              }
            }
            $shareStr = "<div class='share'></div>";
            $shareStr = $tbm_itemshare == 2 ? "" : $shareStr;
                    echo "<div class='J_TWidget hidden' data-widget-type='Popup' data-widget-config='{$config}'>".
                        "<div class='popup_item'>".
                          "<div class='pic'><a href='{$url}' style='background-image:url({$pic});' target='_blank'></a></div>".
                          "<div class='detail'>".
                            "<div class='title'><a href='{$url}' target='_blank'>".$title."</a></div>".
                            "<div class='price itemprice'><span>��".$price.".00</span><i></i></div>".
                            $shareStr.
                          "</div>".
                        "</div>".
                      "</div>";
          }
        ?>
      </div>
    </div>
  </div>




</div>
