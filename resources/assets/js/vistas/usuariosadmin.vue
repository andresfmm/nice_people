<template>
  <div>
      

    <div class="container margin-oficial">
    <div class="box-body table-responsive ">
          <table class="table table-hover table-condensed" id="adminuser">
           <thead>
            <tr>
                
                
                <th>name</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>  
         </table>
        </div>
     </div>
     

    




<!-- The Modal actualizar empleado -->
  <div class="modal fade" id="editarUsuario">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
     <div class="modal-body">
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="info-box col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="form-group">
        <input type="hidden"  v-model="adminusuarios.Uid" id="idU">
          <div  style="margin-top: 10px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <label for="exampleInputEmail1"><strong>Nombre *</strong></label>
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nombre"  id="nameU" v-model="adminusuarios.nombre" v-on:keyup="letU1">
              <p id="Au1" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <label for="exampleInputEmail1"><strong>Email *</strong></label>
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Apellido"  id="emailU" v-model="adminusuarios.email" v-on:keyup="letU2">
              <p id="Au2" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="select col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">
              <select name="account" class="form-control"  v-model="adminusuarios.rol" id="listasU">
                 <option value="">Nuevo rol </option>
                 <option value="administrador">administrador </option>
                 <option value="lider">lider </option>
                 <option value="registrado">registrado </option>
              </select>
              <p id="Ev9" style="visibility:hidden; color:red;">Campo obligatorio</p>
           </div>
              <input type="hidden" class="form-control"  aria-describedby="emailHelp" placeholder="Apellido"  id="idE">
            
          </div>


          

          

      </div>


      <button type="button" class="btn btn-primary mouse-pointer" style="margin-bottom: 10px;" @click="updateUser()">Actualizar usuario</button>

     </div><!-- /.info-box-content -->
   </div><!-- /.info-box -->
  </div>
 </div> 
</div>



</div>
</div> 

<!-- fin modal actualizar empleado -->




<!-- The Modal crear usuaro -->
  <div class="modal fade" id="createUser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Crear usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
     <div class="modal-body">
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="info-box col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="form-group">
        <input type="hidden"  v-model="adminusuarios.Uid">
          <div  style="margin-top: 10px;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">
              
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Nombre"  id="nombreE" v-model="adminusuarios.Cnombre" v-on:keyup="letU3">
              <p id="Cu1" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">
              
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Email"  id="apellidoE" v-model="adminusuarios.Cemail" v-on:keyup="letU4">
              <p id="Cu2" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="select col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">
              <select name="account" class="form-control"  v-on:change="letCu8" v-model="adminusuarios.Crol">
                 <option value="">Rol </option>
                 <option value="administrador">administrador </option>
                 <option value="lider">lider </option>
                 <option value="registrado">registrado </option>
              </select>
              <p id="Cu3" style="visibility:hidden; color:red;">Campo obligatorio</p>
           </div>
              <input type="hidden" class="form-control"  aria-describedby="emailHelp" placeholder="Apellido"  id="idE">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Clave"  id="apellidoE" v-model="adminusuarios.Cclave1" v-on:keyup="letU5">
              <p id="Cu4" style="visibility:hidden; color:red;">Campo obligatorio</p>
              <p id="Cu44" style="visibility:hidden; color:red;">claves no coinciden</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
              
              <div style="color:red" ></div>
              <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Confirmar clave"  id="apellidoE" v-model="adminusuarios.Cclave2" v-on:keyup="letU6">
              <p id="Cu5" style="visibility:hidden; color:red;">Campo obligatorio</p>
              <p id="Cu55" style="visibility:hidden; color:red;">claves no coinciden</p>
            </div>  
            
          </div>


          

          

      </div>


      <button type="button" class="btn btn-primary mouse-pointer" style="margin-bottom: 10px;" @click="CreateUser()">Crear usuario</button>

     </div><!-- /.info-box-content -->
   </div><!-- /.info-box -->
  </div>
 </div> 
</div>



</div>
</div> 

<!-- fin modal crear empleado -->


  </div>
</template>


