<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-waterfall"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-waterfall" style = "height:1200px;position:relative;overflow:hidden;">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  //test data
  // $arr = array(
  // "http://img04.taobaocdn.com/bao/uploaded/i4/T1HC_oXcJkXXX0Bi70_035639.jpg_310x310.jpg",
  // "http://img03.taobaocdn.com/bao/uploaded/i3/T1QYnoXedsXXcokjc1_041606.jpg_220x220.jpg"
  // );


  //
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //main
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //self value
  $columNum = $tbm_area_show == "950" ? 4 : 5;
  $itemNum = 3; //Ĭ��ÿ��ȡ��������
  $itemWidth = 220; //ͼƬ���
  $itemsArr = array();
  $picsArr = array();
  for($i=1; $i<=$columNum; $i++){
    $ids = ${'b_item'.$i} ? explode(',',${'tbm_item'.$i}) : NULL;
    $items = $itemManager->queryByIds($ids,'');
    if(!$items){//Ĭ��ȡ��������ǰ3��
      $items = $itemManager ->queryByKeyword(" ","hotsell",$itemNum);
    };
    //�Զ���ͼƬ
    $picsArr[$i] = explode("|", ${'tbm_pic'.$i});
    $itemsArr[$i] = $items;
  }
?>

<div class="hd">
  <h3><?=$tbm_title_name?></h3>
  <p class="link_list"><a href="<?=$tbm_title_morelink?>" target="_blank"><?=$tbm_title_more?></a></p>
</div>
<div class="bd">
    <?php
      foreach ($itemsArr as $k => $v) {
        $items = $v;
        $itemsPic = $picsArr[$k];;
        $endClass = $k == $columNum ? "end" : "";
        //render
        echo "<ul class=".$endClass.">";
        //items
        foreach ($items as $k => $v) {
          $item = $v;
          $defPic = $itemsPic[$k];
          $pic = $defPic ? $defPic : $item->getPicUrl($itemWidth);
          $price = $item->price;
          $title = $item->title;
          $sale =$item->soldCount;
          $url = $uriManager->detailURI($item);
          echo "<li>".
              "<div class='pic'><a href='{$url}' target='_blank'><img src='{$pic}' /></a></div>".
              "<div class='info'>".
              "</div>".
            "</li>";
        }
        echo "</ul>";
      }
    ?>
</div>

<!-- <div class="pubu">


<?for ($i=0;$i<4;$i++){
  $ids = explode(',',$_MODULE['idem'.$i]);
  $idem =  $itemManager->queryByIds($ids,''); 

  if(count($idem)<=0) {
  $idem = $itemManager->queryByKeyword ("","hotsell",3); 
  }
  $zdtu = explode('|',$_MODULE['zdtu'.$i]); 
?> 


  <ul class="<?if($i == 3) echo 'end'  ?> " style="display:none;">
  
    <?for ($c=0;$c<count($idem);$c++){ ?>
  
    <li>
      <h4>
          <a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?> " target="_blank" style="display:block;">
            <img style = "float:left;display:block;width:210px;" src = "<?if($zdtu[$c]) echo $zdtu[$c] else echo $arr[0]  ?> "/>
                </a>      
      
      </h4>
      

      
      <h3>
        <span>
        
            <a href="http://favorite.taobao.com/popup/add_collection.htm?id=<?php echo $idem[$c]->id; ?>&itemtype=1&scjjc=1">
                <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_sc.jpg">
          </a>
          
          <a href="<? if($idem[$c]) echo $uriManager->detailURI($idem[$c]) else echo '#'  ?>">
          
              <img src="http://img04.taobaocdn.com/L1/142/1097795/modules/tshop-um-pubu950/assets/images/pubu950_gm.jpg">
          </a>
          
          
        </span>
        <strong>��:<?if($idem[$c]) echo $idem[$c]->price else echo '200'  ?> </strong>
        ����<? if($idem[$c]) echo $idem[$c]->soldCount else echo '300' ?> ��
        
        
      </h3>
      
      
      
    </li>
    
    
    <? }?> 
  
  </ul>

  
<?}?> 
   -->
  
  
  
</div>
