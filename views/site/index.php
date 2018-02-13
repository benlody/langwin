<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ListView;

$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/masonry.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/imagesloaded.pkgd.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->getBaseUrl().'/js/portfolio-index.js',['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->getBaseUrl().'/css/portfolio-index.css');

$this->title = '光隆印刷廠股份有限公司 - 台北優質印刷服務';
?>
<div class="site-index">

    <div class="jumbotron">
<table width="912" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="912" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="5"><img src="image/Head/Top_inner.png" alt="光隆印刷廠股份有限公司" width="912" height="45" border="0" usemap="#Map" href="index.html" /></td>
      </tr>
      <tr cellspacing="0">
        <td><img src="image/Head/Logo.png" alt="光隆印刷廠股份有限公司創立於1954年，秉持著誠信、為客戶著想的理念，不斷改善印刷流程與效率，創造客戶更高附加價值，提供給客戶最好的設計與印刷品質，一直是我們的堅持，客戶的滿意與信任則是對我們最大的鼓舞。" width="485" height="95" /></td>
        <td><a href="about.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('About KL','','image/Head/B1-U.png',1)"><img src="image/Head/B1.png" alt="我們的優勢" name="About KL" width="105" height="95" border="0" id="About KL" /></a></td>
        <td><a href="graphic.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Our Service','','image/Head/B2-U.png',1)"><img src="image/Head/B2.png" alt="服務介紹" name="Our Service" width="105" height="95" border="0" id="Our Service" /></a></td>
        <td><a href="intlpublish.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('KL Portfolio','','image/Head/B3-U.png',1)"><img src="image/Head/B3.png" alt="精選作品" name="KL Portfolio" width="105" height="95" border="0" id="KL Portfolio" /></a></td>
        <td><a href="inquiry.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Inquiry','','image/Head/B4-U.png',1)"><img src="image/Head/B4.png" alt="我要詢價" name="Inquiry" width="112" height="95" border="0" id="Inquiry" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top">&nbsp;</td>
        <td valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td width="228" valign="top"><table width="216" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="image/LB_items/LB_1_Head.gif" width="216" height="71" /></td>
          </tr>
          <tr>
            <td><img src="image/LB_items/LB_1_1_now.gif" width="216" height="41" /></td>
          </tr>
          <tr>
            <td><a href="clients.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('clients','','image/LB_items/LB_1_2_over.gif',1)"><img src="image/LB_items/LB_1_2.gif" alt="服務的客戶" name="clients" width="216" height="41" border="0" id="clients" /></a></td>
          </tr>
          <tr>
            <td><img src="image/LB_items/LB_Butt.gif" width="216" height="10" /></td>
          </tr>
          
        </table></td>
        <td width="672" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td background="image/Inner_Frame_BG.gif"><img src="Strength/Title_1-1.gif" width="660" height="74" /></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><p class="style2 style3">近一甲子的服務歲月　三千多個客戶的見證　造就屹立不搖的奇蹟
                  
                  </p>
                  <p class="style5">光隆由專業的經營管理、具多年經驗的資深設計及印刷服務團隊所組成。我們協助眾多企業、組織進行印刷品的整合規劃與製作，專注於提供全面的印刷整合服務，在有限的時間與金錢之下，幫您想更多、做更多、贏更多。</p>
                  <p class="style5">光隆創立於1954年，秉持著誠信、為客戶著想的理念，不斷的e化改善印刷流程與效率、時時更新軟硬體設備，朝向高附加價值、精緻及新構思之方向，來滿足客戶的需求，以永續經營為目標；提供給客戶最好的服務與創造更多的產品價值，一直是我們的堅持，客戶的滿意與信任則是對我們最大的鼓舞。 </p>
                  <p class="style5">選擇光隆 Always right！ </p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><img src="Strength/Title_1-2.gif" width="660" height="74" /></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><ul class="style6">
                  <li class="style7">整合多媒體設計與印刷                    </li>
                  <li class="style7">設計兼顧品質與效率                    </li>
                  <li class="style7">快速服務與單一窗口                    </li>
                  <li class="style7">提供少量印刷與客製化服務 </li>
                </ul></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><img src="Strength/Title_1-3.gif" width="660" height="74" /></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="style5">創新思維　精湛品質　效率作業　尊客精神　熱忱服務　專業技術　合理價格</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif">&nbsp;</td>
          </tr>
          <tr>
            <td background="image/Inner_Frame_BG.gif"><img src="image/Inner_Frame_butt.gif" width="660" height="15" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="image/UnderBar.gif" alt="光隆印刷廠股份有限公司創立於1954年，秉持著誠信、為客戶著想的理念，不斷改善印刷流程與效率，創造客戶更高附加價值，提供給客戶最好的設計與印刷品質，一直是我們的堅持，客戶的滿意與信任則是對我們最大的鼓舞。" width="912" height="116" /></td>
  </tr>
</table>

    </div>

    <div class="body-content">

        <div class="row">

        </div>

    </div>

<div class="portfolio-index">
    

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'id' => 'my-listview-id',
            'layout' => '<div class="waterfall">{items}</div>{pager}',
            'itemView' => function ($model, $key, $index, $widget) {
                return '<div class="waterfall-item"><a href="'.
                        Yii::$app->request->getBaseUrl().'?r=portfolio%2Fview&amp;id='.urlencode($model->portfolio_id).
                        '"><img src="'.Yii::$app->request->getBaseUrl().'/images/'.$model->portfolio_id.'/'.$model->thumb.
                        '"></a>'.$model->title.'<br>'.$model->content.'</div>';
            },
        ]); 
        ?>

</div>


</div>
