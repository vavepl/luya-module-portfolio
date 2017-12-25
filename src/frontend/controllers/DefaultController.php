<?php

namespace vavepl\portfolio\frontend\controllers;

use vavepl\portfolio\models\Group;
use vavepl\portfolio\models\Item;
use Yii;
use yii\web\View;
use yii\web\NotFoundHttpException;
use Exception;
use luya\cms\frontend\base\Controller;
use luya\helpers\StringHelper;
use luya\cms\models\Redirect;

class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $groups = Group::getMenu();
        $items = Item::getElements();

        return $this->render('index', [
            'groups' => $groups,
            'items' => $items
        ]);
    }
}
