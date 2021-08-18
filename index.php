<!DOCTYPE html>

<html lang="es">
	
	<head>
		
		<meta charset="UTF-8">
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<title>Documentacion</title>
		
		<link rel="shortcut icon" href="ico/ico.png" />
				
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		
		<script>
	
			document.write(unescape('%3C%73%63%72%69%70%74%3E%0A%66%75%6E%63%74%69%6F%6E%20%73%74%61%72%74%54%69%6D%65%28%29%20%7B%0A%20%20%20%20%76%61%72%20%74%6F%64%61%79%20%3D%20%6E%65%77%20%44%61%74%65%28%29%3B%0A%20%20%20%20%76%61%72%20%68%20%3D%20%74%6F%64%61%79%2E%67%65%74%48%6F%75%72%73%28%29%3B%0A%20%20%20%20%76%61%72%20%6D%20%3D%20%74%6F%64%61%79%2E%67%65%74%4D%69%6E%75%74%65%73%28%29%3B%0A%20%20%20%20%76%61%72%20%73%20%3D%20%74%6F%64%61%79%2E%67%65%74%53%65%63%6F%6E%64%73%28%29%3B%0A%20%20%20%20%6D%20%3D%20%63%68%65%63%6B%54%69%6D%65%28%6D%29%3B%0A%20%20%20%20%73%20%3D%20%63%68%65%63%6B%54%69%6D%65%28%73%29%3B%0A%20%20%20%20%64%6F%63%75%6D%65%6E%74%2E%67%65%74%45%6C%65%6D%65%6E%74%42%79%49%64%28%27%74%78%74%27%29%2E%69%6E%6E%65%72%48%54%4D%4C%20%3D%0A%20%20%20%20%68%20%2B%20%22%3A%22%20%2B%20%6D%20%2B%20%22%3A%22%20%2B%20%73%3B%0A%20%20%20%20%76%61%72%20%74%20%3D%20%73%65%74%54%69%6D%65%6F%75%74%28%73%74%61%72%74%54%69%6D%65%2C%20%35%30%30%29%3B%0A%7D%0A%66%75%6E%63%74%69%6F%6E%20%63%68%65%63%6B%54%69%6D%65%28%69%29%20%7B%0A%20%20%20%20%69%66%20%28%69%20%3C%20%31%30%29%20%7B%69%20%3D%20%22%30%22%20%2B%20%69%7D%3B%20%20%2F%2F%20%61%64%64%20%7A%65%72%6F%20%69%6E%20%66%72%6F%6E%74%20%6F%66%20%6E%75%6D%62%65%72%73%20%3C%20%31%30%0A%20%20%20%20%72%65%74%75%72%6E%20%69%3B%0A%7D%0A%3C%2F%73%63%72%69%70%74%3E'));
	
		</script>
		
	</head>
	
	<body onload="startTime()">
		
		<div class="flotar_derecha">
			
			<div id="txt"></div>
		
		</div>
		
		<div class="clear">
			
		</div>
		
		<div class="flotar_izquierda">

			<h1> Api file names </h1>
		
			<div style="float:left;padding-left:10px;">
			
				<h2>File names are passed and it returns it with a new name in the following date format: 
				
					<span>year_month_day_hour_minutes_seconds.extension</span>
					
				</h2>
			
				<h2>Usage:</h2>
				
			</div>
			
			<div class="centrar">
				
				<h2>1 file</h2>
										
				<div class="clear">
				
					<p>
					
						<a target="_blank" href="recibo-json.php?imagenes=test.png">Test</a>
						
					</p>	
					
					<img alt="image" class="image" src="preview/1.png" />
					
				</div>
		
			</div>
			
			<div class="centrar clear">

				<h2>Multiple Files</h2>
								
				<div class="clear">
				
					<p>
					
						<a target="_blank" href="recibo-json.php?imagenes=test.png,test2.png">Test</a>
						
					</p>
					
					<img alt="image" class="image" src="preview/2.png" />
					
				</div>
				
			</div>
			
			
			
			<div class="centrar clear">

				<h2>Modes</h2>

				<ol>
				
					<li>
						
						<h3><span>It is the same not to put the mode, that is, the result is the same as in the previous examples</span></h3>
												
						<div class="clear">
				
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png&mode=1">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/1.png" />
							
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png,test2.png&mode=1">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/2.png" />
							
						</div>
							
						
					</li>
				
					<li>
						
						<h3><span>This mode adds the file name plus the current date and time</span></h3>
												
						<div class="clear">
				
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png&mode=2">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/3.png" />
					
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png,test2.png&mode=2">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/4.png" />
					
						</div>
													
					</li>
					
					<li>
						
						<h3><span>This mode gives us the files with numbers</span></h3>
												
						<div class="clear">
				
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png&mode=3">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/3.png" />
					
							<p>
							
								<a target="_blank" href="recibo-json.php?imagenes=test.png,test2.png&mode=3">Test</a>
								
							</p>
							
							<img alt="image" class="image" src="preview/4.png" />
					
						</div>
							
						
					</li>
									
				</ol>
										
			</div>
			
		</div>
		
	</body>
	
</html>