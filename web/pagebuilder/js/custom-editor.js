function registerCustomBlocks(editor){
    editor.BlockManager.add('dynamic-post-3', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="4" y="6" width="16" height="21" fill="white"/><rect x="5" y="20" width="14" height="1" fill="#4338CA"/><rect x="5" y="22" width="14" height="1" fill="#4338CA"/><rect x="5" y="24" width="14" height="1" fill="#4338CA"/><rect x="5" y="7" width="14" height="12" fill="#4338CA"/><rect x="22" y="6" width="16" height="21" fill="white"/><rect x="23" y="20" width="14" height="1" fill="#4338CA"/><rect x="23" y="22" width="14" height="1" fill="#4338CA"/><rect x="23" y="24" width="14" height="1" fill="#4338CA"/><rect x="23" y="7" width="14" height="12" fill="#4338CA"/><rect x="40" y="6" width="16" height="21" fill="white"/><rect x="41" y="20" width="14" height="1" fill="#4338CA"/><rect x="41" y="22" width="14" height="1" fill="#4338CA"/><rect x="41" y="24" width="14" height="1" fill="#4338CA"/><rect x="41" y="7" width="14" height="12" fill="#4338CA"/></svg><br> Dynamic Post 3',
        content: `
          <div class="dynamic-block hide-web " data-dynamic="dynamic_post_3" style="border:1px dashed #aaa; padding:20px; text-align:center; background:#fafafa;">
              <b>Dynamic Post 3 Column</b><br>
              <small>Content will be taken from the $model->slug post</small>
          </div>
          <!-- dynamic_post_3 -->
        `,
      });
      
      editor.BlockManager.add('dynamic-post-4', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="4" y="6" width="12" height="21" fill="white"/><rect x="4.75" y="20" width="10.5" height="1" fill="#4338CA"/><rect x="4.75" y="22" width="10.5" height="1" fill="#4338CA"/><rect x="4.75" y="24" width="10.5" height="1" fill="#4338CA"/><rect x="4.75" y="7" width="10.5" height="12" fill="#4338CA"/><rect x="17.5" y="6" width="12" height="21" fill="white"/><rect x="18.25" y="20" width="10.5" height="1" fill="#4338CA"/><rect x="18.25" y="22" width="10.5" height="1" fill="#4338CA"/><rect x="18.25" y="24" width="10.5" height="1" fill="#4338CA"/><rect x="18.25" y="7" width="10.5" height="12" fill="#4338CA"/><rect x="31" y="6" width="12" height="21" fill="white"/><rect x="31.75" y="20" width="10.5" height="1" fill="#4338CA"/><rect x="31.75" y="22" width="10.5" height="1" fill="#4338CA"/><rect x="31.75" y="24" width="10.5" height="1" fill="#4338CA"/><rect x="31.75" y="7" width="10.5" height="12" fill="#4338CA"/><rect x="45" y="6" width="12" height="21" fill="white"/><rect x="45.75" y="20" width="10.5" height="1" fill="#4338CA"/><rect x="45.75" y="22" width="10.5" height="1" fill="#4338CA"/><rect x="45.75" y="24" width="10.5" height="1" fill="#4338CA"/><rect x="45.75" y="7" width="10.5" height="12" fill="#4338CA"/></svg><br> Dynamic Post 4',
        content: `
          <div class="dynamic-block hide-web" data-dynamic="dynamic_post_4" style="border:1px dashed #aaa; padding:20px; text-align:center; background:#fafafa;">
              <b>Dynamic Post 4 Column</b><br>
              <small>Content will be taken from the $model->slug post</small>
          </div>
          <!-- dynamic_post_4 -->
        `,
      });
      
      editor.BlockManager.add('container', {
          label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="9" y="3" width="22" height="1" transform="rotate(90 9 3)" fill="white"/><rect x="52" y="3" width="22" height="1" transform="rotate(90 52 3)" fill="white"/></svg> <br> Container',
          content: `
            <div class="container" droppable="true" draggable="true">
              <div>Content</div>
            </div>`,
      });
      editor.BlockManager.add('container-fluid', {
          label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="2" y="3" width="22" height="1" transform="rotate(90 2 3)" fill="white"/><rect x="59" y="3" width="22" height="1" transform="rotate(90 59 3)" fill="white"/></svg> <br> Container Fluid',
          content: `
          <div class="container-fluid" droppable="true" draggable="true">
            <div>Content</div>
          </div>`,
      });
      
      editor.BlockManager.add('hero-1', {
          label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="21" y="7" width="19" height="2" fill="white"/><rect x="19" y="19" width="11" height="3" fill="white"/><rect x="31" y="19" width="11" height="3" fill="white"/><rect x="8" y="12" width="43" height="1" fill="white"/><rect x="8" y="14" width="43" height="1" fill="white"/><rect x="8" y="16" width="43" height="1" fill="white"/></svg> <br> Hero 1`,
          content: `
          <div class="px-4 py-5 text-center"> <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1> <div class="col-lg-6 mx-auto"> <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"> <button type="button" class="btn btn-dark btn-lg px-4 gap-3">Primary button</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> </div> </div> </div>`,
      });
      editor.BlockManager.add('hero-2', {
          label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="21" y="5" width="19" height="2" fill="white"/><rect x="19" y="17" width="11" height="3" fill="white"/><rect x="31" y="17" width="11" height="3" fill="white"/><rect x="10" y="22" width="40" height="8" fill="white"/><rect x="9" y="10" width="42" height="1" fill="white"/><rect x="9" y="12" width="42" height="1" fill="white"/><rect x="9" y="14" width="42" height="1" fill="white"/></svg> <br> Hero 2`,
          content: `
          <div class="px-4 pt-5 my-5 text-center border-bottom"> <h1 class="display-4 fw-bold text-body-emphasis">Centered screenshot</h1> <div class="col-lg-6 mx-auto"> <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5"> <button type="button" class="btn btn-dark btn-lg px-4 me-sm-3">Primary button</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> </div> </div> <div class="overflow-hidden" style="max-height: 30vh;"> <div class="container px-5"> <img src="bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy"> </div> </div> </div>
          `,
      });
      editor.BlockManager.add('hero-3', {
          label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="3" y="6" width="19" height="2" fill="white"/><rect x="3" y="18" width="11" height="3" fill="white"/><rect x="15" y="18" width="11" height="3" fill="white"/><rect x="39" y="6" width="17" height="16" fill="white"/><rect x="3" y="11" width="32" height="1" fill="white"/><rect x="3" y="13" width="32" height="1" fill="white"/><rect x="3" y="15" width="32" height="1" fill="white"/></svg> <br> Hero 3`,
          content: `
          <div class="container col-xxl-8 px-4 py-5"> <div class="row flex-lg-row-reverse align-items-center g-5 py-5"> <div class="col-10 col-sm-8 col-lg-6"> <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy"> </div> <div class="col-lg-6"> <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1> <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-md-flex justify-content-md-start"> <button type="button" class="btn btn-dark btn-lg px-4 me-md-2">Primary</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> </div> </div> </div> </div>
          `,
      });
      editor.BlockManager.add('hero-4', {
          label: `<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="3" y="6" width="19" height="2" fill="white"/><rect x="3" y="18" width="11" height="3" fill="white"/><rect x="15" y="18" width="11" height="3" fill="white"/><rect x="46" y="2" width="14" height="25" fill="white"/><rect x="3" y="11" width="32" height="1" fill="white"/><rect x="3" y="13" width="32" height="1" fill="white"/><rect x="3" y="15" width="32" height="1" fill="white"/></svg> <br> Hero 4`,
          content: `
          <div class="container-fluid"><div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg"> <div class="col-lg-7 p-3 p-lg-5 pt-lg-3"> <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Border hero with cropped image and shadows</h1> <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3"> <button type="button" class="btn btn-dark btn-lg px-4 me-md-2 fw-bold">Primary</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> </div> </div> <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg"> <img class="rounded-lg-3" src="bootstrap-docs.png" alt="" width="720"> </div> </div></div>
          `,
      });
      
      editor.BlockManager.add('carousel', {
          label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><path d="M53.5981 12.4019L58.0981 15L53.5981 17.5981L53.5981 12.4019Z" fill="white"/><path d="M6.59808 12.4019L2.09808 15L6.59808 17.5981L6.59808 12.4019Z" fill="white"/><rect x="16" y="24" width="8" height="1" fill="white"/><rect x="26" y="24" width="8" height="1" fill="white"/><rect x="36" y="24" width="8" height="1" fill="white"/></svg> <br> Carousel',
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
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
          `,
      });
      
      editor.BlockManager.add('carousel-caption', {
          label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><path d="M53.5981 12.4019L58.0981 15L53.5981 17.5981L53.5981 12.4019Z" fill="white"/><path d="M6.59808 12.4019L2.09808 15L6.59808 17.5981L6.59808 12.4019Z" fill="white"/><rect x="16" y="24" width="8" height="1" fill="white"/><rect x="26" y="24" width="8" height="1" fill="white"/><rect x="36" y="24" width="8" height="1" fill="white"/><rect x="26" y="14" width="8" height="1" fill="white"/><rect x="12" y="17" width="36" height="1" fill="white"/><rect x="12" y="20" width="36" height="1" fill="white"/></svg> <br> Carousel Caption',
          content: `
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="..." class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
          `,
    });
      
    editor.BlockManager.add('button-custom', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="52" y="8" width="12" height="43" transform="rotate(90 52 8)" fill="white"/></svg><br> Button',
        content: `<button class="btn btn-dark">Text in here</button>`,
    });
    editor.BlockManager.add('button-link', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="52" y="8" width="12" height="43" transform="rotate(90 52 8)" fill="white"/><rect x="24" y="10" width="8" height="13" transform="rotate(90 24 10)" fill="#4338CA"/><rect x="37" y="13" width="2" height="13" transform="rotate(90 37 13)" fill="#4338CA"/><rect x="50" y="10" width="8" height="13" transform="rotate(90 50 10)" fill="#4338CA"/></svg><br> Button Link',
        content: `<a href="" class="btn btn-dark">Text in here</a>`,
    });
    editor.BlockManager.add('image-custom', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect width="1" height="20.01" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 16.8563 12.7071)" fill="white"/><rect width="1" height="20.01" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 39.8563 7.70711)" fill="white"/><rect x="16" y="13.7071" width="1" height="20.01" transform="rotate(-45 16 13.7071)" fill="white"/><rect x="39" y="8.70711" width="1" height="25.9192" transform="rotate(-45 39 8.70711)" fill="white"/><circle cx="52" cy="8" r="2" fill="white"/></svg><br> Image',
        content: `<img src="...">`,
    });
    editor.BlockManager.add('card-3', {
        label: '<svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="30" fill="#4338CA"/><rect x="4" y="6" width="16" height="21" fill="white"/><rect x="5" y="17" width="14" height="1" fill="#4338CA"/><rect x="5" y="19" width="14" height="1" fill="#4338CA"/><rect x="5" y="21" width="14" height="1" fill="#4338CA"/><rect x="5" y="7" width="14" height="9" fill="#4338CA"/><rect x="5" y="23" width="8" height="3" fill="#4338CA"/><rect x="22" y="6" width="16" height="21" fill="white"/><rect x="23" y="17" width="14" height="1" fill="#4338CA"/><rect x="23" y="19" width="14" height="1" fill="#4338CA"/><rect x="23" y="21" width="14" height="1" fill="#4338CA"/><rect x="23" y="7" width="14" height="9" fill="#4338CA"/><rect x="23" y="23" width="8" height="3" fill="#4338CA"/><rect x="40" y="6" width="16" height="21" fill="white"/><rect x="41" y="17" width="14" height="1" fill="#4338CA"/><rect x="41" y="19" width="14" height="1" fill="#4338CA"/><rect x="41" y="21" width="14" height="1" fill="#4338CA"/><rect x="41" y="7" width="14" height="9" fill="#4338CA"/><rect x="41" y="23" width="8" height="3" fill="#4338CA"/></svg><br> Card 3',
        content: `<div class="row">
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>`,
    });
      
}