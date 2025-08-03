<?php

namespace app\widgets;

use app\modules\admin\models\pages\Pages;
use Yii;
use yii\helpers\Url;

class Menu
{
    public static function pages()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $name = (empty($url[3]) || $url[3] == null ? '' : $url[3]);
        $pages = Pages::find()->all();
        echo '
        <a href="'.Url::to('/admin/default').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'default' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
            <span class="ps-2">Dashboard</span>
        </a>';
        foreach ($pages as $data) {
            echo '<a href="'.Url::to('/admin/page/'.$data['slug'].'').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.($name == ''.$data['slug'].'' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 9l1 0" /><path d="M9 13l6 0" /><path d="M9 17l6 0" /></svg>
                <span class="ps-2">'.ucfirst($data['name']).'</span>
            </a>
            ';
        }
    }
    public static function management()
    {
        echo '
        <a href="'.Url::to('/admin/default').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'default' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
            <span class="ps-2">Dashboard</span>
        </a>
        <a href="'.Url::to('/admin/posts').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'posts' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 9l1 0" /><path d="M9 13l6 0" /><path d="M9 17l6 0" /></svg>
            <span class="ps-2">Posts</span>
        </a>
        <a href="'.Url::to('/admin/pages').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'pages' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-files"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 3v4a1 1 0 0 0 1 1h4" /><path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z" /><path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" /></svg>
            <span class="ps-2">Pages</span>
        </a>
        <a href="'.Url::to('/admin/users').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'users' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
            <span class="ps-2">Users</span>
        </a>
        <a href="'.Url::to('/admin/settings').'" class=" d-block p-2 mb-1 rounded-1 d-flex align-items-center '.(Yii::$app->controller->id == 'settings' ? 'menu-active' : 'text-light text-opacity-50 list-menu').'">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="21"  height="21"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
            <span class="ps-2">Setting</span>
        </a>
        ';
    }
}