// JavaScript Document
 $('.date').datepicker({
			  dateFormat: "yy-mm-dd"
 });
 
 $('.textarea').wysihtml5({
                "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false //Button to change color of font  
            });
			

/*=====AJAX GET NEW MESSAGE========*/

$(document).ready(function(e) {
    
  function getNewMessage() {
	$.ajax({
		url: 'http://'+document.location.host+'/core/plugins/ajaxHandler.plugin.php',
		type:'post',
		data:'event=getMessage',
		success: function(data) {
			
					var timeout = 2000;
					
					var dataSpl = data.split('|');
					    
					if(dataSpl[0] == '') {
							setTimeout(function() {
							   getNewMessage();
							},timeout);
					}
					
					if(dataSpl[0] != '') {   
					         
							 var boxPopup = '<div id="boxPopup">'+dataSpl[0]+' <a class="boxPopupClose">закрыть</a></div>';
								 //overlay = '<div class="Messoverlay"></div>';
							     
								 
							 $('body').append(boxPopup);
	
					}
					
							
					$('.boxPopupClose').on('click', function() {
						$('#boxPopup, .Messoverlay').fadeOut('slow');
						
						$.ajax({
							url: 'http://'+document.location.host+'/core/plugins/ajaxHandler.plugin.php',
							type:'post',
							data:'event=closeMessage&closeid='+dataSpl[1],
							success: function(succ) {
							  setTimeout(function() {
							  if(succ) {getNewMessage();}
							  }, timeout);
							}
						});
					});
	   }
	});
  }
  
 
  
  
  
  
  
  function countNewMessage() {
	var timeout = 5000;
	
	$.ajax({
		url: 'http://'+document.location.host+'/core/plugins/ajaxHandler.plugin.php',
		type:'post',
		data:'event=countMessage',
		success: function(data) {
			 if(data > 0) {
			    $('.countMessage').html(data);
			 }
     	     setTimeout(function() {
				countNewMessage();
			 }, timeout);
			 
	    }
	});
  }
  
  
  
  getNewMessage();
  countNewMessage();
  
  
  
  
  
});
        