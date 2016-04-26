

<body>
    
    <div class="container">
    <div class="row">
      <h2>Lista</h2> 
       <div class="col-md-2"></div>
      <div class="col-md-8">
      <div style="display:none" id="submit-error" class="alert alert-danger">
            <strong>¡ Atención !</strong> No se logró guardar la información.
        </div>
        <div style="display:none" id="submit-success" class="alert alert-success">
            La información se guardó satisfactoriamente.
        </div>  

<div class="table-responsive"> 
    <table  id="tabla_cargas" class="table table-striped table-bordered table-condensed dt-responsive" cellspacing="0" width="100%"  >                
        <tr>
            <th>Id</th>
            <th>Arte</th>
            <th>Pais</th>
            <th>Observaciones</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach($ejemplo as $item): ?>
            <tr>
                <td> <?php echo $item->id_abril; ?></td>
                <td> <?php echo $item->arte_rupestre; ?></td>
                <td> <?php echo $item->pais; ?> </td>
                <td> <?php echo $item->observaciones; ?></td>
                <td> <a href="" class="btn btn-success">Editar</a></td>
                <td> 
                <a href="#" id="elimina_<?php echo $item->id_abril; ?>"  class="btn btn-danger elimina_reg" >Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>

    </div>
<!-- Modal ***************************************** -->
 <div class="modal fade" id="elimina_modal" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Continuar</h4>
        </div>
        <div class="modal-body">
          <p>¿Estas seguro de que deseas eliminar el registro?, esta acción no podrá deshacerse.</p>
        </div>
        <div class="modal-footer">
            <input type="text" name="registroId" id="registroId" value=""/>
            <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancelar</button>
            <a id="elimina-box" name="elimina-box" class="btn btn-primary btn-md">Eliminar</a>                    
        </div>
      </div>    
    </div>
  </div>  
  <!-- fin Modal ***************************************** -->        

    <div class="col-md-2"></div>
    </div>
    </div>
</body>

<script type="text/javascript" charset="utf-8">        
jQuery(document).ready(function() {  

    $('.elimina_reg').click(function(e) {  
            $('#registroId').val($(this).attr('id')); 
                $("#elimina_modal").modal({
                    backdrop: "static"
                });                         
        });


   $('#elimina-box').click(function(e) {
        e.preventDefault();      
       $('#elimina_modal').modal('toggle');  
        var id=$("#registroId").val();
      //alert('hola:'+$("#registroId").val()); 
       $.ajax({                                  
               type: 'post'
              , url: '<?php echo  "abril/eliminar"; ?>'                              
              , dataType: 'json'
              , data: {id: id}

              , success: function(response)  {                                                      
              if (true === response.exito) {
                  $('#submit-error').hide(); 
                  $('#submit-success').html(response.mensaje).show();                
                  location.reload();
                
              } else {
                $('#submit-success').hide();
                $('#submit-error').html(response.mensaje).show();
              }
          },
          error: function(response) {
              $('#submit-success').hide();
              $('#submit-error').html('An error occurred when the request.').show();
          }
      });

   });



}); // fin de ready

</script>