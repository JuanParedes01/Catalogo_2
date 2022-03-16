<!doctype html>
<!--[if lte IE 9]>
<html lang="en" class="oldie">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us Form</title>
  <link rel="stylesheet" media="all" href="style.css" />
</head>
<body>
	<div class="container">
		<div class="row">
				<h1>contact us</h1>
		</div>
		<div class="row">
				<h4 style="text-align:center">Busca tu Localización aqui.</h4>
		</div>
		<div class="row input-container">
				<div class="col-xs-12">
					<div class="styled-input wide">
					<input class="form-control" name="codigo" type="text" id="search" placeholder="C.P">
					<button type="submit" id="action-button" class="main-button">Buscar</button>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<h2>Asentamiento</h2>
					<div class="styled-input">
					<select id="asentamiento" class="form-select" aria-label="Default select example">
	<option selected>asentamiento</option>
	</select>
				  <br><br>
					</div>
				</div>
	
				<div class="col-md-6 col-sm-12">
					<div class="styled-input" style="float:right;">
					<h2>Municipio</h2>
					<select id="municipio" class="form-select" aria-label="Default select example">
					<option selected>municipio</option>
					</select>
					 <br><br>
					</div>
				</div>
	
				</div>
				<div class="col-md-6 col-sm-12">
					<h2>ID</h2>
					<div class="styled-input">
					<select id="id" class="form-select" aria-label="Default select example">
					<option selected>asentamiento</option>
					</select>
					 <br><br>
					</div>
				</div>
	
				<div class="col-md-6 col-sm-12">
					<div class="styled-input" style="float:right;">
					<h2>Estado</h2>
					<select id="estado" class="form-select" aria-label="Default select example">
					<option selected>estado</option>
					</select>
					 <br><br>
					</div>
				</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script

  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">


$(document).ready(function(){
        $('#action-button').click(function(){
            let codigo = $('#search').val();
            // -- Ajax a show
            $.ajax({
                url: '{{route('codigos.show')}}'+'/'+codigo,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    let codigos = response.codigos;
                    // -- Vaciar select
                    $('#asentamiento').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#asentamiento').append('<option value="'+codigos[i].asentamiento+'">'+codigos[i].asentamiento+'</option>');
                    }
                }
            });
        });

        $("#asentamiento").change(function(){
            let codigo = $('#search').val();
            let asentamiento = $('#asentamiento').val();
            alert(asentamiento);
            //-- Ajax a show
            $.ajax({
                url: '{{route('codigos.asentamientos')}}'+'/'+codigo+'/'+asentamiento,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    let codigos = response.codigos;
                    console.log(codigos);
                    // -- Vaciar select
                    $('#municipio').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#municipio').append('<option value="'+codigos[i].ciudad+'">'+codigos[i].ciudad+'</option>');
                    }

                    $('#municipios').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#municipios').append('<option value="'+codigos[i].municipio+'">'+codigos[i].municipio+'</option>');
                    }

                    $('#tipo').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#tipo').append('<option value="'+codigos[i].tipo_asenta+'">'+codigos[i].tipo_asenta+'</option>');
                    }

                    $('#estado').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#estado').append('<option value="'+codigos[i].estado+'">'+codigos[i].estado+'</option>');
                    }

                    $('#id').empty();
                    // -- Agregar opciones
                    for(let i = 0; i < codigos.length; i++){
                        $('#id').append('<option value="'+codigos[i].Id+'">'+codigos[i].Id+'</option>');
                    }
                }
            });
        });
    });
</script>
</html>