<script>
  export default{
     created:function(){
        this.tablamostrarempleados();
        this.getupdateusuarios();
        
      
     },
   data:function(){
          return{
              adminusuarios:{
                   nombre:'',
                   email:'',
                   rol:'',
                   Uid:'',
                   listas:[],
                   Cnombre:'',
                   Cemail:'',
                   Crol:'',
                   Cclave1:'',
                   Cclave2:'',
               } /* closed brackets empleadoupdate */
          } /* closed brackets data:function */
     }, /* closed brackets export default */
     methods:{
      
      tablamostrarempleados(){
     $(document).ready(function(){
       $('#adminuser').DataTable({
       "oLanguage": {
          "sSearch": "Buscar Usuario: "
          },
          "processing": true,
          "serverSide": true,
          "ajax": "getUsuarios",
          columns: [

           
            { data: 'name', name: 'name' },
            { data: 'email', name: 'Email' },
            { data: 'User', name: 'Rol' },
            {data: 'action', name: 'acciones', orderable: false, searchable: false},
           ]
        });
       });
      }, /* closed brackets tablamostrarempleados */
      letU1:function(){
          var let1 = this.adminusuarios.nombre.trim();
        if (let1.length > 0) {
          document.getElementById("Au1").style.visibility = "hidden";
        }
      },
      letU2:function(){
          var let2 = this.adminusuarios.email.trim();
        if (let2.length > 0) {
          document.getElementById("Au2").style.visibility = "hidden";
        }
      },
      letU3:function(){
          var let3 = this.adminusuarios.Cnombre.trim();
        if (let3.length > 0) {
          document.getElementById("Cu1").style.visibility = "hidden";
        }
      },
      letU4:function(){
          var let4 = this.adminusuarios.Cemail.trim();
        if (let4.length > 0) {
          document.getElementById("Cu2").style.visibility = "hidden";
        }
      },
      letU5:function(){
          var let5 = this.adminusuarios.Cclave1.trim();
          var let7 = this.adminusuarios.Cclave2.trim();
        if (let5.length > 0) {
          document.getElementById("Cu4").style.visibility = "hidden";
        }
        if (let5 == let7) {
          document.getElementById("Cu44").style.visibility = "hidden";
          document.getElementById("Cu55").style.visibility = "hidden";
        }
      },

      letU6:function(){
          var let6 = this.adminusuarios.Cclave2.trim();
          var let8 = this.adminusuarios.Cclave1.trim();
        if (let6.length > 0) {
          document.getElementById("Cu5").style.visibility = "hidden";
        }
        if (let6 == let8) {
          document.getElementById("Cu44").style.visibility = "hidden";
          document.getElementById("Cu55").style.visibility = "hidden";
        }
      },
  
      letCu8:function(){
         if(this.adminusuarios.Crol == '' || this.adminusuarios.Crol == undefined || this.adminusuarios.Crol == null){
             document.getElementById("Cu3").style.visibility = "hidden";
         }
      },

      CreateUser(){
           var url = 'createusuario';

           if (this.adminusuarios.Cnombre.trim() == '' || this.adminusuarios.Cnombre.trim() == undefined || this.adminusuarios.Cnombre.trim() == null) {
                 document.getElementById("Cu1").style.visibility = "visible";
              }else if(this.adminusuarios.Cemail.trim() == '' || this.adminusuarios.Cemail.trim() == undefined || this.adminusuarios.Cemail.trim() == null){
                 document.getElementById("Cu2").style.visibility = "visible";
              }else if(this.adminusuarios.Crol == '' || this.adminusuarios.Crol == undefined || this.adminusuarios.Crol == null){
                 document.getElementById("Cu3").style.visibility = "visible";
              }else if(this.adminusuarios.Cclave1.trim() == '' || this.adminusuarios.Cclave1.trim() == undefined || this.adminusuarios.Cclave1.trim() == null){
                 document.getElementById("Cu4").style.visibility = "visible";
              }else if(this.adminusuarios.Cclave2.trim() == '' || this.adminusuarios.Cclave2.trim() == undefined || this.adminusuarios.Cclave2.trim() == null){
                 document.getElementById("Cu5").style.visibility = "visible";
              }else if(this.adminusuarios.Cclave1.trim() != this.adminusuarios.Cclave2.trim()){
                  document.getElementById("Cu44").style.visibility = "visible";
                  document.getElementById("Cu55").style.visibility = "visible";
              }else{
           axios.post(url,{
              'name': this.adminusuarios.Cnombre,
              'email': this.adminusuarios.Cemail,
              'password': this.adminusuarios.Cclave1,
              'rol': this.adminusuarios.Crol,
           }).then( response=>{
            console.log(response.data);
                 if (response.data.hasOwnProperty('email')) {
                  Toastr.error(response.data.email);
                 }else if(response.data.hasOwnProperty('name')){
                   Toastr.error(response.data.name);
                 }else if(response.data.hasOwnProperty('password')){
                   Toastr.error(response.data.password);
                 }else if(response.data.hasOwnProperty('rol')){
                    Toastr.success(response.data.rol);
                 }else if(response.data == 'ok'){
                    Toastr.success('Usuario registrado');
                    this.adminusuarios.Cnombre = '';
                    this.adminusuarios.Cemail = '';
                    this.adminusuarios.Cclave1 = '';
                    this.adminusuarios.Crol = '';
                 }else{

                 }
           }).catch( error=>{

           });
          } 
      }, /* closed brackets crear usuario */
      updateUser(id){
        var url = 'updateUser';
         if (this.adminusuarios.nombre.trim() == '' || this.adminusuarios.nombre.trim() == undefined || this.adminusuarios.nombre.trim() == null) {
                 document.getElementById("Au1").style.visibility = "visible";
            }else if(this.adminusuarios.email.trim() == '' || this.adminusuarios.email.trim() == undefined || this.adminusuarios.email.trim() == null){
                 document.getElementById("Au2").style.visibility = "visible";
              }else{
        axios.post(url,{
           'id': this.adminusuarios.Uid,
           'name': this.adminusuarios.nombre,
           'email': this.adminusuarios.email,
           'rol': this.adminusuarios.rol,
        }).then( response => {
            
             if (response.data == 'ok') {
              Toastr.success('Usuario actualizado');
             }else if(response.data == 'unauthorized'){
              Toastr.error('No autorizado');
             }else if(response.data.hasOwnProperty('email')){
              Toastr.error(response.data.email);
             }else{
              
             }
        }).catch( error => {

        });
       }
      },
      selectUsuario(){

      }, /* closed brackets selectUsuario */
      getupdateusuarios(){
             var url = 'getupdateusuarios';
             axios.get(url,{
                 
             }).then( response => {
              
                this.adminusuarios.Uid = response.data[0].id;
                this.adminusuarios.nombre = response.data[0].name;
                this.adminusuarios.email = response.data[0].email;
                this.adminusuarios.listas = response.data;
             }).catch( error => {

             });
      } /* closed brackets getupdateusuarios */
      
      

     }/* closed brackets methods */
  }
</script>





