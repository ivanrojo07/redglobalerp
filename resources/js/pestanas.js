window.formulario =function (elemento) {
  	if (elemento.value == "Prospecto") {
	  document.getElementById('cliente').style.display = 'none';
	  document.getElementById('cliente1').style.display = 'none';
	  document.getElementById('cliente2').style.display = 'none';
  	} else if (elemento.value == "Cliente") {
	  document.getElementById('cliente').style.display = 'inline';
	  document.getElementById('cliente1').style.display = 'inline';
	  document.getElementById('cliente2').style.display = 'inline';
  	}
}

window.persona =function(elemento) {
	if(elemento.value == "Fisica") {
		document.getElementById('perfisica').style.display = 'block';
		document.getElementById('permoral').style.display = 'none';
		document.getElementById('varrfc').pattern = "^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 13 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
		$("#apellidopaterno").prop('required', true);
		$("#nombre").prop('required', true);
		$("#razonsocial").prop('required', false);
	} else if(elemento.value == "Moral") {
		document.getElementById('perfisica').style.display = 'none';
		document.getElementById('permoral').style.display = 'block';
		document.getElementById('varrfc').pattern = "^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 12 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
		$("#apellidopaterno").prop('required', false);
		$("#nombre").prop('required', false);
		$("#razonsocial").prop('required', true);
	}
}
// $('div#tab').remove();
$("tr").click(function(){
  $('div.persona').hide();
  // console.log(this.getAttribute('href'));
  var index = $(this.getAttribute('href'));
  $(index).removeClass("pestana");
  // $('#tab').dialog('open');
  $(this.getAttribute('href')).show();

});
$(function() {
  $("li").click(function() {
  // remove classes from all
  $("li").removeClass("active");
  // add class to the one we clicked
  $(this).addClass("active");
 });
});
  
$('li a').click(function(){
  $(this.getAttribute('class')).addClass("active");
  $('.pestana').hide();
  $(this.getAttribute('href')).show();
});

$(function() {
  	tipopersona = $('#tipopersona').val();
  	if(tipopersona == 'Moral') {
		document.getElementById('perfisica').style.display = 'none';
		document.getElementById('permoral').style.display = 'block';
		document.getElementById('rfc').pattern = '^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}';
		document.getElementById('rfc').placeholder = 'Ingrese 12 caracteres';
		document.getElementById('rfc').title = 'Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres';
		$('#apellidopaterno').prop('required', false);
		$('#nombre').prop('required', false);
		$('#razonsocial').prop('required', true);
  	}
});

// $(function(){
//               $('.dropdown-submenu a.test').on("click", function(e){
//                 $(this).next('ul').toggle();
//                 e.stopPropagation();
//                 e.preventDefault();
//               });
//             });

// $(function() {
//    $("div.panel div ul li").click(function() {
//       // remove classes from all
//       $("li").removeClass("active");
//       // add class to the one we clicked
//       $(this).addClass("active");
//    });
// });
window.deleteFunction = function (etiqueta) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
swal({
  title: "¿Estas seguro?",
  text: "Si eliminas, no podras recuperar tu información.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "SI",
  cancelButtonText: "¡NO!",
  closeOnConfirm: false,
  closeOnCancel: false
},function(isConfirm){
  if (!isConfirm) {
	
	swal("Cancelado", "", "error");
  } else {
	
	document.getElementById(etiqueta).submit();          // submitting the form when user press yes
  }
});
}
$('li a').click(function(){
	$(this.getAttribute('class')).addClass("active");
	$(this.getAttribute('href')).show();
});
$(document).ready(function () {
        $('.collapse').collapse({
        toggle: false,
    });
});
$(window).resize(function () {
    var heigh = parseInt($(window).height()) - 150;
    $("iframe").height(heigh);
});
window.openNav = function(obj) {
    closeNav();
    if ($("#mySidenav").width() == "0") {
        $(obj).addClass('active');
        document.getElementById("mySidenav").style.width = "250px";
    }
}


window.closeNav = function() {
    $('.collapse').removeClass('in');
    $('.navbar-nav li').removeClass("active");
}
window.AgregarNuevoTab = function(url, nombre) {
    closeNav();
    var tabs = document.getElementById("tabsApp");
    var obj = tabs.getElementsByTagName("li");
    for (var i = 0; i < obj.length; i++) {
        var anombre = obj[i].innerText.substring(0, obj[i].innerText.length - 2);
        if (anombre === nombre) {
            CambiarAtributoElementosTag("li", "tabsApp", "class", "");
            CambiarAtributoElementosTag("div", "contenedortab", "class", "tab-pane fade");
            obj[i].className = "nav-link active";
            var nombre = $(obj[i].getElementsByTagName("a")[0]).attr("href");
            var iframen = document.getElementById(nombre.replace("#", ""));
            iframen.className = "active show";
            return false;
        }
    }
    var lblTab = document.createElement("li");
    var numTab = tabs.getElementsByTagName("li").length + 1;
    var titulo = document.createElement("a");
    titulo.className= "nav-link"
    var heigh = parseInt($(window).height()) - 150;
    titulo.setAttribute("data-toggle", "tab");
    titulo.setAttribute("href", "#tab" + numTab);
    titulo.innerHTML = nombre + "  <span class='close alignright' onclick='CerrarTab(this);'><i class='far fa-times-circle' ></i></span>";
    lblTab.appendChild(titulo);
    tabs.appendChild(lblTab);
    CambiarAtributoElementosTag("li", "tabsApp", "class", "");
    lblTab.className = "nav-item active";
    var iframes = document.getElementById("contenedortab");
    var srcTab = document.createElement("div");
    srcTab.id = "tab" + numTab;
    srcTab.innerHTML = " <iframe src='" + url + "' style='height:" + heigh + "px'></iframe>";
    CambiarAtributoElementosTag("div", "contenedortab", "class", "tab-pane fade");
    srcTab.className = "nav-item active show";
    iframes.appendChild(srcTab);
}

window.CerrarTab = function (objeto) {
    var nombre = $(objeto.parentNode).attr("href");
    var iframen = document.getElementById(nombre.replace("#", ""));
    iframen.parentNode.removeChild(iframen);
    objeto.parentNode.parentNode.removeChild(objeto.parentNode);
}

window.CambiarAtributoElementosTag = function (tipo, idContenedor, atributo, valor) {
    var contenedor = document.getElementById(idContenedor);
    var elementos = contenedor.getElementsByTagName(tipo);
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].setAttribute(atributo, valor);
    }
}
window.autoCerrar = function (obj) {
    var url = String(obj)
    url = url.substring(1, url.length);
    $("iframe").each(function () {
        var src = $(this).attr('src');
        if (src === url) {
            var tab = "#" + $(this).parent().attr('id');
            $("#tabsApp> li> a").each(function () {
                var a = $(this).attr("href");
                if (tab === a) {
                    var iframen = document.getElementById(tab.replace("#", ""));
                    var li = $(this).parent();
                    iframen.parentNode.removeChild(iframen);
                    this.parentNode.parentNode.removeChild(this.parentNode);
                }
                return 0;
            });
        }
        return 0;
    });
}

