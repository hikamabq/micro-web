<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\GrapesJsAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
$url = Url::to(["save", "id" => $model->id]);
$backUrl = Url::to(['/admin/pages']);

$this->title = $model->isNewRecord ? 'Buat Halaman Baru' : 'Edit Halaman: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Halaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->isNewRecord ? 'Buat Baru' : 'Edit';

GrapesJsAsset::register($this);
Html::csrfMetaTags();
?>

<div class="page-editor-index">
    <div style="display: none">
    </div>
    <div id="gjs" style="height: 100vh; overflow: hidden;"></div>
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
    canvas: {
        styles: [
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
        ],
        scripts: [
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'
        ]
    },
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

registerCustomBlocks(editor);

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
// Tambah tombol "Kembali ke Dashboard" paling kiri
pn.addButton('options', {
    id: 'back-dashboard',
    label: 'Back to pages',
    className: 'btn btn-light small-text px-4',
    command: function() {
        window.location.href = '{$backUrl}';
    },
    attributes: {
        title: 'Back to pages',
        'data-tooltip-pos': 'bottom'
    }
}, 0); // <-- angka 0 supaya ditempatkan di urutan pertama
// Tambahkan tombol Save di panel options
pn.addButton('options', {
    id: 'save-db',
    label: 'Save',
    className: 'btn btn-success small-text px-4',
    command: function() {
        var data = {
            css: editor.getCss(),
            html: editor.getHtml()
        };
        var url = '$url';
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: url,
            type: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function(response) {
                alert('Saved!');
            },
            error: function(xhr) {
                alert('Gagal menyimpan!');
                console.error(xhr.responseText);
            }
        });
    },
    attributes: {
        title: 'Save Page',
        'data-tooltip-pos': 'bottom'
    }
});


// Update canvas-clear command
cmdm.add('canvas-clear', function() {
    if(confirm('Are you sure to clean the canvas?')) {
        editor.runCommand('core:canvas-clear')
    }
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
editor.on('load', () => {
//   editor.BlockManager.getCategories().forEach(cat => {
//     // Tutup semua kategori
//     cat.set('open', false);

//     // Buka hanya kategori "Custom"
//     if (cat.get('id') === 'Components') {
//       cat.set('open', true);
//     }
//   });
    document.querySelectorAll('.gjs-block-category').forEach(cat => {
        const titleEl = cat.querySelector('.gjs-title');
        if (titleEl) {
        const text = titleEl.innerText.trim();
        if (["Basic", "Forms", "Extra"].includes(text)) {
            cat.style.display = "none";
        }
        }
    });
});
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