
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<script src="https://mapib.000webhostapp.com/el_peral/utilidades/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/utilidades/jquery.colorbox.js"></script>
<link href="<?php echo base_url(); ?>imagenes/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>utilidades/admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function confirmation() {
    if(confirm("Realmente desea eliminar?"))
    {
        return true;
    }
    return false;
}
</script>
<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				//$(".group1").colorbox({rel:'group1'});
				/*$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }*/
          $(".inline").colorbox({inline:true, width:"50%"});
				});

				//$('.non-retina').colorbox({rel:'group5', transition:'none'})
				//$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
