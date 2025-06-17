<script>
    $(function() {
        "use strict";
        $(".meta-keyward").select2({
            tags: true,
            placeholder: "Meta keyward",
            width: "100%"
        });
        $('.seo-page-checkbox').on('change', function() {

            if ($(this).is(":checked")) {
                $(".seo-content").show();
            } else {
                $(".seo-content").hide();
            }
        })
        $('.seo-page-checkbox').trigger('change');

        $(".add-element").draggable({
            helper: function(event, ui) {
                return $(this).clone().removeClass("add-element").addClass("draggable-element")
                    .appendTo(".active_widget_list")
                    .css({
                        "zIndex": 5,

                    }).show();
            },

            cursor: "move",
            containment: "document"
        });

        $(".active_widget_list").droppable({
            accept: ".add-element",
            drop: function(event, ui) {
                let slug = $(this).find('.ui-draggable').data('slug');
                let pageId = $(this).find('.ui-draggable').data('page-id');
                let widgetName = $(this).find('.ui-draggable').data('widget-name');
                let action = baseUrl + "/dashboard/pages/add-widget-page/" + slug;

                $.ajax({
                    url: action,
                    method: 'get',
                    data: {
                        pageId,
                        widgetName
                    },
                    success: function(data) {
                        if (data.status == true) {
                            $(".active_widget_list").append(`${data.content}`);
                            toastr["success"](`${data.message}`);
                        }
                        codeRichEditor();
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });


            }

        }).sortable({
            placeholder: "placeholder",
            cursor: "move",
            stop: function(event, ui) {
                let item = $(this).find('.accordion-item')
                let content = [];
                $.each(item, function(key, val) {
                    let slug = $(val).find('.widget-slug').val();
                    let code = $(val).data('code');
                    content.push({
                        [code]: slug
                    });
                })

                let pageId = $("#pageId").val();
                let action = baseUrl + "/dashboard/pages/widget-sorted-by-page";
                $.ajax({
                    url: action,
                    method: 'get',
                    data: {
                        pageId,
                        content
                    },
                    dataType: 'json',
                    success: function(data) {

                        console.log(data);
                        if (data.status == false) {
                            toastr["error"](`${data.message}`);
                        } else if (data.status == true) {
                            toastr["info"](`${data.message}`);

                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

        $(document).on('click', '.collapsed-action-btn', function(e) {

            e.preventDefault();
            let parent = $(this).closest('.accordion-item');;
            $(parent).find(".accordion-collapse").toggleClass("show");
        })

        $(document).on('submit', '.form', function(e) {

            e.preventDefault();
            let form = $(this);
            let formData = new FormData(this);
            let action = form.data('action');
            let lang = $("#lang").val();
            formData.append('lang', lang);

            $.ajax({
                type: "POST",
                url: action,
                data: formData,
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);

                    if (data.status == false) {
                        toastr["error"](`${data.message}`);
                    } else if (data.status == true) {
                        toastr["info"](`${data.message}`);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        })

        $(document).on('click', '.add-about-tabs-btn', function(e) {
            e.preventDefault();
            let key1 = $(this).closest('form').find(".about-tabs-area .content").length;
            let parent = $(this).closest('form').find(".about-tabs-area");
            key1++;

            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Name')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                        name="content[0][tabs][${key1}][tabs_name]"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Class Icon - get icon in')); ?></label>
                                                    <input type="text" class="username-input icon-picker"
                                                        name="content[0][tabs][${key1}][tabs_icon]">
                                                </div>
                                            </div>

                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Description')); ?></label>
                                    <textarea name="content[0][tabs][${key1}][tabs_descriptions]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1 text-center">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`
            $('.about-tabs-area').append(html);
            $('.icon-picker').iconpicker({
                hideOnSelect: true
            });
        });

        $(document).on('click', '.add-fun-facts-btn', function(e) {

            e.preventDefault();

            let key2 = $(this).closest('form').find(".fun-facts-area .content").length;
            let parent = $(this).closest('form').find(".fun-facts-area");

            key2++;


            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-4 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Title')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Title')); ?>"
                                        name="content[0][fun_facts][${key2}][title]"
                                        value="<?php echo e(isset($fun_fact['title']) ? $fun_fact['title'] : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <div class="form-inner">
                                    <label> <?php echo e(translate('Number Count')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Number Count')); ?>"
                                        value="<?php echo e(isset($fun_fact['number_count']) ? $fun_fact['number_count'] : ''); ?>"
                                        name="content[0][fun_facts][${key2}][number_count]">

                                </div>
                            </div>

                            <div class="col-sm-5 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Icon')); ?></label>
                                    <div class="d-flex align-items-center">
                                        <input type="file" class="username-input widget-image-upload"
                                            name="image" data-folder="/uploads/fun_facts/">

                                        <input type="hidden"
                                            name="content[0][fun_facts][${key2}][img]"
                                            id="old_file">


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-1 text-center">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`

            $('.fun-facts-area').append(html);
        });

        $(document).on('click', '.add-features-btn', function(e) {

            e.preventDefault();

            let key3 = $(this).closest('form').find(".features-area .content").length;
            let parent = $(this).closest('form').find(".features-area");

            key3++;


            let html = `
                <div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-5 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Name')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                        name="content[0][features][${key3}][name]">
                                </div>
                            </div>
                            <div class="col-sm-7 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Icon')); ?></label>

                                    <div class="d-flex">
                                        <input type="file" class="username-input widget-image-upload"
                                            name="image" data-folder="/uploads/features/">
                                        <input type="hidden" name="content[0][features][${key3}][img]"
                                            id="old_file">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Short Description')); ?></label>
                                    <textarea class="form-control" name="content[0][features][${key3}][descriptions]">   </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-1 text-center">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`

            parent.append(html);
        });

        $(document).on('click', '.add-procedures-btn', function(e) {

            let key4 = $(this).closest('form').find(".procedures-area .content").length;
            let parent = $(this).closest('form').find(".procedures-area");

            key4++;
            e.preventDefault();

            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-5 mb-2">
                                <div class="form-inner">

                                    <label><?php echo e(translate('Name')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                        name="content[0][procedures][${key4}][name]"
                                        value="<?php echo e(isset($procedure['name']) ? $procedure['name'] : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-7 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Image')); ?></label>
                                    <div class="d-flex align-items-center">
                                        <input type="file" class="username-input widget-image-upload"
                                            name="image" data-folder="/uploads/procedures/">

                                        <input type="hidden"
                                            name="content[0][procedures][${key4}][img]"
                                            id="old_file"
                                            value="<?php echo e(isset($procedure['img']) ? $procedure['img'] : ''); ?>">

                                        <?php if(isset($procedure['img'])): ?>
                                            <div class="ms-2">
                                                <img height="50" width="auto"
                                                    src="<?php echo e(asset('uploads/procedures/' . $procedure['img'])); ?>"
                                                    alt="">
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-5 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Button Text')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Button Text')); ?>"
                                        name="content[0][procedures][${key4}][button_text]"
                                        value="<?php echo e(isset($procedure['button_text']) ? $procedure['button_text'] : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-7 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Button Url')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Button Url')); ?>"
                                        name="content[0][procedures][${key4}][button_url]"
                                        value="<?php echo e(isset($procedure['button_url']) ? $procedure['button_url'] : ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Description')); ?></label>
                                    <textarea rows="6" name="content[0][procedures][${key4}][description]"> <?php echo isset($procedure['description']) ? clean($procedure['description']) : ''; ?>  </textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-1 text-center">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`

            parent.append(html);
        });

        $(document).on('click', '.add-faqs-btn', function(e) {
            e.preventDefault();
            let key5 = $(this).closest('form').find(".faqs-area .content").length;
            let parent = $(this).closest('form').find(".faqs-area");
            key5++;

            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Question')); ?></label>
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Question')); ?>"
                                        name="content[0][faqs][${key5}][title]"
                                        >
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <label><?php echo e(translate('Answer')); ?></label>
                                    <textarea class="summernote" name="content[0][faqs][${key5}][description]"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`
            parent.append(html);
            codeRichEditor();
        });

        $(document).on("click", '.remove-information', function(e) {
            e.preventDefault();
            let self = $(this).closest('.content').remove();

        })
        //status Inactive

        $(document).on('change', '.status-change', function(e) {
            e.preventDefault();
            let action = $(this).data('action');
            $.ajax({
                url: action,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.status === true) {
                        toastr["success"](`${data.message}`);

                    } else if (data.status == false) {
                        toastr["error"](`${data.message}`);
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });

        });
        $(document).on('click', '.delete-action', function(e) {
            e.preventDefault();
            let self = $(this);
            let id = self.data('id');
            let action = baseUrl + "/dashboard/pages/widget-delete-by-page/" + id;

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                            if (data.status === true) {
                                toastr["success"](`${data.message}`);
                                $(self).closest('.accordion-item').remove();

                            } else if (data.status == false) {
                                toastr["error"](`${data.message}`);
                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Cancelled',
                        'Your file is safe :)',
                        'error'
                    )
                }
            })

        });


        $(document).on('click', '.add-phone-btn', function(e) {
            e.preventDefault();

            let key = $(this).closest('form').find(".phone-area .content").length;
            let parent = $(this).closest('form').find(".phone-area");

            key++;

            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <input type="text" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Number')); ?>"
                                        name="content[0][phone][${key}][phone_number]"
                                        >
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`
            parent.append(html);


        });
        $(document).on('click', '.add-email-btn', function(e) {
            e.preventDefault();

            let key = $(this).closest('form').find(".email-area .content").length;
            let parent = $(this).closest('form').find(".email-area");

            key++;

            let html =
                `<div class="row align-items-center content">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div class="form-inner">
                                    <input type="email" class="username-input"
                                        placeholder="<?php echo e(translate('Enter Email')); ?>"
                                        name="content[0][email][${key}][email_name]"
                                        >
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button class="remove-information remove text-danger border-0">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>`
            parent.append(html);


        });



        $(document).on('click', '.add-working-btn', function(e) {
            e.preventDefault();
            let sliderkey = $(this).closest('form').find(".location-area .content").length;
            let parent = $(this).closest('form').find(".location-area");

            sliderkey++;

            let html = `<div class="row align-items-center content">
                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Main Title')); ?>"
                                    name="content[0][slider][${sliderkey}][title]"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Button Text')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Button Text')); ?>"
                                    name="content[0][slider][${sliderkey}][button_text]"
                                    >
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Button Url')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Button Url')); ?>"
                                    name="content[0][slider][${sliderkey}][button_url]"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Image')); ?></label>
                                <div class="d-flex">
                                    <input type="file" class="username-input widget-image-upload" name="image" data-folder="/uploads/sliders/">
                                   <input type="hidden" name="content[0][slider][${sliderkey}][img]" id="old_file">
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Location')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Location')); ?>"
                                                        name="content[0][slider][${sliderkey}][location]">
                                                </div>
                                            </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Rating Logo')); ?></label>
                                <div class="d-flex">
                                    <input type="file" class="username-input widget-image-upload" name="image" data-folder="/uploads/sliders/">
                                   <input type="hidden" name="content[0][slider][${sliderkey}][rating_logo]" id="old_file">
                                </div>
                            </div>
                        </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Rating (Out of 5)')); ?></label>
                                                    <input type="number" step="0.1" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Rating (Out of 5)')); ?>"
                                                        name="content[0][slider][${sliderkey}][rating]">
                                                </div>
                                            </div>
                        <div class="col-sm-12 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Description')); ?></label>
                                <textarea rows="4" name="content[0][slider][${sliderkey}][description]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 text-center">
                    <button class="remove-information remove text-danger border-0">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>`

            $('.location-area').append(html);
        });

        // testimonials tripadvisor
        $(document).on('click', '.add-tripadvisor-btn', function(e) {
            e.preventDefault();
            let key = $(this).closest('form').find(".testimonials-tripadvisor .content").length;
            key++;

            let html = `<div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][tripadvisor][${key}][name]"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        name="content[0][testimonials][tripadvisor][${key}][country]">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][tripadvisor][${key}][rating]">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][tripadvisor][${key}][time]">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][tripadvisor][${key}][img]"
                                                            id="old_file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][tripadvisor][${key}][review]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>`

            $('.testimonials-tripadvisor').append(html);
            $(".datetimepicker").datetimepicker();
        });
        // testimonials facebbok
        $(document).on('click', '.add-facebook-btn', function(e) {
            e.preventDefault();
            let key = $(this).closest('form').find(".testimonials-facebook .content").length;
            key++;

            let html = `<div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][facebook][${key}][name]"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        name="content[0][testimonials][facebook][${key}][country]">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][facebook][${key}][rating]">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][facebook][${key}][time]">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][facebook][${key}][img]"
                                                            id="old_file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][facebook][${key}][review]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>`

            $('.testimonials-facebook').append(html);
            $(".datetimepicker").datetimepicker();
        });
        // testimonials google
        $(document).on('click', '.add-google-btn', function(e) {
            e.preventDefault();
            let key = $(this).closest('form').find(".testimonials-google .content").length;
            key++;

            let html = `<div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][google][${key}][name]"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        name="content[0][testimonials][google][${key}][country]">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][google][${key}][rating]">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][google][${key}][time]">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][google][${key}][img]"
                                                            id="old_file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][google][${key}][review]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>`

            $('.testimonials-google').append(html);
            $(".datetimepicker").datetimepicker();
        });

        // offers add
        $(document).on('click', '.add-offers-btn', function(e) {
            e.preventDefault();
            let offerskey = $(this).closest('form').find(".offers-area .content").length;
            let parent = $(this).closest('form').find(".offers-area");

            offerskey++;
            let html = `<div class="row align-items-center content">
                <div class="col-sm-11">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Offer Title')); ?>"
                                    name="content[0][offers][${offerskey}][offer_title]"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Offer Discount')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Offer Discount')); ?>"
                                    name="content[0][offers][${offerskey}][offer_discount]"
                                    >
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Offer Button Text')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Offer Button Text')); ?>"
                                    name="content[0][offers][${offerskey}][offer_button]"
                                    >
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Offer Link')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Offer Link')); ?>"
                                    name="content[0][offers][${offerskey}][offer_link]"
                                    >
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Image')); ?></label>
                                <div class="d-flex">
                                    <input type="file" class="username-input widget-image-upload" name="image" data-folder="/uploads/offers/">
                                   <input type="hidden" name="content[0][offers][${offerskey}][img]" id="old_file">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-sm-1 text-center">
                    <button class="remove-information remove text-danger border-0">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>`
            if (offerskey > 4) {
                toastr["error"](`${'Maximum Offers are 4'}`);
            } else {
                $('.offers-area').append(html);

            }
        });

        // Tabs add
        $(document).on('click', '.add-tabs-btn', function(e) {
            e.preventDefault();
            let tabskey = $(this).closest('form').find(".tab-area .content").length;
            let parent = $(this).closest('form').find(".tab-area");

            tabskey++;
            let html = `<div class="row align-items-center content">
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Tab Title')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Tab Title')); ?>"
                                name="content[0][tabs][${tabskey}][tab_title]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Tab Icon')); ?></label>
                           <input type="file" class="username-input widget-image-upload"
                                            name="image" data-folder="/uploads/tabs/">

                                        <input type="hidden"
                                            name="content[0][tabs][${tabskey}][tab_img]"
                                            id="old_file">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Label')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Label')); ?>"
                                name="content[0][tabs][${tabskey}][label]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Main Title')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Main Title')); ?>"
                                name="content[0][tabs][${tabskey}][main_title]">
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Description')); ?></label>
                            <textarea class="username-input" name="content[0][tabs][${tabskey}][description]" placeholder="<?php echo e(translate('Enter Description')); ?>"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Button Text')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Button Text')); ?>"
                                name="content[0][tabs][${tabskey}][button_text]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Button Link')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Button Link')); ?>"
                                name="content[0][tabs][${tabskey}][button_link]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Video Text')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Video Text')); ?>"
                                name="content[0][tabs][${tabskey}][video_text]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Video Link')); ?></label>
                            <input type="text" class="username-input"
                                placeholder="<?php echo e(translate('Enter Video Link')); ?>"
                                name="content[0][tabs][${tabskey}][video_link]">
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Image 1')); ?></label>
                            <div class="d-flex">
                                <input type="file" class="username-input widget-image-upload" name="image1" data-folder="/uploads/tabs/">
                                <input type="hidden" name="content[0][tabs][${tabskey}][img]" id="old_file">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <div class="form-inner">
                            <label><?php echo e(translate('Image 2')); ?></label>
                            <div class="d-flex">
                                <input type="file" class="username-input widget-image-upload" name="image2" data-folder="/uploads/tabs/">
                                <input type="hidden" name="content[0][tabs][${tabskey}][img2]" id="old_file">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 tabs-freatues">
                        <div class="form-inner mb-3">
                            <label class="form-label fw-bold"
                                for=""><?php echo e(translate('Tabs Features')); ?></label>
                            <div class="tabs-features-area">

                            </div>
                            <button type="button" class="add-tabs-freatues-btn eg-btn btn--primary back-btn border-0" data-key="${tabskey}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-1 text-center">
                <button class="remove-information remove text-danger border-0">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>`;

            parent.append(html);
            $('.icon-picker').iconpicker({
                hideOnSelect: true
            });
        });

        $(document).on('click', '.add-tabs-freatues-btn', function(e) {
            e.preventDefault();
            let count = $(this).data('key');
            let parent = $(this).parent().parent();
            let key = parent.find(".features-item").length + 1;

            let html = `
        <div class="row align-items-center features-item">
            <div class="col-sm-11">
                <input type="text" class="form-control mb-1"
                    placeholder="<?php echo e(translate('Enter Features Item')); ?>"
                    name="content[0][tabs][${count}][include][${key}][item]" />
            </div>
            <div class="col-sm-1">
                <button class="remove-tabs-features remove text-danger border-0">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>`;
            parent.find(".tabs-features-area").append(html);
        });
        $(document).on('click', '.remove-tabs-features', function(e) {
            e.preventDefault();
            $(this).closest('.features-item').remove();
        });

        $(document).on('click', '.remove-tabs-features', function(e) {
            e.preventDefault();
            $(this).closest('.features-item').remove();
        });

        $(document).on('click', '.add-tabs-exclude-btn', function(e) {
            e.preventDefault();
            let count = $(this).data('key');
            let parent = $(this).closest('.tabs-exclude');
            let key = parent.find(".exclude-item").length + 1;

            let html = `<div class="row align-items-center exclude-item">
            <div class="col-sm-11">
                <input type="text" class="form-control mb-1"
                    placeholder="<?php echo e(translate('Enter Features Item')); ?>"
                    name="content[0][tabs][${count}][exclude][${key}][item]">
            </div>
            <div class="col-sm-1">
                <button class="remove-information remove text-danger border-0">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>`;
            parent.find(".tabs-exclude-area").append(html);
        });

        $(document).on('click', '.add-item-btn', function(e) {
            e.preventDefault();
            let imageContainer = $(this).closest('.form-inner').find('.image-container');
            let newImageField =
                '<input type="text" class="username-input widget-image-upload" name="content[0][tabs][][item][]" data-folder="/uploads/tabs/">';
            imageContainer.append(newImageField);
        });

        $(document).on('click', '.remove-information', function(e) {
            e.preventDefault();
            $(this).closest('.content').remove();
        });



        //=================== widget  image  upload ===============

        $(document).on("change", '.widget-image-upload', function() {
            widgetOption(this);
        });

        // ===================  themOption  read file ====================

        function widgetOption(self) {

            if (self.files && self.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    let action = "<?php echo e(route('pages.image.upload')); ?>";
                    let old_file = $(self).parent().find("#old_file").val();
                    let folder = $(self).data('folder');

                    $.ajax({
                        url: action,
                        async: true,
                        type: 'POST',
                        data: {
                            'image': e.target.result,
                            'old_file': old_file,
                            'folder': folder
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.status === true) {
                                $(self).parent().find("#old_file").val(data.image_name);
                            }
                        },
                        error: function(data) {
                        }
                    })


                };

                reader.readAsDataURL(self.files[0]);
            }
        }

        $(document).on("mouseenter", '.note-editor', function(event) {
            $(".active_widget_list").sortable("disable");
        });
        $(document).on("mouseleave", '.note-editor', function(event) {
            $(".active_widget_list").sortable("enable");
        });

        function codeRichEditor() {

            $(".summernote").summernote({

                placeholder: "Write here..",
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['hr', 'link']],
                ],
                lineHeights: ['0.5', '1.0', '1.1', '1.2', '1.3', '1.4'],
                fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '24', '36', '48',
                    '64', '82', '150'
                ],
                styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            })

        }
    }(jQuery));
</script>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/js/admin/widget-js.blade.php ENDPATH**/ ?>