<?php

namespace backend\components;

use yii\base\Exception;

/**
 * Description of GoogleAnalyticsService
 *
 * @author john
 */
class GoogleAnalyticsService extends BaseGoogleService {

    protected function getGoogleServiceClassName() {
        return "\Google_Service_Analytics";
    }

}
