<?php

namespace app\kacharin\faq;

use Yii;

/**
 * faq module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\kacharin\faq\controllers';
    const accessRoles = ['admin', 'superadmin'];
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

      //Yii::configure($this, require __DIR__ . '\config\web.php');
    }
}
