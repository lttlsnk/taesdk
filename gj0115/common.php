<?php
/**
 ���ݹ���
 1.��������ģ�����ݹ���
 2.���ļ�����ģ��֮�乲�����Ķ��壬�����ս��ϲ������ʦģ��phpҳ��
 */
?>
<?php
/**
 * ��ʼ��дģ�鹲����
 */
  //main vars
  $globalUrl = "../../assets/images";
  $assetsUrl = "assets/images/";
  $pageLinks =$shopManager->getShopPageLinks();
  //shop
  $shopUrl = $pageLinks[0]->href;   //��������
  $shopId = $_shop->id;   //����ID
  $shopTitle = $_shop->title;   //���̱���
  $shopIntr = $uriManager->shopIntrURI();   //���̽���
  $shopFavorite = $uriManager->favoriteLink();  //�����ղ�
  $shopRate = $uriManager->rateURI();   //��������
  //item
  $allProduct = $uriManager->searchURI();   //���б���
  //user
  $userNick=$_user->nick;   //�����ǳ�


  
  //main fun
  //share btn config::return str
  function getShareConfig($type,$key,$title){
    $shareConfig = '{'.
      '"type":"'.$type.'",'.
      '"key":"'.$key.'",'.
      // '"title":"'.$title.'",'.
      '"skinType":"1",'.
      '"client_id":"68"'.
    '}';
    return $shareConfig;
  }
?>