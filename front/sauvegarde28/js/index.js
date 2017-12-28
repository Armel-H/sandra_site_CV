$(document).mousemove(function(event) {
	//Rotation
	var xr = (event.pageX - $(window).width() / 2) / 50;
	var yr = ($(window).height() / 2 - event.pageY) / 50;
	var valueRot =
		"rotateY(" + xr + "deg) rotateX(" + yr + "deg) translateZ(45px)";

	//BoxShadow
	var xs = -(event.pageX - $(window).width() / 2) / 50;
	var ys = ($(window).height() / 2 - event.pageY) / 50;
	var valueShadow = xs + "px " + ys + "px 20px 0px #333";

	//Parallax
	var xp = -(event.pageX - $(window).width() / 2) / 50;
	var yp = ($(window).height() / 2 - event.pageY) / 50;
	var valuePar =
		 "url(../image/ordi.jpg) " +
		(xp - 50) +
		"px " +
		(yp + 120) +
		"px";

	//Change CSS value
	$("#main-block").css("transform", valueRot);
	$("#bg").css("transform", valueRot);
	$("#main-block").css("box-shadow", valueShadow);
	$("#square")
		.css("background", valuePar)
		.css("background-size", "140%");
});
