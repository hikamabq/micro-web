<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\GrapesJsAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = $model->isNewRecord ? 'Buat Halaman Baru' : 'Edit Halaman: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Halaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->isNewRecord ? 'Buat Baru' : 'Edit';

GrapesJsAsset::register($this);
Html::csrfMetaTags();

// CSS tambahan
$this->registerCss(<<<CSS
.icons-flex {
    background-size: 70% 65% !important;
    height: 15px;
    width: 17px;
    opacity: 0.9;
}
.icon-dir-row {
    background: url("/img/flex-dir-row.png") no-repeat center;
}
.icon-dir-row-rev {
    background: url("/img/flex-dir-row-rev.png") no-repeat center;
}
.icon-dir-col {
    background: url("/img/flex-dir-col.png") no-repeat center;
}
.icon-dir-col-rev {
    background: url("/img/flex-dir-col-rev.png") no-repeat center;
}
.icon-just-start{
    background: url("/img/flex-just-start.png") no-repeat center;
}
.icon-just-end{
    background: url("/img/flex-just-end.png") no-repeat center;
}
.icon-just-sp-bet{
    background: url("/img/flex-just-sp-bet.png") no-repeat center;
}
.icon-just-sp-ar{
    background: url("/img/flex-just-sp-ar.png") no-repeat center;
}
.icon-just-sp-cent{
    background: url("/img/flex-just-sp-cent.png") no-repeat center;
}
.icon-al-start{
    background: url("/img/flex-al-start.png") no-repeat center;
}
.icon-al-end{
    background: url("/img/flex-al-end.png") no-repeat center;
}
.icon-al-str{
    background: url("/img/flex-al-str.png") no-repeat center;
}
.icon-al-center{
    background: url("/img/flex-al-center.png") no-repeat center;
}

[data-tooltip]::after {
    background: rgba(51, 51, 51, 0.9);
}

.gjs-pn-commands {
    min-height: 40px;
}

#gjs-sm-float {
    display: none;
}

.gjs-logo-version {
    background-color: #756467;
}

.gjs-pn-btn.gjs-pn-active {
    box-shadow: none;
}

.CodeMirror {
    min-height: 600px;
    margin-bottom: 8px;
}

.grp-handler-close {
    background-color: transparent;
    color: #ddd;
}

.grp-handler-cp-wrap {
    border-color: transparent;
}
/* Form untuk judul dan slug */
.page-info-form {
    background: #fff;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

CSS
);
?>

<div class="page-editor-index">
    <div style="display: none">
        <!-- <div class="gjs-logo-cont">
            <a href="https://grapesjs.com"><img class="gjs-logo" src="/img/grapesjs-logo-cl.png"></a>
            <div class="gjs-logo-version"></div>
        </div> -->
    </div>

    <!-- <div id="gjs" style="height:0px; overflow:scroll;"></div> -->
    <div id="gjs" style="height: 100vh; overflow: auto;"></div>

</div>

<?php
$images = $result;

$initialData = $model->isNewRecord ? '{}' : json_encode([
    'html' => $model->html_content,
    'css' => $model->css_content
]);

