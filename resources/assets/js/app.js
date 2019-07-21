new Vue({
el:'#crud',
created: function() {
  this.getRegistro();


},
data:{

    registro:[]   ,
     vname:''     ,
    vemail:''     ,
    vpassword:''  ,
    offset:2      ,
    errors:[]     ,
    lerror:false  ,
    registrosEdits:{'id':'','name':'','password':''},
    paginacion:{

                          'total':0         ,
                            'per_page':0    ,
                           'last_page':0    ,
                        'current_page':0    ,
                                'from':0    ,
                                  'to':0    ,
                           'item_page':0    ,
    }


},
computed:{

     isActive: function() {
         return this.paginacion.current_page;
     },
     pagesNumber:function()
     {
          if(!this.paginacion.to)
          {
               return [];
          }
          var from =this.paginacion.current_page -this.offset; 
          if(from<1)
          {
              from=1;

          }
          var to=from +(this.offset*2);
          if(to>=this.paginacion.last_page)
          {

              to=this.paginacion.last_page;
          }           
          var arrayPagina=[];
          while(from<=to)
          {
                  arrayPagina.push(from);
                  from++;


          }
          return arrayPagina;

     }

},
 methods :{

  getRegistro: function(page){
       	var urlget='tasks?page='+page;
  	axios.get(urlget).then(response=>
    {
                                        this.registro=response.data.registro.data;
                                        this.paginacion=response.data.paginate;
  	}).catch(error=>{
                                                        this.errors.push(error.response.data);
                                                        this.lerrors=true;
                                                        toastr.error('Error en accesar los datos'); 
                                                      });
    },
  cambioPagina:function(page){
      this.paginacion.current_page=page;
      this.getRegistro(page);


  },

  updateRegistro:function(id){
      var urlput='tasks/'+ id;
      axios.put(urlput,this.registrosEdits).then(response=>{
          this.getRegistro();
          this.registrosEdits={'id':'','name':'','password':''};
          this.errors=[];
          $('#edit').modal('hide');
         toastr.success('hola update');    

      }).catch(error=>{
           this.errors.push(error.response.data)
      });

      
  },

   editarRegistro: function(record){
          this.registrosEdits.id=record.id;
        this.registrosEdits.name=record.name;
        this.registrosEdits.email=record.email;
       this.registrosEdits.password=record.password;
                  $('#edit').modal('show');

   }, 
  eliminarRegistro:function(record){
  	     var urlEliminar='tasks/'+record.id;
  	     axios.delete(urlEliminar).then(response=>{
            this.getRegistro();


  	     } );
  	     //alert(record.id);
  },
  crearRegistro:function() {

        var urlCrear='tasks';
        axios.post(urlCrear,{
                                 name:this.vname  ,
                                 email:this.vemail   ,
                                 password:this.vpassword

              }).then(response=>{
                     toastr.success('entro a crear');
                      this.getRegistro()   ;
                         this.vname=''     ;
                          this.vemail=''   ;
                       this.vpassword=''   ;
                          this.errors=[]   ;
                       $('#create').modal('hide');
                       toastr.success('creado con exito');
                      }).catch(error=>{
                                        this.errors=error.response.data
                                        
                                      }); //Fin de crear Registro axios

  }  //Fin del metodo crearRegistro

 }

});