<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$titulo}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <meta name="csrf-token" content="{{ csrf_token() }}">{{-- envio del token para usar los datos por ajax --}}


  <script src="{{asset('js/miajax.js')}}"></script>
</head>
<body>

<div id="container" class="container mt-3">
 
  <form action="/registro" method="POST" id="cpa-form">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" /> <!-- genera un token para el formulario para poder enviar los datos por el post -->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">@</span>
      </div>
      <input type="text" class="form-control" placeholder="Username" id="username" name="username" >
      
    </div>
       <button type="submit"  class="btn btn-primary" onclick="guardar()">Guardar-ajax</button>
  </form>

    <table class='table'>
    <thead>
    <tr>
    <th scope='col'>#</th>
    <th scope='col'>id</th>
    <th scope='col'>nombre</th>
    <th scope='col' style="text-align:center">cruds</th>
    </tr>
    </thead>
    <tbody>
      <?php 
        $i = 0;
        foreach ($datos as $usuario ) { $i++; ?>
          <tr>  
            <th scope='row'>{{$i}}</th>
            <td >{{$usuario->id}}</td>
            <td >{{$usuario->nombre}} </td>
             <td style="text-align:center">
              <button type="submit"  class="btn btn-danger" onclick="borrar({{$usuario->id}})">borrar-ajax</button>
              <a   class="btn btn-warning" href="borrar/{{$usuario->id}}">borrar-normal</a>              
              <button type="submit"  class="btn btn-success" onclick="actualizar({{$usuario->id}})">actualizar-ajax</button></td>
            </tr>
          
       <?php  }
        ?>
    </tbody>
    </table>
  </div>  
</body>
</html>