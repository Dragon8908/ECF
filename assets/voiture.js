$( function() {
    $( "#price-slider-range" ).slider({
        range: true,
        min: 0,
        max: 35000,
        values: [ 0, 35000 ],
        slide: function( event, ui ) {
            $( "#price-amount" ).val( ui.values[ 0 ] + "€ - " + ui.values[ 1 ] + "€");
        }
        });
        $( "#price-amount" ).val($( "#price-slider-range" ).slider( "values", 0 ) +
        "€ - " + $( "#price-slider-range" ).slider( "values", 1 ) + "€");
    } );

$(function () {
    $("#price-slider-range").slider();
    $("#price-slider-range").on('slidechange', function () {
        filterCars();
    })
});

$( function() {
    $( "#km-slider-range" ).slider({
        range: true,
        min: 0,
        max: 350000,
        values: [ 0, 350000 ],
        slide: function( event, ui ) {
            $( "#km-amount" ).val( ui.values[ 0 ] + "km - " + ui.values[ 1 ] + "km");
        }
        });
        $( "#km-amount" ).val($( "#km-slider-range" ).slider( "values", 0 ) +
        "km - " + $( "#km-slider-range" ).slider( "values", 1 ) + "km");
    } );

$(function () {
    $("#km-slider-range").slider();
    $("#km-slider-range").on('slidechange', function () {
        filterCars();
    })
});

$( function() {
    $( "#year-slider-range" ).slider({
        range: true,
        min: 1990,
        max: 2023,
        values: [ 1990, 2023 ],
        slide: function( event, ui ) {
            $( "#year-amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
        });
        $( "#year-amount" ).val($( "#year-slider-range" ).slider( "values", 0 ) +
        " - " + $( "#year-slider-range" ).slider( "values", 1 ));
    } );

$(function () {
    $("#year-slider-range").slider();
    $("#year-slider-range").on('slidechange', function () {
        filterCars();
    })
});

function filterCars() {
    $.ajax({
        url : '/cars',
        type: "POST",
        data : JSON.stringify({
                        'minPrice': $( "#price-slider-range" ).slider( "values", 0 ),
                        'maxPrice': $( "#price-slider-range" ).slider( "values", 1 ),
                        'minKm': $( "#km-slider-range" ).slider( "values", 0 ),
                        'maxKm': $( "#km-slider-range" ).slider( "values", 1 ),
                        'minYear': $( "#year-slider-range" ).slider( "values", 0 ),
                        'maxYear': $( "#year-slider-range" ).slider( "values", 1 )
                    }),
        success: function(response) {
                $('#carsList').html(response);
            }
        });
}