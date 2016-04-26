<body>

	<div class="container">
	<!--login modal-->
		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		  <div class="modal-content">
		      <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		          <h1 class="text-center">Login</h1>
		      </div>
		      <div class="modal-body">
		          <form  role="form" action="<?php echo base_url();?>abril/validate_user" id="form_login" class="form col-md-12 center-block" enctype="multipart/form-data" method="post"  >
		            <div class="form-group">
		              <input id="email_user" type="text" class="form-control input-lg" placeholder="Email" name="email_user">
		            </div>
		            <div class="form-group">
		              <input id="pass_user" type="text" class="form-control input-lg" placeholder="Password" name="pass_user">
		            </div>
		            <div class="form-group">
		              <a id="formu_guarda" href="#" class="btn btn-primary btn-lg btn-block">Enviar</a>
		            </div>
		          </form>
		      </div>
		      <div class="modal-footer">
		          <div class="col-md-12">
		          
				  </div>	
		      </div>
		  </div>
		  </div>
		</div>				
	</div>

	<!-- Aqui termina el modal aviso  -->
<script type="text/javascript">
    $(document).ready(function(){
    	 $('#formu_guarda').click(function(e) {
            e.preventDefault(); //limpia la cachey deja solo nuestro evento        
           $( "#form_login" ).submit();                   
        });


         $('#form_login').validate({              
               rules: {                
                        email_user:{ 
                        required: true,
                        email: true
                        //lettersonly : true
                    	},
                        pass_user:'required'

                     },
               ignore: [],
               messages: {                   
                   'email_user':{'required':"El campo es requerido",
               						'email':'introduce un email como email@email.com'},
                  'pass_user':'Ingresa una contraseña porfavor'
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
                        
                           console.log('sii');
                           window.location.href = "<?php echo site_url('abril/index'); ?>";
                       } 
                       else{
                       		alert('Noooo i.i');   

                       }
                      
                     },
                     error: function(response_abril) {
                         alert('Ocurrio un error');
                     }
                    }); 
                  
                   $('html, body').animate({scrollTop: 0}, 'slow');
                   return false;
                }  //fin de handler 

           });  //fin d evalidate
    }); // fin de jquery
</script>
</body>