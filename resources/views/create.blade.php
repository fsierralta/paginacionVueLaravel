<!-- Modal -->
<form  method="POST" v-on:submit.prevent="crearRegistro">
  <div class="modal " id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
		        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h6 class="modal-title " >Crear Usuario</h6>
		        </div>
		        <div class="modal-body">
		         		
		         		          <div class="form-group">
		         		          	    <label class="col-form-label-lg" for="name" >Nombre</label>
		         		          	    <input type="text" name="name" class="form-control"  v-model="vname"  placeholder="Nombre">
		         		          	    <label class="col-form-label-lg" for="email">Email</label>
		         		          	    <input type="text" name="email" class="form-control" v-model="vemail" placeholder="Email">
		         		          	    <label class="col-form-label-lg" for="password" >Password</label>
		         		          	    <input type="text" name="password" class="form-control" v-model="vpassword" placeholder="Password">
		         		          	    <span v-for="error in errors" class="text-danger">@{{error}}</span>

		         		          </div>	
		         		  
		         		
		        </div>
		        <div class="modal-footer">
		        		  <input  type="Submit" class="btn btn-default"  value="Guardar">
		        </div>
      </div>
      
    </div>
</div>
</form>


