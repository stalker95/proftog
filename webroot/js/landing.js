
var global_curs = 1;
var global_curs_dollar = 1;
var x, i, j, selElmnt, a, b, c;


$(document).ready(function() {

 $(".product_tabs_top_item").click(function() {
   
   var index = $(this).index();

   $(".product_tabs_top_item").removeClass("product_tabs_top_item_active");
   $(this).addClass("product_tabs_top_item_active");
   $(".product_tabs_item").css("display","none");
   $(".product_tabs_item").eq(index).css("display","block");

 });

 $(".header_mobile_top").click(function() {
   $('.header_mobile_list').slideToggle();
 });

 $(".propose_left_top").click(function() {
   $(this).parent().parent().find('.propose_list').slideToggle();
 });
 
 $(".header_search").click(function() {
  $(".haeder_search_popup").css("display","block");
 });

 $(".close_search_form").click(function() {
  $(".haeder_search_popup").css("display","none");
 });

 $(".header_bascet_top").click(function() {
   $(".header_bascket_list").slideToggle();
 });

$(".header_menu").click(function() {
  $(".mobile_menu").animate({
    right: "+=320",
  }, 500, function() {
    // Animation complete.
  });
});


$(".mobile_menu_close").click(function() {
  $(".mobile_menu").animate({
    right: "-=320",
  }, 500, function() {
    // Animation complete.
  });
});

var type_currency = 1;
var custom_currency;
var custom_currency_dollar;
$.ajax({
        url: ''+currency_url+'/currency/get-type-currency',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){ 
                   type_currency = data.result.type;
                   custom_currency = data.result.value;
                   custom_currency_dollar = data.result.value_dollar;
        }
     });
setTimeout(function() {
  if (type_currency == 1) {
    setTimeout(function() {
var flickerAPI = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
  $.getJSON( flickerAPI, {
    tags: "mount rainier",
    tagmode: "any",
    format: "json"
  })
  .done(function(data) {
    global_curs = data[1]['buy'];
    global_curs_dollar = data[0]['buy'];
    console.log(data);
   $(".translate_price").each(function() {
        var price= parseInt($(this).text());
        if ($(this).attr('data-currency') == 2) {
        $(this).text(Math.floor(price * global_curs));
      }
      if ($(this).attr('data-currency') == 3) {
        $(this).text(Math.floor(price * global_curs_dollar));
      }
        $(this).css("opacity","1");
    });
  })
}, 500);
  } else {
    global_curs = custom_currency;
    $(".translate_price").each(function() {
        var price= parseInt($(this).text());
        if ($(this).attr('data-currency') == 2) {
        $(this).text(Math.floor(price * custom_currency));
        }

        if ($(this).attr('data-currency') == 3) {
        $(this).text(Math.floor(price * custom_currency_dollar));
        }
        $(this).css("opacity","1");
    });

  }

},600);


$(".propose_item_list_two").each(function(i) {
  if ($(this).find('a').length > 0 ) {
    $(this).parent().addClass('propose_item_list_item_float');
    $(this).parent().parent().addClass('propose_item_list_big');
  }

});

$(".propose_item_list").each(function(i) {
var top = 20;
  $(this).find('.propose_item_list_item_float').each(function(el) {
     $(el).css("top",top+"px");
  top = top + 150;
  });
  
});

$(".sales_list_item").eq(0).css('display', 'flex');
$(".sales_categories_item").eq(0).addClass('sales_categories_item_active');

$(".sales_categories_item").click(function() {
  var index = $(this).index();
  $(".sales_categories_item").removeClass('sales_categories_item_active');
  $(this).addClass('sales_categories_item_active');
  
  $(".sales_list_item").css('display', 'none');
  $(".sales_list_item").eq(index).css('display', 'flex');

});

$(".filter_elements_items_item_close").click(function() {
   
   $(this).toggleClass('filter_elements_items_item_close_closed');

   if ($(this).hasClass('filter_elements_items_item_close_closed')) {
     $(this).find('.fa').removeClass('fa-plus');
     $(this).find('.fa').addClass('fa-minus');

   }
   else {
     $(this).find('.fa').removeClass('fa-minus');
     $(this).find('.fa').addClass('fa-plus');
   }
   
   $(this).parent().parent().find('.filter_elements_items_item_bottom').slideToggle();
});

});

$(document).ready(function(){
$(".custom-select-two").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
   $("#product_sort").submit();
});
});