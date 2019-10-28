$(document).ready(function() {
    $('#mainmenu').meanmenu({
        meanScreenWidth: "1000"
    });
});

$(document).ready(function() {
    $('#contentfilter').mixitup({
        effects: ['fade'],
        resizeContainer: true,
        animateGridList: false,
        transitionSpeed: 300
    });
});

$(document).ready(function() {
    $('#click-modal, .mean-last').click(function() {
        $("#overlaymodal").show();
        $("#modalbox").show();
        return false;
    });
    $('#overlaymodal').click(function() {
        $(this).hide();
        $("#modalbox").hide();
        return false;
    });
    $('.modal-close').click(function() {
        $("#overlaymodal").hide();
        $("#modalbox").hide();
        return false;
    });
});

$(document).ready(function() {
    $('.click-modalcart').click(function() {
        if(parseInt($("#content_cart").attr('data-total'))===0){
            apprise($("#cart_empty").html());
        }else{
            $("#overlaycart").show();
            $("#modalcart").show();
            $('#modalcart_scroll').tinyscrollbar();
        }
        return false;
    });
    $('#overlaycart').click(function() {
        $(this).hide();
        $("#modalcart").hide();
        return false;
    });
    $('.closecart').click(function() {
        $("#overlaycart").hide();
        $("#modalcart").hide();
        return false;
    });
});

$(document).ready(function() {
    $("#addMe").click(function() {
        var counter = parseInt($("#hiddenVal").val());
        counter++;
        $("#hiddenVal").val(counter);
        $("#theCount").text(counter);
    });
});

$(document).ready(function() {
//    $('select').customSelectBox().change(function() {
//    });
});

$(document).ready(function() {
    $('.klik-vacancy-popup').magnificPopup({
        type: 'inline',
        midClick: true
    });
});

$(document).ready(function() {
    $('#vacancy').pajinate({
        items_per_page: 8
    });
    $('#quickfind').pajinate({
        items_per_page: 12
    });
});

$(document).ready(function() {
    $("#slidescurve, #slidescurve-mobile").responsiveSlides({
        auto: true,
        pagination: true,
        pauseControls: true,
        nav: true,
        speed: 10000,
        maxwidth: 1000,
timeout: 60000
    });
});

$(document).ready(function() {
    $("#slidescurve-desktop").responsiveSlides({
        auto: true,
        pagination: true,
        pauseControls: true,
        nav: true,
        speed: 1300,
        maxwidth: 1000,
        pager: false,
timeout: 8000
    });
});

//$(document).ready(function() {
//    $("#timeline").timelinr({
//        orientation: 'vertical',
//        issuesSpeed: 300,
//        datesSpeed: 100,
//        arrowKeys: 'true',
//        startAt: 4
//    })
//});

$(document).ready(function() {
    $('.tooltip').tooltipster({
        fixedWidth: 300,
        speed: 200
    });
});


$(document).ready(function() {
    // This button will increment the value
    $('.plus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".minus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});

$(document).ready(function() {
    $("#begin-edit").click(function() {
        $(".begin-edit").removeAttr("disabled");
        $(".begin-edit").addClass("border-yellow");
    });
});

$(document).ready(function() {
    $("#dob, #period").mask("99/99/9999", {placeholder: '_'});
});

/*
	$(window).scroll(function() {
		$('.girl').css( "bottom", "-171px" );
		if (  document.documentElement.clientHeight + 
			  $(document).scrollTop() >= document.body.offsetHeight )
		{  
		   $('.girl').css( "bottom", "-79px" );
		}
	});
*/