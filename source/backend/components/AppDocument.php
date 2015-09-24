<?php

namespace backend\components;

use Yii;
use yii\base\Component;
use backend\components\AppDocumentCategory;
use backend\components\AppDocumentFile;
use yii\helpers\ArrayHelper;
use cebe\markdown\Markdown;

/**
 * Description of GoogleClient
 *
 * @author john
 */
class AppDocument extends Component {

    public $categories;
    public $root;
    private $rootPath;
    private $categoryObjArr;

    public function init() {
        parent::init();
        $this->rootPath = Yii::getAlias($this->root);
    }

    /**
     * Get all of document category
     * @return AppDocumentCategory[]
     */
    public function findAllCategories() {
        if ($this->categories == null) {
            return [];
        } else if ($this->categoryObjArr === null) {
            $this->categoryObjArr = [];
            foreach ($this->categories as $categoryConfig) {
                if (ArrayHelper::remove($categoryConfig, 'visiable', true)) {
                    $this->categoryObjArr[] = new AppDocumentCategory($categoryConfig);
                }
            }
        }
        return $this->categoryObjArr;
    }

    /**
     * find category by path of category
     * @param string $path
     * @return AppDocumentCategory|null
     */
    public function findCategoryByPath($path) {
        foreach ($this->getAllCategories() as $category) {
            if ($category->dirName === $path) {
                return $category;
            }
        }
        return null;
    }

    /**
     * 
     * @param string $path
     * @return boolean
     */
    public function isAvaiableLanguage($path) {
        return file_exists($this->rootPath . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . Yii::$app->language);
    }

    /**
     * 
     * @param string $path
     * @return AppDocumentFile
     */
    public function findAllArticles($path) {
        $fullPath = $this->rootPath . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . Yii::$app->language;
        $result = [];
        foreach (glob($fullPath . DIRECTORY_SEPARATOR . '/*.md') as $file) {
            $result[] = new AppDocumentFile(str_replace($this->rootPath . DIRECTORY_SEPARATOR, "", $file));
        }
        usort($result, function($a, $b) {
            return $a->order > $b->order;
        });
        return $result;
    }

    public function readArticle($path) {
        $fullPath = $this->rootPath . DIRECTORY_SEPARATOR . $path;
        $md = new Markdown();
        $content = $md->parse(file_get_contents($fullPath));
        return <<<HTML
         <div class="panel">
            <div class="panel-body" style="min-height:500px">
               $content
            </div>
        </div>
HTML;
    }

}
