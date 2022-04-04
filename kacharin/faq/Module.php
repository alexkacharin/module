<?php

namespace app\kacharin\faq;

/**
 * faq module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\kacharin\faq\controllers';
    public $accessRoles = ['admin', 'superadmin'];
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

      //  \Yii::configure($this, require __DIR__ . '/config/main.php');
    }
}
