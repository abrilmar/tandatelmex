<body>
<?php //echo base_url();
//echo $variable;?>
<div class="container">
<div class="row">
  <div class="col-md-10">
  <h1>hola formulario</h1>
  <!--
  	<div class="table-responsive">
  		<table class="table table-striped table-condensed t-responsive">
  			<tr>
  				<td>Id cuntry</td>
  				<td>Contries</td>
  				<td>Estatus</td>
  			</tr>
  			
  				<?php// foreach($ejemplo as $item): ?>
  					<tr>
  					<td> <?php//echo $item ->countryId; ?></td>
  					<td> <?php //echo $item ->country; ?></td>
  					<td> <?php //echo $item ->status; ?></td>
  					</tr>
  				<?php //endforeach; ?>	
		</table>
  	</div>
  </div>
  <a href="<?php// echo base_url();?>/index.php/abril/show_principal">asdasd</a>
    -->
<form role="form" id="form_arterupestre" action="formulario_guarda" enctype="multipart/form-data">
  <div class="form-group">
    <label>Arte rupestrel</label>
    <input type="input" class="form-control" id="arte_rupestre_input"
           placeholder="Introduce el arte rupestre" name="arte_rupestre_input">
  </div>
  <div class="form-group">
    <label>Pais</label>
    <select class="form-control" id="select_paises" name="select_paises">
   
      <?php foreach ($ejemplo as $items):?>
        <option value= <?php echo $items ->countryId; ?> ><?php echo $items ->country; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
  <div class="form-group">
    <label>usuario</label>
    <select class="form-control" id="select_users" name="select_users">
     <?php foreach ($users as $item):?>
        <option value= <?php echo $item ->userId; ?> ><?php echo $item ->userName." ".$item ->lastName?></option>
    <?php endforeach; ?>
  </select>
  </div>
  <div class="form-group">
    <label>Observaciones</label>
    <textarea class="form-control" rows="5" id="observaciones" name="observaciones"></textarea>
  </div>
  <a id="formu_guarda" href="#" class="btn btn-success">sdadasd</a>
</form>
</div>
</div>
</div>

<!--- 
Aqui modal


 -->

  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="eliminar_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="registro_id" value=""/>
        <button type="button" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>




<div style="display:none" id="submit-error" class="alert alert-danger">
            <strong>¡ Atención !</strong> No se logró guardar la información.
        </div>
        <div style="display:none" id="submit-success" class="alert alert-success">
            La información se guardó satisfactoriamente.
        </div>  
 <script type="text/javascript">
      function minutos(){
      $('#submit-success').hide();
     
    }
    $(document).ready(function(){
        jQuery.validator.addMethod("lettersonly", function(value, element) { 
    return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
},"Solo letras");
        $('#formu_guarda').click(function(e) {
            e.preventDefault(); //limpia la cachey deja solo nuestro evento        
           $( "#form_arterupestre" ).submit();                   
        });

         $('#form_arterupestre').validate({              
               rules: {                
                        arte_rupestre_input:{ 
                        required: true,
                        //lettersonly : true, 
                        minlength: 5},
                        select_paises:'required',
                        select_users:'required',
                        observaciones:'required'

                     },
               ignore: [],
               messages: {                   
                   'arte_rupestre_input':{
                        required: "El campo es requerido",
                        minlength: function (p, element) {
                            return "Tiene que ser mayor que" + p;
                        }
                    },
                  'select_paises':'Selecciona un pais',
                  'select_users':'Selecciona un usuario',
                  'observaciones':'El campo es requerido'
                
               },              
              submitHandler: function(form) {
                   $.ajax({
                     data: new FormData(form),
                     type: 'post', 
                     url: $(form).attr('action'),
                     processData: false,
                     contentType: false,
                     dataType : 'json',             

                     success: function(response_abril) {
                     if (true === response_abril.exito_abril)
                       {                                         
                         $('#submit-error').hide();
                         $('#submit-success').html(response_abril.mensaje_abril).show();
                         setTimeout('minutos()',5000);  
                         // $(location).attr('href',ruta);
                       } 
                      else {                                        
                         $('#submit-success').hide();
                         $('#submit-error').html(response_abril.mensaje_abril).show();
                          }
                     },
                     error: function(response_abril) {
                         $('#submit-success').hide();
                         $('#submit-error').html('error').show();
                     }
                    }); 
                  
                   $('html, body').animate({scrollTop: 0}, 'slow');
                   return false;
                }  //fin de handler 
           });  //fin d evalidate
    





        

    }); // fin de jquery


</script>
</body>
