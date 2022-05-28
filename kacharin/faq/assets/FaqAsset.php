<?php

namespace app\kacharin\faq\assets;

use yii\web\AssetBundle;

class FaqAsset extends AssetBundle
{
    public $sourcePath = '@app/kacharin/faq/web';

    public $css = [
        'css/category.css',
    ];
    public $js = [
        'js/admin.js',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'app\assets\AppAsset'
    ];
}