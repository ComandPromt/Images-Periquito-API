function handleFileSelect(evt) {
	  var imagenes=[];
    var files = evt.target.files; 

    for (var i = 0, f; f = files[i]; i++) {
		imagenes.push(escape(f.name));

    }

  var miJSON = JSON.encode(imagenes);
		location.href = 'recibo-json.php?imagenes='+miJSON;	
    
 }

  document.getElementById('file').addEventListener('change', handleFileSelect, false);
  