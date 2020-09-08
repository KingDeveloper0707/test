function checkEgaugeSystem(){
	if($('.GadgetScreen').length == 0){
		setTimeout(function(){ checkEgaugeSystem(); }, 10);
	}
	else{
		cloneEgaugeSystem();
	}
}

function moveEgaugeSystemInfo(){
	var ele = $('#timerange').detach();
	ele.appendTo('#timerange_clone');
	$('#timerange').attr('style', '');

	ele = $('#graph_summary_use').detach();
	ele.appendTo('#graph_summary_use_clone');
	$('#graph_summary_use').attr('style', '');
	ele = $('#graph_summary_use_equiv').detach();
	ele.appendTo('#graph_summary_use_equiv_clone');
	$('#graph_summary_use_equiv').attr('style', '');

	ele = $('#graph_summary_gen').detach();
	ele.appendTo('#graph_summary_gen_clone');
	$('#graph_summary_gen').attr('style', '');
	ele = $('#graph_summary_gen_equiv').detach();
	ele.appendTo('#graph_summary_gen_equiv_clone');
	$('#graph_summary_gen_equiv').attr('style', '');

	ele = $('#graph_summary_net').detach();
	ele.appendTo('#graph_summary_net_clone');
	$('#graph_summary_net').attr('style', '');
	ele = $('#graph_summary_net_equiv').detach();
	ele.appendTo('#graph_summary_net_equiv_clone');
	$('#graph_summary_net_equiv').attr('style', '');

	ele = $('#user_summary_use').detach();
	ele.appendTo('#user_summary_use_clone');
	$('#user_summary_use').attr('style', '');
	ele = $('#user_summary_use_equiv').detach();
	ele.appendTo('#user_summary_use_equiv_clone');
	$('#user_summary_use_equiv').attr('style', '');

	ele = $('#user_summary_gen').detach();
	ele.appendTo('#user_summary_gen_clone');
	$('#user_summary_gen').attr('style', '');
	ele = $('#user_summary_gen_equiv').detach();
	ele.appendTo('#user_summary_gen_equiv_clone');
	$('#user_summary_gen_equiv').attr('style', '');

	ele = $('#user_summary_net').detach();
	ele.appendTo('#user_summary_net_clone');
	$('#user_summary_net').attr('style', '');
	ele = $('#user_summary_net_equiv').detach();
	ele.appendTo('#user_summary_net_equiv_clone');
	$('#user_summary_net_equiv').attr('style', '');
}

function cloneEgaugeSystemInfo(){

	$('#timerange_clone').text($('#timerange').text());

	$('#graph_summary_use_clone').text($('#graph_summary_use').text());
	$('#graph_summary_use_equiv_clone').text($('#graph_summary_use_equiv').text());
	
	$('#graph_summary_gen_clone').text($('#graph_summary_gen').text());
	$('#graph_summary_gen_equiv_clone').text($('#graph_summary_gen_equiv').text());
	
	$('#graph_summary_net_clone').text($('#graph_summary_net').text());
	$('#graph_summary_net_equiv_clone').text($('#graph_summary_net_equiv').text());

	$('#user_summary_use_clone').text($('#user_summary_use').text());
	$('#user_summary_use_equiv_clone').text($('#user_summary_use_equiv').text());

	$('#user_summary_gen_clone').text($('#user_summary_gen').text());
	$('#user_summary_gen_equiv_clone').text($('#user_summary_gen_equiv').text());

	$('#user_summary_net_clone').text($('#user_summary_net').text());
	$('#user_summary_net_equiv_clone').text($('#user_summary_net_equiv').text());

	setTimeout(function(){ cloneEgaugeSystemInfo(); }, 1000);
}

function cloneEgaugeGadgetLegend(){
	if($('.GadgetScreen #legend tbody tr').length == 0){
		setTimeout(function(){cloneEgaugeGadgetLegend()}, 10);
		return;
	}
	
	var trs = $('.GadgetScreen #legend tbody tr');
	var graph_ctr_html = '';
	for(var tindex = 0; tindex < trs.length; tindex ++){
		graph_ctr_html = graph_ctr_html + '<div class="graph-controller-row">';

		var tds = $(trs[tindex]).find('td');
		for(var dindex = 0; dindex < tds.length; dindex ++){
			graph_ctr_html = graph_ctr_html + '<div class="graph-controller-col">';
			graph_ctr_html = graph_ctr_html + '<div class="graph-controller-item">';
			graph_ctr_html = graph_ctr_html + $(tds[dindex]).html();
			graph_ctr_html = graph_ctr_html + '</div>';
			graph_ctr_html = graph_ctr_html + '</div>';
		}

		graph_ctr_html = graph_ctr_html + '</div>';
	}

	$('#graph_ctr_container').html(graph_ctr_html);

	var canvas_src = $('.GadgetScreen #legend tbody tr canvas');
	var canvas_des = $('#graph_ctr_container canvas');
	for(var cindex = 0; cindex < canvas_src.length; cindex ++){
		var destCtx = canvas_des[cindex].getContext('2d');

		destCtx.drawImage(canvas_src[cindex], 0, 0);
	}
}
function cloneEgaugeSystem(){
	// cloneEgaugeSystemInfo();
	moveEgaugeSystemInfo();
	cloneEgaugeGadgetLegend();

	// $('.GadgetScreen').children().hide();
	// $('.GadgetScreen #graph').show();

	var graphs = $('.GadgetScreen #graph').detach();
	graphs.appendTo('#chart_container');
	$('#chart_container #graph').css('position', 'static');
	$($('.poweroptions .power-option')[0]).trigger('click');

	// $('#gen_select').val('2');
	// $('#gen_select').trigger('change');
}

$(document).on('click', '.time-option', function(){
	$('.timeoptions .time-option').removeClass('active');
	$(this).addClass('active');

	$('#' + $(this).attr('clone-id')).trigger('click');
})

$(document).on('click', '.power-option', function(){
	$('.poweroptions .power-option').removeClass('active');
	$(this).addClass('active');
	
	$('#' + $(this).attr('clone-id')).trigger('click');
})

$(document).on('click', '#graph_ctr_container input', function(){
	var chbox_index = $('#graph_ctr_container input').index(this);
	var chbox_src = $('.GadgetScreen #legend tbody input');
	$(chbox_src[chbox_index]).trigger('click');
})

$(document).ready(function(){
	checkEgaugeSystem();
})