<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-categories"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-categories">
<?php
/**
 * ��ʼ���PHPҳ��
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //self value
  $searchUrl = $uriManager->searchURI();
  $catesLink = 'http://shop'. $_shop->id .'.taobao.com/?search=y';
  //��������
  $cateArr = array();
  if($tbm_catedata == 1){//�ֶ���д
    for($i=1; $i<=6; $i++){
      $title = ${'tbm_cate'.$i.'_title'};
      if($title){
        $link = ${'tbm_cate'.$i.'_link'};
        $cateArr['title'.$i] = $title;
        $cateArr['link'.$i] = $link;
        //sub
        $cateArr['subtitle'.$i] = explode("|", ${'tbm_cate'.$i.'_sub'});
        $cateArr['sublink'.$i] = explode("|", ${'tbm_cate'.$i.'_sublink'});
        $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
      }
    }
  }elseif ($tbm_catedata == 2) {//�Զ���ȡ
    $allCategory = $shopCategoryManager->queryAll();
    foreach ($allCategory as $k => $cate) {
      $i = $k + 1;
      $cateArr['title'.$i] = $cate->name;
      $cateArr['link'.$i] = $uriManager->shopCategoryURI($cate);
      //sub
      $subCategories = $shopCategoryManager-> querySubCategories($cate->id);
      foreach ($subCategories as $subKey => $subValue) {
        $cateArr['subtitle'.$i][$subKey] = $subValue->name;
        $cateArr['sublink'.$i][$subKey] = $uriManager->shopCategoryURI($subValue);
      }
      $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
    }
  }elseif ($tbm_catedata == 3) {//�ֶ�ѡ��
    $selectCategory = json_decode($tbm_cateselect);
    foreach ($selectCategory as $k => $v) {
      $i = $k + 1;
      $cate = $shopCategoryManager-> queryById ($v->{rid});
      $cateArr['title'.$i] = $cate->name;
      $cateArr['link'.$i] = $uriManager->shopCategoryURI($cate);
      //sub
      $subCategories = explode(",",$v->childIds);
      foreach ($subCategories as $subKey => $subValue) {
        $sub_cate = $shopCategoryManager-> queryById ($subValue);
        $cateArr['subtitle'.$i][$subKey] = $sub_cate->name;
        $cateArr['sublink'.$i][$subKey] = $uriManager->shopCategoryURI($sub_cate);
      }
      $cateArr['subhot'.$i] = explode("|", ${'tbm_cate'.$i.'_subhot'});
    }
  }
?>
  <div class="mainbox_hd categories_hd">
    <h3><?=$tbm_moduletitle; ?></h3>
    <p class="link_list">
      <a href="<?php echo $catesLink; ?>" target="_blank">�鿴���з���&gt;&gt;</a>
      <a href="<?php echo $searchUrl; ?>&orderType=_hotsell" target="_blank">������</a>
          <a href="<?php echo $searchUrl; ?>&orderType=_newOn" target="_blank">����Ʒ</a>
          <a href="<?php echo $searchUrl; ?>&orderType=price" target="_blank">���۸�</a>
          <a href="<?php echo $searchUrl; ?>&orderType=_hotkeep" target="_blank">���ղ�</a>
    </p>
  </div>
  <div class="categories_bd clear">
      <dl>
        <?php
          $len = count($cateArr)/5;
          for($i=1; $i<=$len; $i++){
            $title = $cateArr['title'.$i];
            if($title){
              $link = $cateArr['link'.$i];
              echo "<dt><a href='{$link}' target='_blank'>".$title."</a></dt>";

              //sub
              echo "<dd>";
              $sub = $cateArr['subtitle'.$i];
              foreach ($sub as $k => $v) {
                $sub_title = $cateArr['subtitle'.$i][$k];
                $sub_link = $cateArr['sublink'.$i][$k];
                $sub_class = "hot_".$cateArr['subhot'.$i][$k];
                $sub_divide = $k == (count($sub)-1) ? "" :"  |";
                echo "<a class='{$sub_class}' href='{$sub_link}' target='_blank'>".$sub_title."</a>".$sub_divide;
              }
              echo "</dd>";
            }
          }
        ?>
      </dl>
    </div>
</div>