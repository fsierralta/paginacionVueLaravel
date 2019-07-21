@extends('app')

@section('contend')
   <div id='crud' class='row'>
       <div class='col-sm-12' >
       	    <h1>Caso de Estudio Laravel y Vue.js  /CRUD </h1>
       </div>
       <div class="col-sm-12 text-center" id="div01" >
            @component('alertar')
                <strong   id="st01">Datos del Usuario</strong>
            @endcomponent
       </div>
       <div class='col-sm-7' >
       <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm"  > Nueva tarea</a> 
       <!--<button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal">Open Modal</button> -->
        
        <table class='table table-hover table-striped'>
        	<thead>
        		<tr>
        		<td>Id</td>
        		<td>Name</td>
                <td >Email</td>
                <td colspan="2">Modificar/Eliminar</td>
               </tr>
        	</thead>
        	<tbody>
        		<tr v-for="record in registro">
        		<td width='10px'>@{{record.id}} </td>
	        		<td>@{{record.name}}  </td>
	        		<td>@{{record.email}}  </td>
	        		<td width='10px'>
	        			 <a href="#" class='btn btn-danger btn-sm' v-on:click.prevent ="editarRegistro(record)">Editar</a>
	        		</td>
	        		<td width='10px'> 
	        			<a href="#" class='btn btn-warning btn-sm' v-on:click.prevent="eliminarRegistro(record)">Eliminar</a>
	        		</td>
        		</tr>
            
        	</tbody>
            
        </table>
       
        <nav  class="navbar navbar-expand-lg      navbar-light bg-light">
         <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                     <li class="nav-item" >
                        <a  class="nav-link" href="#" title=""  @click.prevent="cambioPagina(1)">
                         Primera Pagina
                       </a>
                      
                    </li> 
                    <li class="nav-item" v-if="paginacion.current_page>1">
                      <a class="nav-link" href="#" title="" @click.prevent="cambioPagina(paginacion.current_page-1)">
                       Atras
                      </a>
                      
                    </li>
                    <li  class="nav-item text-info" v-for="pagina in pagesNumber" v-bind:class="[pagina==isActive ?'active':''] ">
                      <a  class="nav-link " href="#" title="" @click.prevent="cambioPagina(pagina)">
                         <span class="text-info   ">@{{pagina}}</span>   
                      </a>
                      
                    </li>
                    
                      
                    </li>
                    <li class="nav-item" v-if="paginacion.current_page<paginacion.last_page">
                     <a  class="nav-link" href="#" title=""  @click.prevent="cambioPagina(paginacion.current_page+1)">
                       Siguiente
                     </a>
                      
                    </li>
                     <li class="nav-item" >
                        <a  class="nav-link" href="#" title=""  @click.prevent="cambioPagina(paginacion.last_page)">
                         Ultima Pagina
                     </a>
                      
                    </li>
                  </ul>
             </div> 
            </nav>
          
      
        <span v-for="error in errors" class="text-danger">
        
          <ul class="list-group">
                <li class="list-group-item">@{{ error }} </li>
          </ul>
      </span> 
        
        @include('create')
        @include('edit')
   </div>
  <div class='col-sm-5' >
      <pre>@{{$data}}</pre>
   </div>  
  </div> 

@endsection
