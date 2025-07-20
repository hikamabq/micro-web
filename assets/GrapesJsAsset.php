<?php

namespace app\assets;

use yii\web\AssetBundle;

class GrapesJsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/bootstrap.min.css',
        'https://unpkg.com/grapesjs/dist/css/grapes.min.css',
        'https://unpkg.com/grapick/dist/grapick.min.css',
        'pagebuilder/stylesheets/toastr.min.css',
        'pagebuilder/stylesheets/grapes.min.css',
        'pagebuilder/stylesheets/grapesjs-preset-webpage.min.css',
        'pagebuilder/stylesheets/tooltip.css',
        'pagebuilder/stylesheets/demos.css',
    ];
    
    public $js = [
        'js/bootstrap.bundle.min.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
        'https://unpkg.com/grapesjs',
        'https://unpkg.com/grapesjs-preset-webpage@1.0.2',
        'https://unpkg.com/grapesjs-blocks-basic@1.0.1',
        'https://unpkg.com/grapesjs-plugin-forms@2.0.5',
        'https://unpkg.com/grapesjs-component-countdown@1.0.1',
        'https://unpkg.com/grapesjs-plugin-export@1.0.11',
        'https://unpkg.com/grapesjs-tabs@1.0.6',
        'https://unpkg.com/grapesjs-custom-code@1.0.1',
        'https://unpkg.com/grapesjs-touch@0.1.1',
        'https://unpkg.com/grapesjs-parser-postcss@1.0.1',
        'https://unpkg.com/grapesjs-tooltip@0.1.7',
        'https://unpkg.com/grapesjs-tui-image-editor@0.1.3',
        'https://unpkg.com/grapesjs-typed@1.0.5',
        'https://unpkg.com/grapesjs-style-bg@2.0.1',
        'pagebuilder/js/toastr.min.js',
        'pagebuilder/js/grapes.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
    
    public function init()
    {
        parent::init();
        
        // Atur posisi untuk script tertentu
        $this->jsOptions = ['position' => \yii\web\View::POS_HEAD];
    }
}