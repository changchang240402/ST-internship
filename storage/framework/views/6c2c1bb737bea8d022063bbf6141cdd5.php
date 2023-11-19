<?php $__env->startSection('content'); ?>
<div class="card p-5">
    <h4>Quill editor</h4>
    <a href="https://quilljs.com/docs/configuration/"><small>https://quilljs.com/docs/configuration/</small></a>
    <br>
    <div id="editor"></div>

    <h4 class="mt-4">Dropzone</h4>
    <a href="https://docs.dropzone.dev/"><small>https://docs.dropzone.dev/</small></a>
    <br>
    <div id="my-dropzone" class="dropzone border-dashed rounded-2 min-h-0 dz-clickable"></div>

    <h4 class="mt-4">Bootstrap select</h4>
    <a href="https://developer.snapappointments.com/bootstrap-select/examples/"><small>https://developer.snapappointments.com/bootstrap-select/examples/</small></a>
    <br>
    <div class="row">
        <select class="selectpicker">
            <optgroup label="Picnic">
                <option>Mustard</option>
                <option>Ketchup</option>
                <option>Relish</option>
            </optgroup>
            <optgroup label="Camping">
                <option>Tent</option>
                <option>Flashlight</option>
                <option>Toilet Paper</option>
            </optgroup>
        </select>
    
        <select class="selectpicker" multiple>
            <option>Mustard</option>
            <option>Ketchup</option>
            <option>Relish</option>
        </select>
    
        <select class="selectpicker" data-live-search="true">
            <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
            <option data-tokens="mustard">Burger, Shake and a Smile</option>
            <option data-tokens="frosting">Sugar, Spice and all things nice</option>
        </select>
    </div>

    <h4 class="mt-4">Flatpickr</h4>
    <a href="https://flatpickr.js.org/examples/"><small>https://flatpickr.js.org/examples/</small></a>
    <input class="flatpickr form-control">

    <h4 class="mt-4">Materials Icons</h4>
    <a href="https://pictogrammers.com/library/mdi/"><small>https://pictogrammers.com/library/mdi/</small></a>
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-4">
                <!-- Card body -->
                <div class="card-body">
                    <span class="fs-6 text-uppercase fw-semibold">Total Posts</span>
                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        <div class="lh-1">
                            <h2 class="h1 fw-bold mb-1">2,000</h2>
                            <span>100Last 30Days</span>
                        </div>
                        <div>
                            <span class="bg-light-primary icon-shape icon-xl rounded-3 text-dark-primary">
                                <i class="mdi mdi-text-box-multiple mdi-24px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <span class="fs-6 text-uppercase fw-semibold">Assets</span>
                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        <div class="lh-1">
                            <h2 class="h1 fw-bold mb-1">367</h2>
                            <span>300+ Media Object</span>
                        </div>
                        <div>
                            <span class="bg-light-warning icon-shape icon-xl rounded-3 text-dark-warning">
                                <i class="mdi mdi-folder-multiple-image mdi-24px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <span class="fs-6 text-uppercase fw-semibold">USers</span>
                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        <div class="lh-1">
                            <h2 class="h1 fw-bold mb-1">13,234</h2>
                            <span>1.5k in 30Days</span>
                        </div>
                        <div>
                            <span class="bg-light-success icon-shape icon-xl rounded-3 text-dark-success">
                                <i class="mdi mdi-account-multiple mdi-24px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <!-- Card -->
            <div class="card mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <span class="fs-6 text-uppercase fw-semibold">Comments</span>
                    <div class="mt-2 d-flex justify-content-between align-items-center">
                        <div class="lh-1">
                            <h2 class="h1 fw-bold mb-1">120</h2>
                            <span>20+ Comments</span>
                        </div>
                        <div>
                            <span class="bg-light-info icon-shape icon-xl rounded-3 text-dark-info">
                                <i class="mdi mdi-comment-text mdi-24px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-4">Bootstrap icons</h4>
    <a href="https://icons.getbootstrap.com/"><small>https://icons.getbootstrap.com/</small></a>
    <button class="btn btn-primary"><i class="bi bi-arrow-right-square-fill"></i></button>
</div>
<hr>
<div class="my-dropzone"></div>
<script type="module">
    $(".flatpickr").flatpickr({
        enableTime: true,
        dateFormat: "F, d Y H:i"
    });

    $("div#my-dropzone").dropzone({ url: "/file/post" });
    
    // Customize the Quill editor as needed (optional).
    // const quill = new Quill('#editor', {
    //     theme: 'snow',
    // });
    var toolbar = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction
            ['link', 'blockquote', 'code-block', 'image', 'video'],
            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['clean'] // remove formatting button
        ]
    const quill = new Quill('#editor',{
                    modules: {
                        toolbar: toolbar
                        // handlers: {
                        //     image: quill_img_handler
                        // },
                    },
                    theme: 'snow'
                });

                function selectLocalImage() {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.click();

                    // Listen upload local image and save to server
                    input.onchange = () => {
                        const file = input.files[0];

                        // file type is only image.
                        if (/^image\//.test(file.type)) {
                            saveToServer(file);
                        } else {
                            console.warn('You could only upload images.');
                        }
                    };
                }

                /**
                 * Step2. save to server
                 *
                 * @param {File} file
                 */
                function saveToServer(file: File) {
                    const fd = new FormData();
                    fd.append('image', file);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'http://localhost:3000/upload/image', true);
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            // this is callback data: url
                            const url = JSON.parse(xhr.responseText).data;
                            insertToEditor(url);
                        }
                    };
                    xhr.send(fd);
                }

                /**
                 * Step3. insert image url to rich editor.
                 *
                 * @param {string} url
                 */
                function insertToEditor(url: string) {
                    // push image url to rich editor.
                    const range = editor.getSelection();
                    editor.insertEmbed(range.index, 'image', `http://localhost:9000${url}`);
                }

                // quill editor add image handler
                editor.getModule('toolbar').addHandler('image', () => {
                    selectLocalImage();
                });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/test/testJS.blade.php ENDPATH**/ ?>