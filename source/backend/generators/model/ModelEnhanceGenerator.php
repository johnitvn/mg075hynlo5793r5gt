<?php

namespace backend\generators\model;

use yii\gii\CodeFile;
use yii\gii\generators\model\Generator as ModelGenerator;
use Yii;

class ModelEnhanceGenerator extends ModelGenerator {

    public $useTimestampBehavior = true;
    public $useBlameableBehavior = false;
    public $useSluggableBehavior = false;

    /**
     * @inheritdoc
     */
    public function getName() {
        return 'Model Generator Enhance';
    }

    /**
     * @inheritdoc
     */
    public function getDescription() {
        return 'This generator generates an ActiveRecord class for the specified database table.';
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates() {
        return ['model.php', 'model-extended.php'];
    }

    /**
     * @inheritdoc
     */
    public function generate() {
        $files = [];
        $relations = $this->generateRelations();
        $db = $this->getDbConnection();
        foreach ($this->getTableNames() as $tableName) {
            $this->generateForTable($tableName, $relations, $db, $files);
        }
        return $files;
    }

    private function generateForTable($tableName, $relations, $db, &$files) {
        // model :
        $modelClassName = $this->generateClassName($tableName);
        $queryClassName = ($this->generateQuery) ? $this->generateQueryClassName($modelClassName) : false;
        $tableSchema = $db->getTableSchema($tableName);
        $params = [
            'tableName' => $tableName,
            'className' => $modelClassName,
            'queryClassName' => $queryClassName,
            'tableSchema' => $tableSchema,
            'labels' => $this->generateLabels($tableSchema),
            'rules' => $this->generateRules($tableSchema),
            'relations' => isset($relations[$tableName]) ? $relations[$tableName] : [],
        ];
        $this->getCodeFiles($modelClassName, $queryClassName, $params, $files);
    }

    private function getCodeFiles($modelClassName, $queryClassName, $params, &$files) {
        $files[] = new CodeFile(
                Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/base/Base' . $modelClassName . '.php', $this->render('model.php', $params)
        );
        $files[] = new CodeFile(
                Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/' . $modelClassName . '.php', $this->render('model-extended.php', $params)
        );

        // query :
        if ($queryClassName) {
            $params = [
                'className' => $queryClassName,
                'modelClassName' => $modelClassName,
            ];
            $files[] = new CodeFile(
                    Yii::getAlias('@' . str_replace('\\', '/', $this->queryNs)) . '/' . $queryClassName . '.php', $this->render('query.php', $params)
            );
        }
    }

}
