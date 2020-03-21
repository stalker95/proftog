$(window).ready(function(){
	initDateTimePicker();
});


function initDateTimePicker() {
	if (typeof($.fn.datetimepicker) == "undefined") {
		return false;
	}
	$('.datePicker').each(function(){
		var settings = {};
		if (typeof($(this).attr('datatime-format')) != 'undefined') {
			settings.format = $(this).attr('datatime-format');
		}
		$(this).datetimepicker(settings);
	});
}

  $(function () {


    
    
  })

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





});  