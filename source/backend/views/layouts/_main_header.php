<?php

use yii\helpers\Html;
?>
<div class="row border-bottom">
    <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!--            <form role="search" class="navbar-form-custom" method="post" onsubmit="alert('This feature still develop. It comming soon!!!');
                                return false;">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>-->
        </div>
        <ul class="nav navbar-top-links navbar-right">           
            <li>
                <?=
                Html::a('<i class="fa fa-sign-out"></i> ' . Yii::t('app', 'Log out'), ["/sign/out"], [
                    'data' => [
                        'method' => 'post',
                    ]
                ])
                ?>                
            </li>
        </ul>

    </nav>
</div>
