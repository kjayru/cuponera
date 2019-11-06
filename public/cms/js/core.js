$(document).ready(function() {
	$('#uploadfile').filer({
		limit: 20,
		progressBar: '<div class="bar"></div>',
		extensions: ["jpg", "jpeg", "png", "gif"],
		showThumbs: true,
		addMore: true,
		templates: {
			box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
			item: '<li class="jFiler-item">\
						<div class="jFiler-item-container">\
							<div class="jFiler-item-inner">\
								<div class="jFiler-item-thumb">\
									<div class="jFiler-item-status"></div>\
									<div class="jFiler-item-thumb-overlay">\
										<div class="jFiler-item-info">\
											<div style="display:table-cell;vertical-align: middle;">\
												<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
												<span class="jFiler-item-others">{{fi-size2}}</span>\
											</div>\
										</div>\
									</div>\
									{{fi-image}}\
								</div>\
								<div class="jFiler-item-assets jFiler-row">\
									<ul class="list-inline pull-left">\
										<li>{{fi-progressBar}}</li>\
									</ul>\
									<ul class="list-inline pull-right">\
										<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
									</ul>\
								</div>\
							</div>\
						</div>\
					</li>',
			itemAppend: '<li class="jFiler-item">\
							<div class="jFiler-item-container">\
								<div class="jFiler-item-inner">\
									<div class="jFiler-item-thumb">\
										<div class="jFiler-item-status"></div>\
										<div class="jFiler-item-thumb-overlay">\
											<div class="jFiler-item-info">\
												<div style="display:table-cell;vertical-align: middle;">\
													<span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
													<span class="jFiler-item-others">{{fi-size2}}</span>\
												</div>\
											</div>\
										</div>\
										{{fi-image}}\
									</div>\
									<div class="jFiler-item-assets jFiler-row">\
										<ul class="list-inline pull-left">\
											<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
										</ul>\
										<ul class="list-inline pull-right">\
											<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
										</ul>\
									</div>\
								</div>\
							</div>\
						</li>',
			progressBar: '<div class="bar"></div>',
			itemAppendToEnd: false,
			canvasImage: true,
			removeConfirmation: true,
			_selectors: {
				list: '.jFiler-items-list',
				item: '.jFiler-item',
				progressBar: '.bar',
				remove: '.jFiler-item-trash-action'
			}
		},
	}); 

	// Tabla lista 
	$('#lista-categorias').DataTable({
		"iDisplayLength": 25,
		"order": [ 0, "asc" ],
		"language": {
			"lengthMenu": "Mostrar _MENU_ ítems por página",
			"zeroRecords": "Lo sentimos, no hay resultados",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay ítems disponibles",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
				"first": "Inicio",
				"last": "Final",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"search": "Buscar:"
		}
	} );

	// Tabla departamentos 
	$('#lista-departamentos').DataTable({
		"iDisplayLength": 25,
		"order": [ 1, "asc" ],
		"language": {
			"lengthMenu": "Mostrar _MENU_ ítems por página",
			"zeroRecords": "Lo sentimos, no hay resultados",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay ítems disponibles",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
				"first": "Inicio",
				"last": "Final",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"search": "Buscar:"
		}
	} );

	$('#lista-empresas').DataTable({
		"iDisplayLength": 25,
		"order": [ 0, "desc" ],
		"language": {
			"lengthMenu": "Mostrar _MENU_ ítems por página",
			"zeroRecords": "Lo sentimos, no hay resultados",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay ítems disponibles",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
				"first": "Inicio",
				"last": "Final",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"search": "Buscar:"
		}
	} );

	$('#lista-cup').DataTable({
		"iDisplayLength": 25,
		"order": [ 0, "desc" ],
		"language": {
			"lengthMenu": "Mostrar _MENU_  por página",
			"zeroRecords": "Lo sentimos, no hay resultados",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay  disponibles",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
				"first": "Inicio",
				"last": "Final",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"search": "Buscar:"
		}
	});

	$('#lista-cup-seg').DataTable({
		"iDisplayLength": 25,
		 "ordering": false,
		"language": {
			"lengthMenu": "Mostrar _MENU_ cupones por página",
			"zeroRecords": "Lo sentimos, no hay resultados",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay cupones disponibles",
			"infoFiltered": "(filtered from _MAX_ total records)",
			"paginate": {
				"first": "Inicio",
				"last": "Final",
				"next": "Siguiente",
				"previous": "Anterior"
			},
			"search": "Buscar:"
		}
	});

	// textarea en edición de productos
	tinymce.init({
		selector:'.cool-textarea',
		language: 'es',
		entity_encoding : "raw",
		plugins: [
			'advlist autolink lists link image charmap anchor',
			'table paste code'
			],
		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link',
	});


	tinymce.init({
	  selector: '.cool-textarea-2',
	  menubar: false,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table contextmenu paste code'
	  ],
	  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
	});


	// Calendario
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '< Ant',
		nextText: 'Sig >',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);

	$( "#from_all, .from_one" ).datepicker({
		changeMonth: false,
		inline: true,
		minDate: '-1Y',
		numberOfMonths: 2,
		 dateFormat: 'dd/mm/yy',
		onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
	});

	$( "#to_all, .to_one" ).datepicker({
		changeMonth: false,
		inline: true,
		minDate: '-1Y',
		numberOfMonths: 2,
		 dateFormat: 'dd/mm/yy',
		onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});

    $(".single_img").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });


	$('#multiselect').multiselect({
		sort: false,
		search: {
			left: '<input type="text" name="q" class="form-search" placeholder="Buscar cupones (por id o nombre)" />',
		}
	});

	// Mostrar mensaje y luego de 5seg ocultarlo
	$('#message:visible').delay(5000).slideUp();


	$('#paging_container3').pajinate({
		items_per_page : 12,
		num_page_links_to_display : 3,
		show_first_last: true,
		item_container_id : '.alt_content',
		nav_panel_id : '.alt_page_navigation',
		abort_on_small_lists: true,
		nav_label_first : '&laquo;',
		nav_label_last : '&raquo;',
		nav_label_prev : '&lsaquo;',
		nav_label_next : '&rsaquo;'
	});


	// Todos los iframe
	$('.fancybox').fancybox({
		afterClose: function () {
			window.parent.location.reload();
			return;
		}
	});

	$('.fancybox-norefresh').fancybox();

	
});