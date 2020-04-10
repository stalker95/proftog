
var global_curs = 1;
var global_curs_dollar = 1;
var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

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

