var geoloc =null;

$(document).ready(function(){

	//var editable = new nicEditor({fullPanel : true, iconsPath : '../js/nicEditorIcons.gif'}).panelInstance('editable');

	$('.main-menu li').click(function(){
		
		$('.main-menu li').removeClass('active');
		$(this).addClass('active');

	});
	setListeContinue();

	setInterval(function(){

		setListeContinue();

	},30000);
	
	if(navigator.geolocation){

		navigator.geolocation.getCurrentPosition(maPosition);

	}
	
	$('.userButton').click(function(){

		$('#userMenu').addClass('open');
		return false;

	});

	$('.sideButton').click(function(){

		$('#sideMenu').toggleClass('open');
		return false;

	});

	$('body').click(function(){

		$('#userMenu').removeClass('open');
		$('#sideMenu').removeClass('open');

	});
	
	$('.likeButton').click(function(){
		
		var likeButton = $(this);
		$(this).toggleClass('active');
		var addr = $( "#items" ).data( "url" );
		var id = $(this).attr('data-id');
		$.ajax({

			url: addr+'/like',
			data: { article_id: id }
	
		}).done(function(data){
			
			likeButton.text(data.text);
		});
		
	});

  	
});
function maPosition(position) {

	//$.post("http://www.votredomaine.com/position.php",{lat:position.coords.latitude,lng:position.coords.longitude});
	//$('#geoloc').html("Latitude : "+parseInt(position.coords.latitude)+' Longitude : '+parseInt(position.coords.longitude));
	$('.geoloc').attr('value', parseInt(position.coords.latitude)+'_'+parseInt(position.coords.longitude));
}

function setListeContinue(){

	var addr = $( "#items" ).data( "url" );

	$.ajax({

		url: addr+'/articles/liste',

	}).done(function(data){

		var articles = "";
		for (var key in data.data){
			var auteur = "<span class='author'>"+data.data[key].author+"</span>";
			var img = "<div class='wrap'><img src='#' alt='article'></div>";
			var titre = "<h4>"+data.data[key].titre+"</h4>";
			var infos = "<span class='timeLoc'>date : "+data.data[key].created_at+"latitude :"+data.data[key].latitude+" / longitude :"+data.data[key].longitude+"</span>";
			articles += "<li><a href='"+addr+'/article/'+data.data[key].id+'/'+data.data[key].slug+"'>"+auteur+img+titre+infos+"</a></li>"; 
		}
		$('#items').html(articles);
		console.log(data);
	});

}