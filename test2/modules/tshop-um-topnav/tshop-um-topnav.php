<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-topnav"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-topnav">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $systemNavTitle = $tbm_systemnavtitle ? explode("|",$tbm_systemnavtitle) : array("���̽���","��������");
  $systemNavLink = $tbm_systemnavlink ? explode("|",$tbm_systemnavlink) : array("#","#");
  $catesLink = 'http://shop'. $shopId .'.taobao.com/?search=y';
  $allShopCategory = $shopCategoryManager->queryAll();
  //self set
  $fontColor = $tbm_fontcolor ? $tbm_fontcolor : "#FFF";
  $bgColorHover = $tbm_bgcolorhover ? $tbm_bgcolorhover : "#FFF";
?>
  <div class="topnav_con">
    <div class="menu">
      <ul>
        <li><a href="<?php echo $shopUrl; ?>">��ҳ</a></li>
        <?php
          if($tbm_catesshow == 1){
            echo '<li class="all_cates"><a href="'.$catesLink.'" target="_blank"><span>ȫ������</span><i></i></a></li>';
          }
          if($tbm_catesshow == 1){
            echo '<li><a href="'.$shopRate.'" target="_blank">��������</a></li>';
          }
          //���ֵ���ģʽ
          if($tbm_navmode == 3){//�Զ�����ģʽ
            /*$shopUrl2 = str_replace('.mall.taobao.com', '.tmall.com', $uriManager->searchURI());
            $index =explode('?',$shopUrl2);
            $links = $shopManager->getShopPageLinks();
            for($i=1; $i<count($links); $i++){
              $link = $links[$i];
              $url = $link->href;
              $text = $link->text;
              if (preg_match('/\/.*(view_page-|pageId=)(\d+)/', $url, $matches)) {
                $url = $index[0].'view_page-'.$matches[2].'.htm';
              }
              echo'<li><a target="_blank" href="'.$url.'">'.$text.'</a></li>';
            }*/
            foreach ($systemNavTitle as $k=> $v) {
              echo '<li><a href="'.$systemNavLink[$k].'" target="_blank">'.$v.'</a></li>';
            }
            echo '</ul>';
          }else{
            if($tbm_navmode == 1){//ϵͳ����
              $curCategory = $allShopCategory;
            }else if($tbm_navmode ==2){//ѡ����ർ��
              $curCategory = array();
              $curSubCategory = array();
              $curCategoryData = $tbm_selectcates;
              $curCategoryData = json_decode($curCategoryData);
              foreach($curCategoryData as $k=>$v){
                $cate = $shopCategoryManager-> queryById ($v->{rid});
                array_push($curCategory, $cate);
                //sub
                if($v->childIds){
                  $sub_cate_data = explode(",",$v->childIds);
                  $sub_cate_arr = array();
                  foreach($sub_cate_data as $subcate){
                    $sub_cate = $shopCategoryManager-> queryById ($subcate);
                    array_push($sub_cate_arr, $sub_cate);
                  }
                  $curSubCategory[$k] = $sub_cate_arr;
                }
              }
            }
            // һ����Ŀ
            foreach($curCategory as $shopCategory){
              //һ����Ŀ
              $cate_url  = $uriManager->shopCategoryURI($shopCategory); //
                  $cate_name = $shopCategory->name;
                  $cate_id = $shopCategory->id;
              echo '<li><a href="'.$cate_url.'" class="cate'.$cate_id.'">'.$cate_name.'</a></li>';  
            }
            echo '</ul>';
            //������Ŀ
            foreach($curCategory as $k => $shopCategory){
              $cate_name = $shopCategory->name;
              $cate_id = $shopCategory->id;
              if($tbm_navmode ==2){
                $subCategories = $curSubCategory[$k];
              }else{
                $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
              }
              if ($subCategories){
                $pop_config = "{
                  'trigger':'.cate".$cate_id."',
                  'align':{
                    'node':'.cate".$cate_id."',
                    'offset':[0,0],
                    'points':['bl','tl']
                  }
                }";
                echo '<div class="J_TWidget cate_sub hidden" data-widget-type="Popup" data-widget-config="'.$pop_config.'">'.
                  '<div class="hd">'.
                  '<a href="'.$cate_url.'" class="cate'.$cate_id.'">'.$cate_name.'</a>'.
                  '</div>'.
                  '<div class="bd"><dl>';
                foreach($subCategories as $subCategory){
                  $sub_cate_url = $uriManager->shopCategoryURI($subCategory);
                  $sub_cate_name = $subCategory->name;
                  echo '<dd><a href="'.$sub_cate_url.'">'.$sub_cate_name.'</a></dd>';
                }
                echo '</dl></div></div>';
              }
            }
          }
        ?>
      <!-- </ul> -->
    </div>
    <!--ȫ�����൯���� star-->
    <div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
      'trigger':'.all_cates',
      'align':{
        'node':'.all_cates',
        'offset':[10,0],
        'points':['bl','tl']
    }
    }">
      <div class="cates_popup">
        <div class="hd">
          <a href="<?php echo $catesLink; ?>" target="_blank"><span>ȫ������</span><i></i></a>
        </div>
        <div class="bd">
          <dl>
            <dt><a href="<?php echo $allProduct; ?>" target="_blank">�鿴���б���&gt;&gt;</a></dt>
            <dd>
              <a href="<?php echo $allProduct; ?>&orderType=_hotsell" target="_blank">������</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=_newOn" target="_blank">����Ʒ</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=price" target="_blank">���۸�</a><span>|</span>
              <a href="<?php echo $allProduct; ?>&orderType=_hotkeep" target="_blank">���ղ�</a>
            </dd>
            <?php
              foreach($allShopCategory as $shopCategory){
                //һ����Ŀ
                $cate_url  = $uriManager->shopCategoryURI($shopCategory); //
                    $cate_name = $shopCategory->name;
                echo '<dt><a href="'.$cate_url.'">'.$cate_name.'</a></dt>';
                //������Ŀ
                $subCategories = $shopCategoryManager-> querySubCategories ($shopCategory->id);
                if ($subCategories){
                  echo '<dd>';
                  foreach($subCategories as $subCategory){
                    $sub_cate_url = $uriManager->shopCategoryURI($subCategory);
                    $sub_cate_name = $subCategory->name;
                    echo '<a href="'.$sub_cate_url.'">'.$sub_cate_name.'</a><span>|</span>';
                  }
                  echo '</dd>';
                }
              }
            ?>
          </dl>
        </div>
      </div>
    </div>
    <!--ȫ�����൯���� end-->
  </div>
</div>