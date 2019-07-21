<!-- Modal -->
<form  method="POST" v-on:submit.prevent="updateRegistro(registrosEdits.id)">
  <div class="modal  " id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
		        <div class="modal-header  " >
			          <button type="button" class="close" data-dismiss="modal">
			          	<span>&times;</span>
			          </button>
			          <h6 >Editar Usuario</h6>
		        </div>
		        <div class="modal-body">
		         		
		         		          <div class="form-group">
		         		          	    <label class="col-form-label-lg" for="name" >Nombre</label>
		         		          	    <input type="text" name="name" class="form-control"  v-model="registrosEdits.name"  placeholder="Nombre">
		         		          	    <label class="col-form-label-lg" for="email">Email</label>
		         		          	    <input type="text" name="email" class="form-control" v-model="registrosEdits.email" placeholder="Email">
		         		          	   <!--  
		         		          	    <label class="col-form-label-lg" for="password" >Password</label>
		         		          	   
		         		          	   <input type="text" name="password" class="form-control" v-model="registrosEdits.password" placeholder="Password">
		         		          	    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                                       -->
		         		          </div>	
		         		  
		         		
		        </div>
		        <div class="modal-footer">
		        		  <input  type="Submit" class="btn btn-default"  value="Actualizar">
		        </div>
      </div>
      
    </div>
</div>
</form>