$js = <<<JS
// Inisialisasi editor
var editor = grapesjs.init({
    height: '100vh',
    container: '#gjs',
    // fromElement: true,
    fromElement: false,
    showOffsets: true,
    storageManager: false,
    assetManager: {
        embedAsBase64: true,
        assets: $images
    },
    selectorManager: { componentFirst: true },
    styleManager: {
        sectors: [{
            name: 'General',
            properties:[
                {
                    extend: 'float',
                    type: 'radio',
                    default: 'none',
                    options: [
                        { value: 'none', className: 'fa fa-times'},
                        { value: 'left', className: 'fa fa-align-left'},
                        { value: 'right', className: 'fa fa-align-right'}
                    ],
                },
                'display',
                { extend: 'position', type: 'select' },
                'top',
                'right',
                'left',
                'bottom',
            ],
        }, {
            name: 'Dimension',
            open: false,
            properties: [
                'width',
                {
                    id: 'flex-width',
                    type: 'integer',
                    name: 'Width',
                    units: ['px', '%'],
                    property: 'flex-basis',
                    toRequire: 1,
                },
                'height',
                'max-width',
                'min-height',
                'margin',
                'padding'
            ],
        },{
            name: 'Typography',
            open: false,
            properties: [
                'font-family',
                'font-size',
                'font-weight',
                'letter-spacing',
                'color',
                'line-height',
                {
                    extend: 'text-align',
                    options: [
                        { id : 'left',  label : 'Left',    className: 'fa fa-align-left'},
                        { id : 'center',  label : 'Center',  className: 'fa fa-align-center' },
                        { id : 'right',   label : 'Right',   className: 'fa fa-align-right'},
                        { id : 'justify', label : 'Justify',   className: 'fa fa-align-justify'}
                    ],
                },
                {
                    property: 'text-decoration',
                    type: 'radio',
                    default: 'none',
                    options: [
                        { id: 'none', label: 'None', className: 'fa fa-times'},
                        { id: 'underline', label: 'underline', className: 'fa fa-underline' },
                        { id: 'line-through', label: 'Line-through', className: 'fa fa-strikethrough'}
                    ],
                },
                'text-shadow'
            ],
        },{
            name: 'Decorations',
            open: false,
            properties: [
                'opacity',
                'border-radius',
                'border',
                'box-shadow',
                'background',
            ],
        },{
            name: 'Extra',
            open: false,
            buildProps: [
                'transition',
                'perspective',
                'transform'
            ],
        },{
            name: 'Flex',
            open: false,
            properties: [{
                name: 'Flex Container',
                property: 'display',
                type: 'select',
                defaults: 'block',
                list: [
                    { value: 'block', name: 'Disable'},
                    { value: 'flex', name: 'Enable'}
                ],
            },{
                name: 'Flex Parent',
                property: 'label-parent-flex',
                type: 'integer',
            },{
                name: 'Direction',
                property: 'flex-direction',
                type: 'radio',
                defaults: 'row',
                list: [{
                    value: 'row',
                    name: 'Row',
                    className: 'icons-flex icon-dir-row',
                    title: 'Row',
                },{
                    value: 'row-reverse',
                    name: 'Row reverse',
                    className: 'icons-flex icon-dir-row-rev',
                    title: 'Row reverse',
                },{
                    value: 'column',
                    name: 'Column',
                    title: 'Column',
                    className: 'icons-flex icon-dir-col',
                },{
                    value: 'column-reverse',
                    name: 'Column reverse',
                    title: 'Column reverse',
                    className: 'icons-flex icon-dir-col-rev',
                }],
            },{
                name: 'Justify',
                property: 'justify-content',
                type: 'radio',
                defaults: 'flex-start',
                list: [{
                    value: 'flex-start',
                    className: 'icons-flex icon-just-start',
                    title: 'Start',
                },{
                    value: 'flex-end',
                    title: 'End',
                    className: 'icons-flex icon-just-end',
                },{
                    value: 'space-between',
                    title: 'Space between',
                    className: 'icons-flex icon-just-sp-bet',
                },{
                    value: 'space-around',
                    title: 'Space around',
                    className: 'icons-flex icon-just-sp-ar',
                },{
                    value: 'center',
                    title: 'Center',
                    className: 'icons-flex icon-just-sp-cent',
                }],
            },{
                name: 'Align',
                property: 'align-items',
                type: 'radio',
                defaults: 'center',
                list: [{
                    value: 'flex-start',
                    title: 'Start',
                    className: 'icons-flex icon-al-start',
                },{
                    value: 'flex-end',
                    title: 'End',
                    className: 'icons-flex icon-al-end',
                },{
                    value: 'stretch',
                    title: 'Stretch',
                    className: 'icons-flex icon-al-str',
                },{
                    value: 'center',
                    title: 'Center',
                    className: 'icons-flex icon-al-center',
                }],
            },{
                name: 'Flex Children',
                property: 'label-parent-flex',
                type: 'integer',
            },{
                name: 'Order',
                property: 'order',
                type: 'integer',
                defaults: 0,
                min: 0
            },{
                name: 'Flex',
                property: 'flex',
                type: 'composite',
                properties: [{
                    name: 'Grow',
                    property: 'flex-grow',
                    type: 'integer',
                    defaults: 0,
                    min: 0
                },{
                    name: 'Shrink',
                    property: 'flex-shrink',
                    type: 'integer',
                    defaults: 0,
                    min: 0
                },{
                    name: 'Basis',
                    property: 'flex-basis',
                    type: 'integer',
                    units: ['px','%',''],
                    unit: '',
                    defaults: 'auto',
                }],
            },{
                name: 'Align',
                property: 'align-self',
                type: 'radio',
                defaults: 'auto',
                list: [{
                    value: 'auto',
                    name: 'Auto',
                },{
                    value: 'flex-start',
                    title: 'Start',
                    className: 'icons-flex icon-al-start',
                },{
                    value: 'flex-end',
                    title: 'End',
                    className: 'icons-flex icon-al-end',
                },{
                    value: 'stretch',
                    title: 'Stretch',
                    className: 'icons-flex icon-al-str',
                },{
                    value: 'center',
                    title: 'Center',
                    className: 'icons-flex icon-al-center',
                }],
            }]
        }],
    },
    plugins: [
        'gjs-blocks-basic',
        'grapesjs-plugin-forms',
        'grapesjs-component-countdown',
        'grapesjs-plugin-export',
        'grapesjs-tabs',
        'grapesjs-custom-code',
        'grapesjs-touch',
        'grapesjs-parser-postcss',
        'grapesjs-tooltip',
        'grapesjs-tui-image-editor',
        'grapesjs-typed',
        'grapesjs-style-bg',
        'grapesjs-preset-webpage',
    ],
    pluginsOpts: {
        'gjs-blocks-basic': { flexGrid: true },
        'grapesjs-tui-image-editor': {
            script: [
                'https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js',
                'https://uicdn.toast.com/tui-color-picker/v2.2.7/tui-color-picker.min.js',
                'https://uicdn.toast.com/tui-image-editor/v3.15.2/tui-image-editor.min.js'
            ],
            style: [
                'https://uicdn.toast.com/tui-color-picker/v2.2.7/tui-color-picker.min.css',
                'https://uicdn.toast.com/tui-image-editor/v3.15.2/tui-image-editor.min.css',
            ],
        },
        'grapesjs-tabs': {
            tabsBlock: { category: 'Extra' }
        },
        'grapesjs-typed': {
            block: {
                category: 'Extra',
                content: {
                    type: 'typed',
                    'type-speed': 40,
                    strings: [
                        'Text row one',
                        'Text row two',
                        'Text row three',
                    ],
                }
            }
        },
        'grapesjs-preset-webpage': {
            modalImportTitle: 'Import Template',
            modalImportLabel: '<div style="margin-bottom: 10px; font-size: 13px;">Paste here your HTML/CSS and click Import</div>',
            modalImportContent: function(editor) {
                return editor.getHtml() + '<style>'+editor.getCss()+'</style>'
            },
        },
    },
});

