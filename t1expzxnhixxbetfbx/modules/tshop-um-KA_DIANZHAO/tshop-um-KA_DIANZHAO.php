

<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-KA_DIANZHAO"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */


 $style = "text-decoration:$_MODULE[str_x]; color:$_MODULE[str_color]; font-size:$_MODULE[str_size]; font-weight:$_MODULE[str_weight]";
 /***********������***********/
 $_MODULE['dianzhao_left']=="" ? $dianzhao_left = NULL:$dianzhao_left=$_MODULE['dianzhao_left'];
 $_MODULE['dianzhao_left_href']=="" ? $dianzhao_left_href = NULL:$dianzhao_left_href=$_MODULE['dianzhao_left_href'];
 $dianzhao_left = explode("|", $dianzhao_left);
 $dianzhao_left_href = explode("|",$dianzhao_left_href);
 $len_left = count($dianzhao_left);
 $i=0;
 
 foreach($dianzhao_left as $val_left)
 {
	 $i++;
	 if($i<$len_left)
	 {
		 $str = '&nbsp;'.$_MODULE['str'].'&nbsp;';
	 }else{
		 $str = NULL;
		}
	$dianzhao_left_html .= "<a style=\"".$style."\" href=\"".$dianzhao_left_href[$i-1]."\" target=\"".$_MODULE['target']."\" title=\"".$val_left."\">".$val_left.$str."</a>"; 
 }
 /***********������***********/
 $_MODULE['dianzhao_right']=="" ? $dianzhao_right = NULL:$dianzhao_right=$_MODULE['dianzhao_right'];
 $_MODULE['dianzhao_right_href']=="" ? $dianzhao_right_href = NULL:$dianzhao_right_href=$_MODULE['dianzhao_right_href'];
 $dianzhao_right = explode("|", $dianzhao_right);
 $dianzhao_right_href = explode("|",$dianzhao_right_href);
 $len_right = count($dianzhao_right);
 $j=0;
 foreach($dianzhao_right as $val_right)
 {
	 $j++;
	 if($j<$len_right)
	 {
		 $str = '&nbsp;&nbsp;'.$_MODULE['str'].'&nbsp;&nbsp;';
	 }else{
		 $str = NULL; 
	 }
	$dianzhao_right_html .= "<a style=\"".$style."\" href=\"".$dianzhao_right_href[$j-1]."\" target=\"".$_MODULE['target']."\" title=\"".$val_right."\">".$str.$val_right."</a>"; 
 }
 $background = "background:url($_MODULE[dianzhao_center]) $_MODULE[alignment] $_MODULE[repeat]";
?>
<div class="tb-module tshop-um tshop-um-KA_DIANZHAO">
	<div class="dianzhao_left">
        <?php echo $dianzhao_left_html;?>
    </div>
    <div class="dianzhao_center" style="<?php echo $background;?>"></div>
    <div class="dianzhao_right">
        <?php echo $dianzhao_right_html;?>
    </div>
</div>
<?php
/********************************************
 * ��  ����SA.1.0                           *
 * ʱ  �䣺2012.10.13 PM                    *
 * ��  �ߣ�Allen                            *
 * ��  �̣�http://xjcqc.taobao.com          *
 * ��ϵQQ��584643662��ϣ��������Ϊ���ѣ���  *
 * T E L: 18623601682                       *
 ********************************************/ 
 ?>