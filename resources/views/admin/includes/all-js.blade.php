<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{--<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>--}}

<!-- overlayScrollbars -->
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.tiny.cloud/1/79gm8gv815koegajd55jrvpm432yrvjuruoan4u7u2cseih0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- script --}}
@stack('script')


<script>

    var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    tinymce.init({
        selector: 'textarea.TextEditor',
        plugins: 'advlist lists link autolink autosave preview code searchreplace wordcount' +
            ' media table emoticons image imagetools fullscreen importcss save directionality' +
            ' visualblocks visualchars template codesample ' +
            ' charmap hr pagebreak nonbreaking anchor toc insertdatetime ' +
            ' textpattern noneditable help charmap quickbars ',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [
            {title: 'My page 1', value: 'https://www.tiny.cloud'},
            {title: 'My page 2', value: 'http://www.moxiecode.com'}
        ],
        image_list: [
            {title: 'My page 1', value: 'https://www.tiny.cloud'},
            {title: 'My page 2', value: 'http://www.moxiecode.com'}
        ],
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Some class', value: 'class-name'}
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {text: 'My text'});
            }
            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {alt: 'My alt text'});
            }
            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg'});
            }
        },
        templates: [
            {
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        branding: false,
        tinycomments_mode: 'embedded',
        tinycomments_author: 'devxhub',
        setup: function (editor) {
            editor.on('keyup', function (e) {
                if (e.target.dataset.id === 'short_description') {
                    limitTextOnBlogShortDescription(e)
                }
            });
            editor.on('paste', function (e) {
                if (e.target.dataset.id === 'short_description') {
                    limitTextOnBlogShortDescription(e)
                }
            });
        }
    });

    function limitTextOnBlogShortDescription(e) {
        if (e.target.innerText.length > 500) {
            $("#maxContentPost").html(`please write your paragraphs between ${500} characters.please remove some text`)
            e.preventDefault();
            e.stopPropagation();
            e.isImmediatePropagationStopped()
            $('.submit-btn').attr('disabled', true)
        } else if (500 === e.target.innerText.length) {
            $("#maxContentPost").html(`complete`)
            e.preventDefault();
            e.stopPropagation();
            e.isImmediatePropagationStopped()
            $('.submit-btn').attr('disabled', false)
        } else {
            $("#maxContentPost").html(500 - e.target.innerText.length)
            $('.submit-btn').attr('disabled', false)
        }
    }

</script>


<!-- our custom js-->
<script>
    // dashboard all image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#old_img").addClass('display_none')
                $("#preview_image").removeClass('display_none')
                $('#preview_image').attr('src', e.target.result);
                $('.old_img').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImage2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#old_img2").addClass('display_none2')
                $("#preview_image2").removeClass('display_none2')
                $('#preview_image2').attr('src', e.target.result);
                $('.old_img2').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    //hold site editable image delete
    {{--function deleteImage(basePath){--}}
    {{--    $.get('{{ route('admin.image.delete') }}', {basePath:basePath}, function (response){--}}
    {{--        if (response === true){--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}

    toastr.options = {
        "positionClass": "toast-top-center",
    }

    @foreach(['success', 'warning', 'error', 'info'] as $item)
        @if(session($item))
            toastr['{{ $item }}']('{{ session($item) }}');
        @endif
    @endforeach

    $(document).ready(function () {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: true,
            timer: 5000
        });

        window.toastMessage = function (type, message) {
            Toast.fire({
                icon: type,
                title: message
            });
        };
    });

    function deleteRow(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will not be able to recover this item!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1ab394',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('row-delete-form' + id).submit();
            }
        })
    };

    // change publication status
    function changeStatus(e) {
        let id = $(e).attr('id'), route = $(e).data('route');

        axios.get(route + '/' + id)
            .then(function (response) {
                let statusBtn = $(e).find('span');

                if ($(statusBtn).hasClass('badge-primary')) {
                    $(statusBtn).removeClass('badge-primary').addClass('badge-danger');
                    $(statusBtn).text('Disable');
                } else {
                    $(statusBtn).removeClass('badge-danger').addClass('badge-primary');
                    $(statusBtn).text('Active');
                }
                toastMessage('success', 'Status has been updated successful.');
            })
            .catch(function (error) {
                toastMessage('error', 'Status could not be update.');
            })
    }
</script>
