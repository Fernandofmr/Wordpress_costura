jQuery(document).ready(function($) {
	//alert('Make with bubble theme');
	$('.productos-destacados-carousel').slick({		
		dots: true,
		speed: 300,
		slidesToShow: 3,
		adaptiveHeight: true, 
		autoplay: true
	});

	$('.productos-novedades-carousel').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4
	});

});

function apareceBoton(id_producto) {
	var btn_producto = document.getElementById(id_producto);
	btn_producto.classList.add('fade');
}

function desapareceBoton(id_producto) {
	var btn_producto = document.getElementById(id_producto);
	btn_producto.classList.remove('fade');
}

function agrandaProductoDestacado(id_producto) {
	var caja_producto = document.getElementById(id_producto);
	caja_producto.classList.add('agranda-producto-novedad');
}

function noAgrandaProductoDestacado(id_producto) {
	var caja_producto = document.getElementById(id_producto);
	caja_producto.classList.remove('agranda-producto-novedad');
}

function verContenidoPost(id_content, id_excerpt) {
	excerpt_post = document.getElementById(id_excerpt);
	excerpt_post.classList.add('d-none')
	contenido_post = document.getElementById(id_content);
	contenido_post.classList.remove('d-none');
}

function ocultarContenidoPost(id_content, id_excerpt) {
	contenido_post = document.getElementById(id_content);
	contenido_post.classList.add('d-none');
	excerpt_post = document.getElementById(id_excerpt);
	excerpt_post.classList.remove('d-none')
}

function cabioFiltro(valor_filtro) {
	var filtro_activo = document.getElementById('filtro-activo');
	document.getElementById(filtro_activo.value).classList.add('d-none');
	filtro_activo.value = valor_filtro;
	document.getElementById(valor_filtro).classList.remove('d-none');
}