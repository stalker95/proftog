$(window).ready(function(){
});



  var count=0;
var mass= new Array();
  $(document).ready(function(){
$('body').on('click',".delete_item" , function() {
   count=$(".delete_item:checked").length;
   var id=$(this).index();
   var value=$(this).val();
if ($(this).is(":checked")) {
     mass.push(value);
}
else {
  var index = mass.indexOf(value);
if (index >= 0) {
  mass.splice( index, 1 );
}
}
console.log(unique(mass));
show_delete_form();
check_fill_checkbox();
 });

 function unique(arr) {
  var result = [];

  nextInput:
    for (var i = 0; i < arr.length; i++) {
      var str = arr[i]; // для каждого элемента
      for (var j = 0; j < result.length; j++) { // ищем, был ли он уже?
        if (result[j] == str) continue nextInput; // если да, то следующий
      }
      result.push(str);
    }

  return result;
}

function show_delete_form() {
  var html="";
   $(".delete_form_checked_inputs").html("");
   console.log(mass.length);
     if (mass.length!=0) {
       $(".delete_form_checked").css("display","inline-block");
       for (var i=0;i<mass.length;i++) {
         html=html+"<input type='text' name='ids[]' style='display:none;' value="+mass[i]+" id="+mass[i]+"/>";
       }
    $(".delete_form_checked_inputs").html(html);
  }
}
function hide_delete_form() {
  var html="";
   $(".delete_form_checked_inputs").html("");
   $(".delete_form_checked").css("display","none");
}

function check_fill_checkbox() {
   if ($(".delete_item:checked").length==0) {
     $(".delete_form_checked_inputs").html("");
   $(".delete_form_checked").css("display","none");
        $('#delete-all').prop('checked', false); 
   hide_delete_form();
   }
}


    var baseUrl = location.protocol+"//"+location.hostname+'/' ;
$(".delete-notification").click(function() {
 var id = $(this).attr("data-item");
 var count=$(".label.label-warning").text();
   $.ajax({
     type: "POST",
     url: ""+baseUrl+"admin/notifications/delete/"+id+"",
     data: "id="+id,
     success: function(data) {
       $(this).parent().parent().fadeOut();
       $(".label.label-warning").text(count-1);
       console.log(count-1);
      }
  });
   $(this).parent().parent().fadeOut();
   $(".label.label-warning").text(count-1);
});


$("#delete-all").click(function() {
  if ($(this).is(":checked")) {
      $('.delete_item').prop('checked', true); 
      $('.delete_item').each(function(index) {
         var value=$(this).val();
      mass.push(value);
      });
     show_delete_form();
   }
    else {
     $('.delete_item').prop('checked', false); 
        
        hide_delete_form();
     }
   
});



});

  $(document).ready(function(){


$(".close__modal").click(function() {
            $(".close").trigger( "click" );

});

$('.choose__color').click(function() {
  $('.pickshell').css("display",'block');
});

$(".color_picker_close").click(function() {
  $('.pickshell').css("display",'none');
});




});  
$(document).ready(function() {
jQuery.fn.pickify = function() {
  return this.each(function() {
    $picker = $(this);
    $icon = $picker.children('.icon');
    $input = $picker.children('input.change');
    $board = $picker.children('.board');
    $choice = $board.children();
    $rainbow = $picker.children('.rainbow');
    
    var colors = $picker.attr('data-hsv').split(',');
    $picker.data('hsv', {h: colors[0], s: colors[1], v: colors[2]})
    var hex = '#'+rgb2hex(hsv2rgb({h: colors[0], s: colors[1], v: colors[2]}));
    $input.val(hex);
    $('body').add($icon).css('background-color', hex);
    
    // making things happen
    $rainbow.slider({
      value: colors[0],
      min: 0,
      max: 360,
      slide: function(event, ui) {changeHue(ui.value)},
      stop: function() {changeColour($picker.data('hsv'), true)}
    })
    $choice.draggable({
      containment: '.board',
      cursor: 'crosshair',
      create: function() {$choice.css({'left': colors[1]*1.8, 'top': 180-colors[2]*1.8});},
      drag: function(event, ui) {changeSatVal(ui.position.left, ui.position.top)},
      stop: function() {changeColour($picker.data('hsv'), true)}
    });
    $board.on('click', function(e) {
      var left = e.pageX-$board.offset().left;
      var top = e.pageY-$board.offset().top;
      $choice.css({'left': left, 'top': top});
      changeSatVal(left, top);
      changeColour($picker.data('hsv'), true);
    });
    
    // drag var actions
    function changeHue(hue) {
      $board.css('background-color', 'hsl('+hue+',100%,50%)');
      var hsv = $picker.data('hsv');
      hsv.h = hue;
      changeColour(hsv);
    }
    function changeSatVal(sat,val) {
      sat = Math.floor(sat/1.8);
      val = Math.floor(100-val/1.8);
      var hsv = $picker.data('hsv');
      hsv.s = sat;
      hsv.v = val;
      changeColour(hsv);
    }
    
    // changing the colours
    function changeColour(hsv, restyle, hex) {
      var rgb = hsv2rgb(hsv);
      if (!hex) {var hex = rgb2hex(rgb)}
      $picker.data('hsv', hsv).data('hex', hex).data('rgb', rgb);
      $icon.css('background-color', '#'+hex);
      $input.val('#'+hex);
       $(".chosed_color").val('#'+hex);
      if (restyle) {
        changeStyle(rgb);
      }
    }
    function changeStyle(rgb) {
      var rgb = 'rgb('+rgb.r+','+rgb.g+','+rgb.b+')';
      $('body').css('background-color', rgb);
    }
    
    // input change
    $input.keyup(function(e) {
      if (e.which != (37||39)) {
        inputChange($input.val());
      }
    });
    function inputChange(val) {
      var hex = val.replace(/[^A-F0-9]/ig, '');
      if (hex.length > 6) {
        hex = hex.slice(0,6);
      }
      $input.val('#' + hex);
      if (hex.length == 6) {
        inputColour(hex);
      }
    }
    function inputColour(hex) {
      var hsv = hex2hsv(hex);
      $icon.css('background-color', '#'+hex);
      $choice.css({
        left: hsv.s*1.8,
        top: 180-hsv.v*1.8
      });
      $rainbow.children().css('left', hsv.h/3.6+'%');
      $board.css('background-color', 'hsl('+hue+',100%,50%)');
      changeColour(hsv, true, hex);
    }

    
    function hex2hsv(hex) {
      var r = parseInt(hex.substring(0,2),16)/255;
      var g = parseInt(hex.substring(2,4),16)/255;
      var b = parseInt(hex.substring(4,6),16)/255;
      var max = Math.max.apply(Math, [r,g,b]);
      var min = Math.min.apply(Math, [r,g,b]);
      var chr = max-min;
      hue = 0;
      val = max;
      sat = 0;
      if (val > 0) {
        sat = chr/val;
        if (sat > 0) {
          if (r == max) {
            hue = 60*(((g-min)-(b-min))/chr);
            if (hue < 0) {hue += 360;}
          } else if (g == max) { 
            hue = 120+60*(((b-min)-(r-min))/chr); 
          } else if (b == max) { 
            hue = 250+60*(((r-min)-(g-min))/chr); 
          }
        } 
      }
      return {h: hue, s: Math.round(sat*100), v: Math.round(val*100)}
    }
    function hsv2rgb(hsv) {
      h = hsv.h;
      s = hsv.s;
      v = hsv.v;
      var r, g, b;
      var i;
      var f, p, q, t;
      h = Math.max(0, Math.min(360, h));
      s = Math.max(0, Math.min(100, s));
      v = Math.max(0, Math.min(100, v));
      s /= 100;
      v /= 100;
      if(s == 0) {
        r = g = b = v;
        return {r: Math.round(r*255), g: Math.round(g*255), b: Math.round(b*255)};
      }
      h /= 60;
      i = Math.floor(h);
      f = h - i; // factorial part of h
      p = v * (1 - s);
      q = v * (1 - s * f);
      t = v * (1 - s * (1 - f));
      switch(i) {
        case 0: r = v; g = t; b = p; break;
        case 1: r = q; g = v; b = p; break; 
        case 2: r = p; g = v; b = t; break; 
        case 3: r = p; g = q; b = v; break; 
        case 4: r = t; g = p; b = v; break; 
        default: r = v; g = p; b = q;
        }
      return {r: Math.round(r*255), g: Math.round(g*255), b: Math.round(b*255)};
    }
    function rgb2hex(rgb) {
      function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
      }
      return hex(rgb.r) + hex(rgb.g) + hex(rgb.b);
    }
  });
};

$('.picker').pickify();

});