editor.BlockManager.add('container', {
    label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-container"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4v.01" /><path d="M20 20v.01" /><path d="M20 16v.01" /><path d="M20 12v.01" /><path d="M20 8v.01" /><path d="M8 4m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M4 4v.01" /><path d="M4 20v.01" /><path d="M4 16v.01" /><path d="M4 12v.01" /><path d="M4 8v.01" /></svg> Container',
    content: `
        <div class="container">
        <div style="flex:1; min-height: 100px; border:1px dotted #aaa; padding:0px;" data-gjs-droppable="true" data-gjs-highlightable="true" draggable="true" data-gjs-name="Column"></div>
      </div>`,
    category: 'Custom',
});
editor.BlockManager.add('container-fluid', {
    label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brackets-contain"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 4h-4v16h4" /><path d="M17 4h4v16h-4" /><path d="M8 16h.01" /><path d="M12 16h.01" /><path d="M16 16h.01" /></svg> Container Fluid',
    content: `
        <div class="container-fluid">
        <div style="flex:1; min-height: 100px; border:1px dotted #aaa; padding:0px;" data-gjs-droppable="true" data-gjs-highlightable="true" draggable="true" data-gjs-name="Column"></div>
      </div>`,
    category: 'Custom',
});
editor.BlockManager.add('carousel', {
    label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-slideshow"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l.01 0" /><path d="M3 3m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" /><path d="M3 13l4 -4a3 5 0 0 1 3 0l4 4" /><path d="M13 12l2 -2a3 5 0 0 1 3 0l3 3" /><path d="M8 21l.01 0" /><path d="M12 21l.01 0" /><path d="M16 21l.01 0" /></svg> Carousel',
    content: `
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"><</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">></span>
  </button>
</div>`,
    category: 'Custom',
});

// Load data awal jika edit
var initialData = $initialData;
if (initialData.html) {
    editor.setComponents(initialData.html);
    editor.setStyle(initialData.css);
}

// Konfigurasi tambahan editor
editor.I18n.addMessages({
    en: {
        styleManager: {
            properties: {
                'background-repeat': 'Repeat',
                'background-position': 'Position',
                'background-attachment': 'Attachment',
                'background-size': 'Size',
            }
        },
    }
});

