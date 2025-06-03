(function ($) {
    "use strict";


    // sidebar toggle area

    $('.sidebar-toggle-button').on("click", function () {
        $('.sidebar-header').toggleClass('slide');
        $('.main-conent-header').toggleClass('slide');
        $('.sidebar-wrapper').toggleClass('slide');
        $('.sidebar-search').toggleClass('slide');
        $('.main-content').toggleClass('slide');
    });


    // textarea summernote


    $('#summernote').summernote({
        height: 200,
        placeholder: "Write here..",
        height: 200,
        toolbar: [

            ['style', ['style']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['hr','link']],


        ],
        styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5','h6'],
        lineHeights: ['0.5', '1.0', '1.1', '1.2', '1.3', '1.4'],
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '24', '36', '48', '64', '82', '150'],
    });
    $('.summernote').summernote({
        placeholder: "Write here..",
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['hr','link']],


        ],
        lineHeights: ['0.5', '1.0', '1.1', '1.2', '1.3', '1.4'],
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '24', '36', '48', '64', '82', '150'],
        styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5','h6'],
    });



    // adding input with click
    let index = $('#hotel_policy .inputFormRow').length;

    $("#addRow").on("click", function () {

        index++

        let html = `<div class="mb-3 row g-3 inputFormRow">
            <div class="col-md-5">
                <input type="text" name="policy[${index}][title]" class="m-input" placeholder="Enter Title" autocomplete="off">
            </div>
             <div class="col-md-6">
                <textarea name="policy[${index}][content]" class="n-input" placeholder="Enter Content"></textarea>
                </div>
                <div class="col-md-1">
                <button id="removeRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#hotel_policy').append(html);
    });

    $(document).on('click', '#removeRow', function () {
        $(this).closest('.inputFormRow').remove();
    });

     // adding input with click fixed date
     let fixed_date_show = $('#fixed_date_show .dateFormRow').length;

     $("#dateAddRow").on("click", function () {
        fixed_date_show++
 
         let html = `<div class="mb-3 row dateFormRow">
                            <div class="col-md-4">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[${fixed_date_show}][start_date]" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[${fixed_date_show}][end_date]" placeholder="End Date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[${fixed_date_show}][booking_date]" placeholder="Last Booking Date">
                                </div>
                            </div>
                 <div class="col-md-1">
                 <button id="dateRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                 <i class="bi bi-x"></i></button></div><div class="input-group-append">
             </div>
         </div>`;
         $('#fixed_date_show').append(html);
         $(".datepicker").datetimepicker({
            'showTimepicker': false,
            dateFormat: 'yy-mm-dd'
        });
     });
 
     $(document).on('click', '#dateRemoveRow', function () {
         $(this).closest('.dateFormRow').remove();
     });

    // adding input with click Person Types
    let person_types = $('#person_types .personTypesFormRow').length;

    $("#personTypesAddRow").on("click", function () {
        person_types++

        let html = `<div class="mb-3 row g-3 personTypesFormRow">
            <div class="col-md-5">
                <div class="form-inner mb-25">
                <input type="text" name="person_types[${person_types}][name]" class="m-input mb-2" placeholder="Person Types Name" autocomplete="off">
                <input type="text" name="person_types[${person_types}][desc]" class="m-input" placeholder="Person Types Description" autocomplete="off">
                </div>
            </div>
                <div class="col-md-3">
                <div class="form-inner mb-25">
                <input type="number" min="0" step="1" name="person_types[${person_types}][min]" class="n-input mb-2" placeholder="Min">
                <input type="number" min="0" step="1" name="person_types[${person_types}][max]" class="n-input" placeholder="Max">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-inner mb-25">
                    <input type="number" min="0" step="0.1" name="person_types[${person_types}][price]" class="n-input" placeholder="Price">
                </div></div>
                <div class="col-md-1">
                <button id="personTypesRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#person_types').append(html);
    });

    $(document).on('click', '#personTypesRemoveRow', function () {
        $(this).closest('.personTypesFormRow').remove();
    });


    $(".enable_person_types").change(function() {
        if(this.checked) {
            $('.person_types_show').removeClass("d-none");
        }else{
            $('.person_types_show').addClass("d-none");
        }
    });

        // adding input with click
        let extra_price = $('#hotel_extra_price .priceFormRow').length;

        $("#extraPriceAddRow").on("click", function () {
            extra_price++
    
            let html = `<div class="mb-3 row g-3 priceFormRow">
                <div class="col-md-5">
                    <div class="form-inner mb-25">
                    <input type="text" name="extra_price[${extra_price}][name]" class="m-input" placeholder="Extra Price Name" autocomplete="off">
                    </div>
                </div>
                    <div class="col-md-3">
                    <div class="form-inner mb-25">
                    <input type="number" min="0" step="0.1" name="extra_price[${extra_price}][price]" class="n-input" placeholder="Price">
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                        <label class="form-check-label" for="price_types${extra_price}1">
                            <input class="form-check-input" type="radio" name="extra_price[${extra_price}][price_type]" value="one_time" id="price_types${extra_price}1" checked>
                                Price One Time
                            </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label" for="price_types${extra_price}2">
                        <input class="form-check-input" type="radio" name="extra_price[${extra_price}][price_type]" value="per_person" id="price_types${extra_price}2">
                            Price Per Person
                        </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                    <button id="extraPriceRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                    <i class="bi bi-x"></i></button></div><div class="input-group-append">
                </div>
            </div>`;
            $('#hotel_extra_price').append(html);
        });
    
        $(document).on('click', '#extraPriceRemoveRow', function () {
            $(this).closest('.priceFormRow').remove();
        });


        $(".enable_extra_price").change(function() {
            if(this.checked) {
                $('.extra_price_show').removeClass("d-none");
            }else{
                $('.extra_price_show').addClass("d-none");
            }
        });


        // adding input with click for Service fee
        let service_fee = $('#hotel_service_fee .serviceFormRow').length;

        $("#serviceFeeAddRow").on("click", function () {
    
            service_fee++
    
            let html = `<div class="mb-3 row g-3 serviceFormRow">
                <div class="col-md-7">
                    <div class="form-inner mb-25">
                    <input type="text" name="service_fee[${service_fee}][name]" class="m-input" placeholder="Service Name" autocomplete="off">
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-inner mb-25">
                    <input type="number" name="service_fee[${service_fee}][price]" class="n-input" placeholder="Price">
                    </div></div>
                    <div class="col-md-6">
                    <div class="form-inner mb-25">
                    <select name="service_fee[${service_fee}][unit]">
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percent</option>
                    </select>
                    </div></div>
                    </div>
                </div>
                    
                    <div class="col-md-4">
                        <div class="form-check">
                        <label class="form-check-label" for="price_type${service_fee}1">
                            <input class="form-check-input" type="radio" name="service_fee[${service_fee}][price_type]" value="one_time" id="price_type${service_fee}1" checked>
                                Price One Time
                            </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label" for="price_type${service_fee}2">
                        <input class="form-check-input" type="radio" name="service_fee[${service_fee}][price_type]" value="per_person" id="price_type${service_fee}2">
                            Price Per Person
                        </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                    <button id="serviceFeeRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                    <i class="bi bi-x"></i></button></div><div class="input-group-append">
                </div>
            </div>`;
            $('#hotel_service_fee').append(html);
        });
    
        $(document).on('click', '#serviceFeeRemoveRow', function () {
            $(this).closest('.serviceFormRow').remove();
        });


        $(".enable_service_fee").change(function() {
            if(this.checked) {
                $('.service_fee_show').removeClass("d-none");
            }else{
                $('.service_fee_show').addClass("d-none");
            }
        });


        // adding input with click for education
        let education = $('#hotel_education .educationFormRow').length;

        $("#educationAddRow").on("click", function () {
    
            education++
    
            let html = `<div class="mb-3 row g-3 educationFormRow">
                <div class="col-md-6">
                    <div class="form-inner mb-25">
                    <input type="text" name="education[${education}][name]" class="m-input" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <textarea name="education[${education}][content]" class="form-control" placeholder="Content"></textarea>
                    </div>
                </div>
                 <div class="col-md-5">
                    <div class="form-inner mb-25">
                    <input type="number" min="0" step="0.01" name="education[${education}][distance]" class="m-input" placeholder="Distance" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <select name="education[${education}][distance_type]">
                    <option value="m">m</option>
                    <option value="km">km</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-1">
                    <button id="educationRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                    <i class="bi bi-x"></i></button></div><div class="input-group-append">
                </div>
            </div>`;
            $('#hotel_education').append(html);
        });
    
        $(document).on('click', '#educationRemoveRow', function () {
            $(this).closest('.educationFormRow').remove();
        });

        // adding input with click for health
        let health = $('#hotel_health .healthFormRow').length;

        $("#healthAddRow").on("click", function () {
    
            health++
    
            let html = `<div class="mb-3 row g-3 healthFormRow">
                <div class="col-md-6">
                    <div class="form-inner mb-25">
                    <input type="text" name="health[${health}][name]" class="m-input" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <textarea name="health[${health}][content]" class="form-control" placeholder="Content"></textarea>
                    </div>
                </div>
                 <div class="col-md-5">
                    <div class="form-inner mb-25">
                    <input type="number" min="0" step="0.01" name="health[${health}][distance]" class="m-input" placeholder="Distance" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <select name="health[${health}][distance_type]">
                    <option value="m">m</option>
                    <option value="km">km</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-1">
                    <button id="healthRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                    <i class="bi bi-x"></i></button></div><div class="input-group-append">
                </div>
            </div>`;
            $('#hotel_health').append(html);
        });
    
        $(document).on('click', '#healthRemoveRow', function () {
            $(this).closest('.healthFormRow').remove();
        });


        // adding input with click for transportation
        let transportation = $('#hotel_transportation .transportationFormRow').length;

        $("#transportationAddRow").on("click", function () {
    
            transportation++
    
            let html = `<div class="mb-3 row g-3 transportationFormRow">
                <div class="col-md-6">
                    <div class="form-inner mb-25">
                    <input type="text" name="transportation[${transportation}][name]" class="m-input" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <textarea name="transportation[${transportation}][content]" class="form-control" placeholder="Content"></textarea>
                    </div>
                </div>
                 <div class="col-md-5">
                    <div class="form-inner mb-25">
                    <input type="number" min="0" step="0.01" name="transportation[${transportation}][distance]" class="m-input" placeholder="Distance" autocomplete="off">
                    </div>
                    <div class="form-inner mb-25">
                    <select name="transportation[${transportation}][distance_type]">
                    <option value="m">m</option>
                    <option value="km">km</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-md-1">
                    <button id="transportationRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                    <i class="bi bi-x"></i></button></div><div class="input-group-append">
                </div>
            </div>`;
            $('#hotel_transportation').append(html);
        });
    
        $(document).on('click', '#transportationRemoveRow', function () {
            $(this).closest('.transportationFormRow').remove();
        });



    // add-file-input

    $("#addRow2").on('click', function () {

        var html = '';
        html += '<div id="inputTypeFile">';
        html += '<div class="mb-3 row g-3">';
        html += '<div class="col-12 d-flex flex-row justify-content-center">';
        html += '<input type="file" name="attachment[]" class=" m-input" placeholder="No File Choosen">';
        html += '<button id="removeRow2" type="button" class="eg-btn btn--red rounded px-3"><i class="bi bi-x"></i></button>';
        html += '</div>';
        html += '<div class="input-group-append">';
        html += '</div>';
        html += '</div>';
        $('#newInputFile').append(html);
    });

    $(document).on('click', '#removeRow2', function () {
        $(this).closest('#inputTypeFile').remove();
    });

    // adding input with click for FAQs
    let faqs = $('#faqs .faqsFormRow').length;

    $("#faqsAddRow").on("click", function () {
        faqs++

        let html = `<div class="row faqsFormRow">
            <div class="col-md-5">
                <div class="form-inner mb-25">
                <input type="text" name="faqs[${faqs}][title]" class="m-input" placeholder="Enter Question" autocomplete="off">
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <textarea name="faqs[${faqs}][content]" class="n-input" placeholder="Enter Answer"></textarea>
                </div>
                </div>
                <div class="col-md-1">
                <button id="faqsRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#faqs').append(html);
    });

    $(document).on('click', '#faqsRemoveRow', function () {
        $(this).closest('.faqsFormRow').remove();
    });

    // adding input with click for specs
    let specs = $('#specs .specsFormRow').length;

    $("#specsAddRow").on("click", function () {
        specs++

        let html = `<div class="row specsFormRow">
            <div class="col-md-5">
                <div class="form-inner mb-25">
                <input type="text" name="specs[${specs}][title]" class="m-input" placeholder="Enter Title" autocomplete="off">
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <textarea name="specs[${specs}][content]" class="n-input" placeholder="Enter Content"></textarea>
                </div>
                </div>
                <div class="col-md-1">
                <button id="specsRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#specs').append(html);
    });

    $(document).on('click', '#specsRemoveRow', function () {
        $(this).closest('.specsFormRow').remove();
    });

    // adding input with click for Include
    let includes = $('#includes .includeFormRow').length;

    $("#includeAddRow").on("click", function () {
        includes++

        let html = `<div class="row includeFormRow">
            <div class="col-md-11">
                <div class="form-inner mb-25">
                <input type="text" name="includes[${includes}][title]" class="m-input" placeholder="Enter include item" autocomplete="off">
                </div>
            </div>
                <div class="col-md-1">
                <button id="includeRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#includes').append(html);
    });

    $(document).on('click', '#includeRemoveRow', function () {
        $(this).closest('.includeFormRow').remove();
    });

    // adding input with click for Exclude
    let excludes = $('#excludes .excludeFormRow').length;

    $("#excludeAddRow").on("click", function () {
        excludes++

        let html = `<div class="row excludeFormRow">
            <div class="col-md-11">
                <div class="form-inner mb-25">
                <input type="text" name="excludes[${excludes}][title]" class="m-input" placeholder="Enter exclude item" autocomplete="off">
                </div>
            </div>
                <div class="col-md-1">
                <button id="excludeRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#excludes').append(html);
    });

    $(document).on('click', '#excludeRemoveRow', function () {
        $(this).closest('.excludeFormRow').remove();
    });

    // adding input with click for highlights
    let highlights = $('#highlights .highlightFormRow').length;

    $("#highlightAddRow").on("click", function () {
        highlights++

        let html = `<div class="row highlightFormRow">
            <div class="col-md-11">
                <div class="form-inner mb-25">
                <input type="text" name="highlights[${highlights}][title]" class="m-input" placeholder="Enter highlight item" autocomplete="off">
                </div>
            </div>
                <div class="col-md-1">
                <button id="highlightRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#highlights').append(html);
    });

    $(document).on('click', '#highlightRemoveRow', function () {
        $(this).closest('.highlightFormRow').remove();
    });

    // adding input with click for activities plan
    let activities_plan = $('#activities_plan .activitiesPlanFormRow').length;

    $("#activitiesPlanAddRow").on("click", function () {
        activities_plan++

        let html = `<div class="row activitiesPlanFormRow">
            <div class="col-md-11">
                <div class="row">
                <div class="col-md-5">
                    <div class="form-inner mb-25">
                        <input type="number" name="activities_plan[${activities_plan}][day]" class="m-input" placeholder="Enter Day No" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-inner mb-25">
                        <input type="text" name="activities_plan[${activities_plan}][title]" class="m-input" placeholder="Enter Day Title" autocomplete="off">
                    </div>
                </div>
                </div>
                <div class="form-inner mb-25">
                <input type="text" name="activities_plan[${activities_plan}][morning]" class="m-input" placeholder="Enter Morning Activities" autocomplete="off">
                </div>
                <div class="form-inner mb-25">
                <input type="text" name="activities_plan[${activities_plan}][midday]" class="m-input" placeholder="Enter Midday Activities" autocomplete="off">
                </div>
                <div class="form-inner mb-25">
                <input type="text" name="activities_plan[${activities_plan}][afternoon]" class="m-input" placeholder="Enter Afternoon Activities" autocomplete="off">
                </div>
                <div class="form-inner mb-25">
                <input type="text" name="activities_plan[${activities_plan}][evening]" class="m-input" placeholder="Enter Evening Activities" autocomplete="off">
                </div>
                <div class="form-inner mb-25">
                <input type="text" name="activities_plan[${activities_plan}][night]" class="m-input" placeholder="Enter Night Activities" autocomplete="off">
                </div>
            </div>
                <div class="col-md-1">
                <button id="activitiesPlanRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#activities_plan').append(html);
    });

    $(document).on('click', '#activitiesPlanRemoveRow', function () {
        $(this).closest('.activitiesPlanFormRow').remove();
    });

    // adding input with click for itinerary
    let itinerary = $('#itinerary .itineraryFormRow').length;

    $("#itineraryAddRow").on("click", function () {
        itinerary++

        let html = `<div class="row itineraryFormRow">
            <div class="col-md-5">
                <div class="form-inner mb-25">
                <input type="text" name="itinerary[${itinerary}][title]" class="m-input mb-2" placeholder="Enter Title" autocomplete="off">
                </div>
            </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <textarea name="itinerary[${itinerary}][content]" class="n-input" placeholder="Enter Content"></textarea>
                </div>
                </div>
                <div class="col-md-1">
                <button id="itineraryRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
                <i class="bi bi-x"></i></button></div><div class="input-group-append">
            </div>
        </div>`;
        $('#itinerary').append(html);
    });

    $(document).on('click', '#itineraryRemoveRow', function () {
        $(this).closest('.itineraryFormRow').remove();
    });

    $(".enable_fixed_date").change(function() {
        if(this.checked) {
            $('.fixed_date_show').removeClass("d-none");
        }else{
            $('.fixed_date_show').addClass("d-none");
        }
    });
    $(".enable_open_hours").change(function() {
        if(this.checked) {
            $('.open_hours_show').removeClass("d-none");
        }else{
            $('.open_hours_show').addClass("d-none");
        }
    });
    // select2


    $('.js-example-basic-single').select2({
        width: '100%'
    });

    // timepicker
    $(function () {
        $("#timepicker").datetimepicker({
            timeOnly:true,
    });
    });
    $(function () {
        $("#timepicker2").datetimepicker({
            timeOnly:true,
    });
    });


    // datepicker
    $(function () {
        $(".datepicker").datetimepicker({
            'showTimepicker': false,
            dateFormat: 'yy-mm-dd'
        });
    });
    $(function () {
        $("#datepicker").datetimepicker();
    });
    $(function () {
        $("#datepicker2").datetimepicker({
            timeOnly:true,

    });
    });
    $(function () {
        $("#datepicker3").datetimepicker(
            { 
                dateFormat: 'dd-mm-yy',
             }
        );
    });

    $(function () {
        $("#datepicker4").datetimepicker({ 
            dateFormat: 'dd-mm-yy',
         });
    });

    $(function () {
        $("#datepicker5").datetimepicker({ 
            dateFormat: 'dd-mm-yy',
         });
    });
    


    // timer start
    function makeTimer() {
        var end_date = $("#bid_end_time").val();
        var endTime = new Date(end_date);
        var endTime = (Date.parse(endTime)) / 1000; //replace these two lines with the unix timestamp from the server
        var now = new Date();
        var now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        if (endTime < now) {
            hours = "00";
            minutes = "00";
            seconds = "00";
            days = "00";
        }

        $("#timer1 #days1").html(days);
        $("#timer1 #hours1").html(hours);
        $("#timer1 #minutes1").html(minutes);
        $("#timer1 #seconds1").html(seconds);

    }
    setInterval(function () {
        makeTimer();
    }, 1000);
    // timer end


    //color picker with addon
    $(function () {
        $('.primary-color').colorpicker();

        $('.primary-color').on('colorpickerChange', function (event) {
            $('.primary-color .fa-square').css('color', event.color.toString());
        });

        $('.secondary-color').colorpicker();

        $('.secondary-color').on('colorpickerChange', function (event) {
            $('.secondary-color .fa-square').css('color', event.color.toString());
        });
    });


    $(document).ready(function () {

        $('#shop_name').blur(function () {
            var error_shop_name = '';
            var shop_name = $('#shop_name').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "/shop_name_available_check",
                method: "POST",
                data: { shop_name: shop_name, _token: _token },
                success: function (result) {
                    if (result == 0) {
                        $('#error_shop_name').html('<div class="text-success">Shop Name Available</div>');
                        $('#shop_name').removeClass('has-error');
                        $('#saveBtn').attr('disabled', false);
                    }
                    else {
                        $('#error_shop_name').html('<div class="error text-danger">Shop Name not Available. Please try again.</div>');
                        $('#shop_name').addClass('has-error');
                        $('#saveBtn').attr('disabled', 'disabled');
                    }
                }
            })
        });
    });


    let timeZone = $("#timezoneValue").val();
    if (timeZone !== "") {
        $("#time_zone").val(`${timeZone}`).trigger("change");
    }


    $(".editorContainer").each((index, value) => {

        CodeMirror.fromTextArea($(".editorContainer")[index], {
            mode: "javascript",
            lineNumbers: true,
            theme: "dracula",
            extraKeys: { "Ctrl-Space": "autocomplete" }
        });


    })



}(jQuery));
