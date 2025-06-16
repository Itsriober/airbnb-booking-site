<script>
    let settingProductDate = ["<?php echo $settingProductDate; ?>"];
    let orderSummeryDate = ["<?php echo $orderSummeryDate; ?>"];
    let orderSummeryQty = ["<?php echo $orderSummeryQty; ?>"];

    let customerDate = ["<?php echo $customerDate; ?>"];
    let merchantTotal = ["<?php echo $merchantTotal; ?>"];
    let customerTotal = ["<?php echo $customerTotal; ?>"];

    let widthdrawMonth = ["<?php echo $widthdrawMonth; ?>"];
    let depositMonth = ["<?php echo $depositMonth; ?>"];


    let tourOrderDate = ["<?php echo $tourOrderDate; ?>"];
    let tourOrderAmount = ["<?php echo $tourOrderAmount; ?>"];
    let hotelOrderAmount = ["<?php echo $hotelOrderAmount; ?>"];
    let activitiesOrderAmount = ["<?php echo $activitiesOrderAmount; ?>"];
    let transportOrderAmount = ["<?php echo $transportOrderAmount; ?>"];

    (function($) {
        "use strict";

        const booking_summery = document.getElementById('booking_summery');

        const booking_all_product = document.getElementById('booking_all_product');

        const customer_merchant = document.getElementById('customer_merchant');
        const disposit_widthdraw = document.getElementById('disposit_widthdraw');

        const product_selling = document.getElementById('product_selling');
        //================== booking summery js configuar start

        const bookingdata = {
            labels: orderSummeryDate,
            datasets: [{
                label: 'Booking Summery',
                data: orderSummeryQty,
                borderColor: 'rgba(54, 162, 235,1)',
                backgroundColor: 'rgba(54, 162, 235,0.5)',
                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };

        const bookingconfig = {
            type: 'line',
            data: bookingdata,
            options: {
                responsive: true,

            }
        };

        new Chart(booking_summery, bookingconfig);

        //================== booking summery js configuar end

        //================== all product booking chart js configuar start

        const allProductData = {
            labels: tourOrderDate,
            datasets: [{
                    label: 'Tour',
                    data: tourOrderAmount,
                    borderColor: 'rgba(255, 99, 132,1)',
                    backgroundColor: 'rgba(255, 99, 132,0.5)',
                },
                {
                    label: 'Hotel',
                    data: hotelOrderAmount,
                    borderColor: 'rgba(54, 162, 235,1)',
                    backgroundColor: 'rgba(54, 162, 235,0.5)',
                },
                {
                    label: 'Activites',
                    data: activitiesOrderAmount,
                    borderColor: 'rgba(16, 185, 129,1)',
                    backgroundColor: 'rgba(16, 185, 129,0.5)',
                },
                {
                    label: 'Transport',
                    data: transportOrderAmount,
                    borderColor: 'rgba(108, 46, 185,1)',
                    backgroundColor: 'rgba(108, 46, 185,0.5)',
                }
            ]
        }; 

        const allProductConfig = {
            type: 'line',
            data: allProductData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },

                }
            },
        };

        new Chart(booking_all_product, allProductConfig);


        
        const datad = {
            labels: settingProductDate,
            datasets: [{
                label: 'Product Sale',
                data: [<?php echo e($daySales); ?>],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
            }]
        };

        const config = {
            type: 'line',
            data: datad,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: { // defining min and max so hiding the dataset does not change scale range
                        min: 0,
                        max: 100
                    }
                }
            }
        };


        new Chart(product_selling, config);


        //================== customer and merchant chart js configuar start

        const customerMerchants = {
            labels: customerDate,
            datasets: [{
                    label: 'Merchants',
                    data: merchantTotal,
                    borderColor: 'rgba(54, 162, 235,1)',
                    backgroundColor: 'rgba(54, 162, 235,0.5)',
                    stack: 'combined',
                    type: 'bar'
                },
                {
                    label: 'Customers',
                    data: customerTotal,
                    borderColor: 'rgba(255, 99, 132,1)',
                    backgroundColor: 'rgba(255, 99, 132,0.5)',
                    stack: 'combined'
                }
            ]
        };


        const customerMerchantsConfig = {
            type: 'line',
            data: customerMerchants,
            options: {

                scales: {
                    y: {
                        stacked: true
                    }
                }
            },
        };

        new Chart(customer_merchant, customerMerchantsConfig);


        //================== customer and merchant chart js configuar end
        
        
        //================== deposit and widthdraw chart js configuar start

        const depostiWidthdrawData = {
            labels: depositMonth,
            datasets: [{
                    label: 'Deposit',
                    data: [<?php echo e($depositSum); ?>],
                    borderColor: 'rgb(75, 192, 192)',
                },
                {
                    label: 'Widthdraw ',
                    data: [<?php echo e($widthdrawSum); ?>],
                    borderColor: 'rgba(255, 99, 132,1)',
                }
            ]
        };

        const depostiWidthdrawConfig = {
            type: 'line',
            data: depostiWidthdrawData,
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,

                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',

                        // grid line settings
                        grid: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    },
                }
            },
        };

        new Chart(disposit_widthdraw, depostiWidthdrawConfig);

        //================== deposit and widthdraw chart js configuar end

    })(jQuery);
</script>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/js/admin/dashboard.blade.php ENDPATH**/ ?>