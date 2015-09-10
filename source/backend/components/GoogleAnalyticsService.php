<?php

namespace backend\components;

use yii\base\Exception;

/**
 * Description of GoogleAnalyticsService
 *
 * @author john
 */
class GoogleAnalyticsService extends BaseGoogleService {

    public $viewId;

    protected function getGoogleServiceClassName() {
        return "\Google_Service_Analytics";
    }

    protected function request() {
        return $this->getService()->data_ga->get('ga:' . $this->viewId, '7daysAgo', 'today', 'ga:sessions');
    }

}
