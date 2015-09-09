<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\models\EmployeeSearch $searchModel
 */
$this->title = Yii::t('employee', 'Employees List');
$this->params['breadcrumbs'][] = $this->title;
$employees = $dataProvider->getModels();
?>

<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('employee', 'Add New'), ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php $this->endBlock() ?>

<div class="employee-index">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox">
                <div class="ibox-content">
                    <form>
                        <div class="input-group">
                            <input type="text" placeholder="Search employee (full name, user name, email) " class="input form-control" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : "" ?>">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"><i class = "fa fa-search"></i> Search</button>
                            </span>
                        </div>
                    </form>
                    <div class = "employees-list">
                        <div class = "full-height-scroll">
                            <div class = "table-responsive">
                                <div class = "grid-view">
                                    <table class = "table table-striped table-bordered table-hover">                                    
                                        <tbody>
                                            <?php foreach ($employees as $employee):
                                                ?>
                                                <tr>
                                                    <td class="employee-avatar">
                                                        <?php if ($employee->avatar == null): ?>
                                                            <img alt="image" src="/img/default-avatar/28.jpg">                                                            
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tab" href="#employee-<?= $employee->id ?>" class="client-link"><?= $employee->fullname ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $employee->username ?>
                                                    </td>
                                                    <td>
                                                        <?= $employee->email ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>                                        
                                    </table>           
                                    </tr>
                                    <div class="summary">Showing <b>21-40</b> of <b>100</b> items.</div>
                                    <?= LinkPager::widget([ 'pagination' => $dataProvider->getPagination()]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="tab-content">
                        <?php $fistItem = true; ?>
                        <?php foreach ($employees as $employee): ?>
                            <div id="employee-<?= $employee->id ?>" class="tab-pane <?= $fistItem ? "active" : "" ?>">
                                <?= $this->render('_view', ['employee' => $employee]) ?>           
                            </div>
                            <?php $fistItem = false; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
