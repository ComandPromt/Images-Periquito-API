			'use strict';
		
			;( function ( document, window, index )
			{
				var isAdvancedUpload = function()
					{
						var div = document.createElement( 'div' );
						return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
					}();
				var forms = document.querySelectorAll( '.box' );
				Array.prototype.forEach.call( forms, function( form )
				{
					var input		 = form.querySelector( 'input[type="file"]' ),
						label		 = form.querySelector( 'label' ),
						errorMsg	 = form.querySelector( '.box__error span' ),
						restart		 = form.querySelectorAll( '.box__restart' ),
						droppedFiles = false,
						showFiles	 = function( files )
						{
							label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
						},
						triggerFormSubmit = function()
						{
							var event = document.createEvent( 'HTMLEvents' );
							event.initEvent( 'submit', true, false );
							form.dispatchEvent( event );
						};
					var ajaxFlag = document.createElement( 'input' );
					ajaxFlag.setAttribute( 'type', 'hidden' );
					ajaxFlag.setAttribute( 'name', 'ajax' );
					ajaxFlag.setAttribute( 'value', 1 );
					form.appendChild( ajaxFlag );
					input.addEventListener( 'change', function( e )
					{
						showFiles( e.target.files );
			
						triggerFormSubmit();
								
					});
					if( isAdvancedUpload )
					{
						form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser
		
						[ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
						{
							form.addEventListener( event, function( e )
							{
								// preventing the unwanted behaviours
								e.preventDefault();
								e.stopPropagation();
							});
						});
						[ 'dragover', 'dragenter' ].forEach( function( event )
						{
							form.addEventListener( event, function()
							{
								form.classList.add( 'is-dragover' );
							});
						});
						[ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
						{
							form.addEventListener( event, function()
							{
								form.classList.remove( 'is-dragover' );
							});
						});
						form.addEventListener( 'drop', function( e )
						{
							droppedFiles = e.dataTransfer.files; // the files that were dropped
							showFiles( droppedFiles );
		
							
							triggerFormSubmit();
		
											});
					}
		
					form.addEventListener( 'submit', function( e )
					{
						if( form.classList.contains( 'is-uploading' ) ) return false;
		
						form.classList.add( 'is-uploading' );
						form.classList.remove( 'is-error' );
		
						if( isAdvancedUpload ) 
						{
							e.preventDefault();
	
							var ajaxData = new FormData( form );
							if( droppedFiles )
							{
								Array.prototype.forEach.call( droppedFiles, function( file )
								{
									ajaxData.append( input.getAttribute( 'name' ), file );
								});
							}
							var ajax = new XMLHttpRequest();
							ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );
		
						
		
							ajax.onerror = function()
							{
								form.classList.remove( 'is-uploading' );
								alert( 'Error. Please, try again!' );
							};
		
							ajax.send( ajaxData );
							
							if(document.getElementById("mensaje").innerHTML!="Select"){
								// Aquí el código para controlar si el archivo existe en la carpeta uploads
								// Here the code to control if the file exists in the uploads folder
								document.getElementById("mensaje").innerHTML='Select';
							}
					
						}
						
					});
	
						Array.prototype.forEach.call( restart, function( entry )
					{
						entry.addEventListener( 'click', function( e )
						{
							e.preventDefault();
							form.classList.remove( 'is-error', 'is-success' );
							input.click();
						});
					});
					input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
					input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
		
				});
			}( document, window, 0 ));