function borrar(id){
   data = {
       "id" : id
   }
    $.ajax({
        url: 'borrar',
        type: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }       
    }).done(function(datos, status, xhr) {
        /* if (data=="") {
            swal("Good job!", "You clicked the button!", "error");
        } */
        //

        var ct = xhr.getResponseHeader("content-type") || "";
           if (ct.indexOf('stream') > -1) {
               // console.log(ct);
               window.location = url;
           }
           if (ct.indexOf('html') > -1) {              
              cargaPagina('/inicio');
                }
           if (ct.indexOf('json') > -1) {
                       console.log(datos);

           }
       
        });
        
}

function guardar(){
    var nombre= $("#username").val();

    $("#cpa-form").submit(function(e){

        data = {
            "username" : nombre
        }
         $.ajax({
             url: '/registro',
             type: 'POST',
             data: data,
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }       
         }).done(function(datos, status, xhr) {
             /* if (data=="") {
                 swal("Good job!", "You clicked the button!", "error");
             } */
           
             
             var ct = xhr.getResponseHeader("content-type") || "";
                if (ct.indexOf('stream') > -1) {
                    // console.log(ct);
                    window.location = url;
                }
                if (ct.indexOf('html') > -1) {              
                   // $('#').html(datos);
                     }
                if (ct.indexOf('json') > -1) {
                   //console.log(datos.response.mensaje);
                   if(datos.response.estado){
                    swal("Ok! ", datos.response.mensaje, "success");
                    cargaPagina('/inicio');
                   }else{
                    swal("ERROR! ", datos.response.mensaje, "error");
                   }
                    }
            
             });
        return false;
    });
             
 }
 function cargaPagina(url){
 //   $('#container').html(''); 
     $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }  
     }).done(function(datos, status, xhr) {       
             var ct = xhr.getResponseHeader("content-type") || ""; 
             if (ct.indexOf('html') > -1) { 
            $('#container').html(datos); 
                     }
            
            
             });

 }
 function actualizar(id){
    var nombre= $("#username").val();

        data = {
            "username" : nombre,
            "id" : id
        }
         $.ajax({
             url: '/actualizar',
             type: 'POST',
             data: data,
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }       
         }).done(function(datos, status, xhr) {
             console.log(datos);
             /* if (data=="") {
                 swal("Good job!", "You clicked the button!", "error");
             } */
           
             
             var ct = xhr.getResponseHeader("content-type") || "";
                if (ct.indexOf('stream') > -1) {
                    // console.log(ct);
                    window.location = url;
                }
                if (ct.indexOf('html') > -1) {              
                   // $('#').html(datos);
                     }
                if (ct.indexOf('json') > -1) {
                   //console.log(datos.response.mensaje);
                   if(datos.response.estado){
                    swal("Ok! ", datos.response.mensaje, "success");
                    if (datos.response.redirect) {
                        cargaPagina(datos.response.redirect);
                    }
                   }else{
                    swal("ERROR! ", datos.response.mensaje, "error");
                   }

                    }
            
             });
        return false;
   
             
 }
 
 