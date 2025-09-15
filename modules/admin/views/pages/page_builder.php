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


editor.BlockManager.add('dynamic-post-3', {
  label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#000"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg> Dynamic Post 3',
  content: `
    <div class="dynamic-block hide-web " data-dynamic="dynamic_post_3" style="border:1px dashed #aaa; padding:20px; text-align:center; background:#fafafa;">
        <b>Dynamic Post 3 Column</b><br>
        <small>Content will be taken from the $model->slug post</small>
    </div>
    <!-- dynamic_post_3 -->
  `,
  category: 'Post',
});

editor.BlockManager.add('dynamic-post-4', {
  label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#000"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg> Dynamic Post 4',
  content: `
    <div class="dynamic-block hide-web" data-dynamic="dynamic_post_4" style="border:1px dashed #aaa; padding:20px; text-align:center; background:#fafafa;">
        <b>Dynamic Post 4 Column</b><br>
        <small>Content will be taken from the $model->slug post</small>
    </div>
    <!-- dynamic_post_4 -->
  `,
  category: 'Post',
});

editor.BlockManager.add('container', {
    label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-container"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 4v.01" /><path d="M20 20v.01" /><path d="M20 16v.01" /><path d="M20 12v.01" /><path d="M20 8v.01" /><path d="M8 4m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M4 4v.01" /><path d="M4 20v.01" /><path d="M4 16v.01" /><path d="M4 12v.01" /><path d="M4 8v.01" /></svg> Container',
    content: `
        <div class="container">
        <div class="hide-web" style="flex:1; min-height: 100px; border:1px dotted #aaa; padding:10px;" data-gjs-droppable="true" data-gjs-highlightable="true" draggable="true" data-gjs-name="Column"></div>
      </div>`,
    category: 'Container',
});
editor.BlockManager.add('container-fluid', {
    label: '<svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brackets-contain"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 4h-4v16h4" /><path d="M17 4h4v16h-4" /><path d="M8 16h.01" /><path d="M12 16h.01" /><path d="M16 16h.01" /></svg> Container Fluid',
    content: `
        <div class="container-fluid">
        <div class="hide-web" style="flex:1; min-height: 100px; border:1px dotted #aaa; padding:10px;" data-gjs-droppable="true" data-gjs-highlightable="true" draggable="true" data-gjs-name="Column"></div>
      </div>`,
    category: 'Container',
});

editor.BlockManager.add('hero-1', {
    label: `
<svg width="62" height="32" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="1" y="1" width="60" height="30" stroke="white" stroke-width="0.5"/>
<rect x="22" y="8" width="19" height="2" fill="white"/>
<rect x="20" y="20" width="11" height="3" fill="white"/>
<rect x="32" y="20" width="11" height="3" fill="white"/>
<rect x="9" y="13" width="43" height="1" fill="white"/>
<rect x="9" y="15" width="43" height="1" fill="white"/>
<rect x="9" y="17" width="43" height="1" fill="white"/>
</svg>

 Hero 1`,
    content: `
    <div class="px-4 py-5 my-5 text-center"> <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1> <div class="col-lg-6 mx-auto"> <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"> <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> </div> </div> </div>`,
    category: 'Heroes',
});
editor.BlockManager.add('hero-2', {
    label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.25" y="0.25" width="59.5" height="29.5" stroke="white" stroke-width="0.5"/>
<rect x="19" y="5" width="19" height="2" fill="white"/>
<rect x="17" y="17" width="11" height="3" fill="white"/>
<rect x="29" y="17" width="11" height="3" fill="white"/>
<rect x="8" y="22" width="40" height="8" fill="white"/>
<rect x="7" y="10" width="42" height="1" fill="white"/>
<rect x="7" y="12" width="42" height="1" fill="white"/>
<rect x="7" y="14" width="42" height="1" fill="white"/>
</svg> Hero 2`,
    content: `
    <div class="px-4 pt-5 my-5 text-center border-bottom"> <h1 class="display-4 fw-bold text-body-emphasis">Centered screenshot</h1> <div class="col-lg-6 mx-auto"> <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5"> <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> </div> </div> <div class="overflow-hidden" style="max-height: 30vh;"> <div class="container px-5"> <img src="bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy"> </div> </div> </div>
    `,
    category: 'Heroes',
});
editor.BlockManager.add('hero-3', {
    label: `<svg width="62" height="32" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="1" y="1" width="60" height="30" stroke="white" stroke-width="0.5"/>
<rect x="4" y="7" width="19" height="2" fill="white"/>
<rect x="4" y="19" width="11" height="3" fill="white"/>
<rect x="16" y="19" width="11" height="3" fill="white"/>
<rect x="40" y="7" width="17" height="16" fill="white"/>
<rect x="4" y="12" width="32" height="1" fill="white"/>
<rect x="4" y="14" width="32" height="1" fill="white"/>
<rect x="4" y="16" width="32" height="1" fill="white"/>
</svg>
 Hero 3`,
    content: `
    <div class="container col-xxl-8 px-4 py-5"> <div class="row flex-lg-row-reverse align-items-center g-5 py-5"> <div class="col-10 col-sm-8 col-lg-6"> <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"> </div> <div class="col-lg-6"> <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1> <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-md-flex justify-content-md-start"> <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> </div> </div> </div> </div>
    `,
    category: 'Heroes',
});
editor.BlockManager.add('hero-4', {
    label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.25" y="0.25" width="59.5" height="29.5" stroke="white" stroke-width="0.5"/>
<rect x="3" y="6" width="19" height="2" fill="white"/>
<rect x="3" y="18" width="11" height="3" fill="white"/>
<rect x="15" y="18" width="11" height="3" fill="white"/>
<rect x="46" y="2" width="14" height="25" fill="white"/>
<rect x="3" y="11" width="32" height="1" fill="white"/>
<rect x="3" y="13" width="32" height="1" fill="white"/>
<rect x="3" y="15" width="32" height="1" fill="white"/>
</svg>
 Hero 4`,
    content: `
    <div class="container-fluid"><div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg"> <div class="col-lg-7 p-3 p-lg-5 pt-lg-3"> <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Border hero with cropped image and shadows</h1> <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3"> <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> </div> </div> <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg"> <img class="rounded-lg-3" src="bootstrap-docs.png" alt="" width="720"> </div> </div></div>
    `,
    category: 'Heroes',
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
    category: 'Carousel',
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
  editor.BlockManager.getCategories().forEach(cat => {
    // Tutup semua kategori
    cat.set('open', false);

    // Buka hanya kategori "Custom"
    if (cat.get('id') === 'Bootstrap' || cat.get('label') === 'Bootstrap') {
      cat.set('open', true);
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