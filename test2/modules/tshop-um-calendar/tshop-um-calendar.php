<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-calendar"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-calendar">
<?php
/**
 * 开始设计PHP页面
 */
  extract($_MODULE, EXTR_PREFIX_ALL | EXTR_OVERWRITE, 'tbm');
  //main
  $pageLinks =$shopManager->getShopPageLinks();
  $shopUrl = $pageLinks[0]->href;
  //self value
  for($i=1;$i<=5;$i++){
    $date = ${'tbm_date'.$i};
    $pic = ${'tbm_pic'.$i};
    $link = ${'tbm_link'.$i};
    if($date){
      $dataArr['date'.$i] = $date;
      $dataArr['pic'.$i] = $pic ? $pic : "assets/images/calendar.jpg";
      $dataArr['link'.$i] = $link ? $link : "#";
    }
  }
  if(!$dataArr){
    $dataArr = array(
      "date1"=>2, "pic1"=>"assets/images/calendar.jpg", "link1"=>"#",
      "date2"=>8, "pic2"=>"assets/images/calendar.jpg", "link2"=>"#",
      "date3"=>16, "pic3"=>"assets/images/calendar.jpg", "link3"=>"#"
    );
  }
  $dataLen = count($dataArr)/3;
  //date
  $nowdate = date("Y-m-d");
  $arrdate = explode("-",$nowdate); 
  $total = date("t",mktime(0,0,0,$arrdate[1],1,$arrdate[0]));
  $nullday = date("w",mktime(0,0,0,$arrdate[1],1,$arrdate[0]));
  $weekarray=array("日","一","二","三","四","五","六");  
  $today = date("Y年m月d日")." 星期".$weekarray[date("w")];
?>
  <div class="calendar">
    <div class="calendar_con">
      <div class="calendar_date">
        <div class="now">
          <p class="title">活动预告日历</p>
          <p class="today">今天是<?php echo $today; ?></p>
        </div>
        <div class="list">
          <ul>
                <?php
                  //day title
                  foreach ($weekarray as $k => $v) {
                    echo "<li class='weekday day'>".$v."</li>";
                  }
                  //day
                  for($i=0; $i<42; $i++){
                    if($i<$nullday) {
                      if(($total+$nullday-(35+$i))>0){
                        $day = (35-$nullday+$i+1);
                      }else{
                        $day = "";
                      }
                    }else {
                      if(($i-$nullday+1)<=$total){
                        $day = $i-$nullday+1;
                      }else{
                        $day = "";
                      }
                    }
                    echo "<li class='day'>".$day."</li>";
                  }
            ?>
          </ul>
        </div>
      </div>
      <div class="calendar_slide J_TWidget" data-widget-type="Carousel" data-widget-config="{
            'effect': 'scrollx',
        'easing': 'easeOutStrong', 
            'steps':1, 
            'viewSize': [655], 
            'circular': false
          }">
            <div class="calendar_content">
              <div class="ks-switchable-content">
              <?php
                for ($i=1; $i <= $dataLen; $i++) {
                  $pic = $dataArr['pic'.$i];
                  $link = $dataArr['link'.$i];
                  echo "<a href='{$link}' style='background-image:url({$pic});' target='_blank'></a>";
                }
              ?>
              </div>
            </div>
            <ul class="ks-switchable-nav">
              <?php
                for ($i=1; $i <= $dataLen; $i++) {
                  $date = $dataArr['date'.$i];
                  $url = $dataArr['link'.$i];
                  //nav 32-33 37-28
                  if($date+$nullday-30>0){
                    $left=($date+$nullday-1)%7*37;
                $top=(ceil(($date+$nullday)/7)-1)*28+1;
              }else{
                $left=($date+$nullday-1)%7*37;
                $top=(ceil(($date+$nullday)/7)-1)*28+1;
              }
              $first = $i==1 ? "class='ks-active'" : "";
              $shareStr = "";
              echo "<li {$first}><em class='day' style='top:{$top}px; left:{$left}px;'>".$date."</em>".$shareStr."</li>";
                }
              ?>
            </ul>
          </div>
    </div>
  </div>
</div>
