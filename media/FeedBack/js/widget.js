$(document).ready ( function(){
	$('.nav-tabs li a').click(function() {
		$('.nav-tabs li').removeClass('active');
		$(this).parent().addClass('active');
		$('.tab-content').hide();
		$('.tab-content').eq($('.nav-tabs li a').index(this)).show();
		$('#jform_type_id option[value="'+$('.nav-tabs li a').index(this)+'"]').prop('selected', true);
		return false;
	});
	
	$('#FBW_NewBTN').click(function() {
		$('.FBW_List').hide();
		$('#FBW_NewBTN').hide();
		$('.nav-tabs').hide();
		$('#FBW_New').show();
		return false;
	});
	$('#BTNCancel').click(function() {
		$('#FBW_New').hide();
		$('#FBW_NewBTN').show();
		$('.nav-tabs').show();
		$('.FBW_List').show();
		return false;
	});
	
});


	function comment_fb(target, fb_id) {
		$('.questions').width('25%');
		$('.FBStat').hide();
		$('.FB_Info').css('margin-left',0);
		$('.FBW_List .FB_Info .comment').css('left',100);
		
	};
	
	
	function vote_fb(target, fb_id, mode) {
		var $Void = $(target).parents('.FBStat');
		var $NClass = $Void.attr('id');
		$('.'+$NClass).find('div').removeClass('select');
		$Void.find('h2').html('<i class="icon-loader01"></i>');
		
		$.ajax({
			url: location.href,
			type: 'POST',
			dataType: 'json',
			data: {controller:'widgets',format:'raw', task:'voidfb',fb_id: fb_id, mode: mode},
			success: function(response) {
				$('.'+$NClass).find('.up').find('span').html(response.void_up);
				$('.'+$NClass).find('.down').find('span').html(response.void_down);
				$('.'+$NClass).find('h2').html(response.void_up-response.void_down);
				if (eval (response.void_up) == eval (response.void_down)) 
					$('.'+$NClass).find('.bar').width('50%')
				else
					$('.'+$NClass).find('.bar').width(((100*response.void_up)/(eval (response.void_up)+eval (response.void_down)))+'%');
				if (response.clear == 0 ) {
					if ($(target).attr('class') == 'up')
						$('.'+$NClass).find('.up').addClass('select')
					if ($(target).attr('class') == 'down')
						$('.'+$NClass).find('.down').addClass('select');
				}
			}
		});
	};

	function HideSMC() {
		$('#system-message-container').fadeOut(2000);
		//$('#system-message-container').css('display','none');
		
	};
	
	setTimeout(HideSMC, 1000);