<?php
$token = Yii::$app->get("google-client")->getClient()->getAccessToken();
$accessToken = json_decode($token)->access_token;
$viewId = Yii::$app->get("google-analytics")->viewId;

$this->title = Yii::t('app', 'Home');

$googleAnalyticsJs = <<<JS
(function(w,d,s,g,js,fs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
  js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
gapi.analytics.ready(function () {
        gapi.analytics.auth.authorize({serverAuth:{access_token: '$accessToken'}});
        new gapi.analytics.googleCharts.DataChart({
            query: {
                'ids': 'ga:$viewId',
                'start-date': '30daysAgo',
                'end-date': 'yesterday',
                'metrics': 'ga:sessions,ga:percentNewSessions',
                'dimensions': 'ga:date'
            },
            chart: {
                'container': 'overview-chart',
                'type': 'LINE',
                'options': {
                    'width': '100%'
                }
            }
        }).execute();
    });        
JS;
if (Yii::$app->getUser()->can('trafic_overview')) {
    $this->registerJs($googleAnalyticsJs);
}
?>

<div class="row">
    <?php if (Yii::$app->getUser()->can('trafic_overview')): ?>
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success  pull-right"><?= Yii::t("app", "Monthly") ?></span>
                    <h5><?= Yii::t("app", "Traffic Overview") ?>&nbsp;<small><?= Yii::t("app", "Data provided by") ?>&nbsp;<a href="https://www.google.com/analytics">Google Analytis</a></small></h5>      
                </div>
                <div class="ibox-content">
                    <div id="overview-chart"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