var pn = editor.Panels;
var modal = editor.Modal;
var cmdm = editor.Commands;

// Update canvas-clear command
cmdm.add('canvas-clear', function() {
    if(confirm('Are you sure to clean the canvas?')) {
        editor.runCommand('core:canvas-clear')
    }
});

// Add info command
var mdlClass = 'gjs-mdl-dialog-sm';
var infoContainer = document.getElementById('info-panel');

cmdm.add('open-info', function() {
    var mdlDialog = document.querySelector('.gjs-mdl-dialog');
    mdlDialog.className += ' ' + mdlClass;
    infoContainer.style.display = 'block';
    modal.setTitle('About this demo');
    modal.setContent(infoContainer);
    modal.open();
    modal.getModel().once('change:open', function() {
        mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
    })
});

pn.addButton('options', {
    id: 'open-info',
    className: 'fa fa-question-circle',
    command: function() { editor.runCommand('open-info') },
    attributes: {
        'title': 'About',
        'data-tooltip-pos': 'bottom',
    },
});

$('#save-btn').on('click', function() {
    // data = page_name + '<style>'+ editor.getCss() +'</style>' + editor.getHtml();
    var data = {
        css: editor.getCss(),
        html: editor.getHtml()
    };
    var url = '/admin/pages/save?id=$model->id';
    // Ambil token dari meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url, // ganti sesuai route
        type: 'POST',
        data: JSON.stringify(data),
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': csrfToken // <--- kirim di header
        },
        success: function(response) {
            // console.log(response);
            alert('Saved');
        },
        error: function(xhr) {
            // console.error(xhr.responseText);
        }
    });
    // alert(JSON.stringify(data));
});

// // Add and beautify tooltips
[['sw-visibility', 'Show Borders'], ['preview', 'Preview'], ['fullscreen', 'Fullscreen'],
 ['export-template', 'Export'], ['undo', 'Undo'], ['redo', 'Redo'],
 ['gjs-open-import-webpage', 'Import'], ['canvas-clear', 'Clear canvas']]
.forEach(function(item) {
    pn.getButton('options', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
});
[['open-sm', 'Style Manager'], ['open-layers', 'Layers'], ['open-blocks', 'Blocks']]
.forEach(function(item) {
    pn.getButton('views', item[0]).set('attributes', {title: item[1], 'data-tooltip-pos': 'bottom'});
});
var titles = document.querySelectorAll('*[title]');

for (var i = 0; i < titles.length; i++) {
    var el = titles[i];
    var title = el.getAttribute('title');
    title = title ? title.trim(): '';
    if(!title)
        break;
    el.setAttribute('data-tooltip', title);
    el.setAttribute('title', '');
}

// // Do stuff on load
// editor.on('load', function() {
//     var $ = grapesjs.$;

//     // Show borders by default
//     pn.getButton('options', 'sw-visibility').set({
//         command: 'core:component-outline',
//         'active': true,
//     });

//     // Show logo with the version
//     var logoCont = document.querySelector('.gjs-logo-cont');
//     document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
//     var logoPanel = document.querySelector('.gjs-pn-commands');
//     logoPanel.appendChild(logoCont);

//     // Load and show settings and style manager
//     var openTmBtn = pn.getButton('views', 'open-tm');
//     openTmBtn && openTmBtn.set('active', 1);
//     var openSm = pn.getButton('views', 'open-sm');
//     openSm && openSm.set('active', 1);

//     // Remove trait view
//     pn.removeButton('views', 'open-tm');

//     // Add Settings Sector
//     var traitsSector = $('<div class="gjs-sm-sector no-select">'+
//         '<div class="gjs-sm-sector-title"><span class="icon-settings fa fa-cog"></span> <span class="gjs-sm-sector-label">Settings</span></div>' +
//         '<div class="gjs-sm-properties" style="display: none;"></div></div>');
//     var traitsProps = traitsSector.find('.gjs-sm-properties');
//     traitsProps.append($('.gjs-traits-cs'));
//     $('.gjs-sm-sectors').before(traitsSector);
//     traitsSector.find('.gjs-sm-sector-title').on('click', function(){
//         var traitStyle = traitsProps.get(0).style;
//         var hidden = traitStyle.display == 'none';
//         if (hidden) {
//             traitStyle.display = 'block';
//         } else {
//             traitStyle.display = 'none';
//         }
//     });

//     // Open block manager
//     var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
//     openBlocksBtn && openBlocksBtn.set('active', 1);
// });
JS;

$this->registerJs($js);
?>