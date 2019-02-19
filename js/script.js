$(document).ready(function(){
	//Quadros
	$(".quadro ul").cycle({
		fx:'fade', 
		random:1,
		speed: 1000,
		timeout:5000,
	});
	
	$(".convenios-slide ul").cycle({
		fx:'turnDown', 
		delay:-2000,
		timeout:10000,
	});
	//*************************
	
	//Transmição de fotos
    $('.photo-small').glisse({
        changeSpeed: 550, 
        speed: 500,
        effect:'bounce',
        fullscreen: false,
    });
	//**************************

});