<template>
 <div>

  <div class="container margin-oficial">
   <div class="box-body table-responsive ">
    <table class="table table-hover table-condensed" id="admiprojects">
     <thead>
      <tr>

       <th>name</th>
       <th>description</th>
       <th>avatar</th>
       <th>alias</th>
       <th>status</th>
       <th>initial_date</th>
       <th>final_date</th>
       <th>leader_name</th>
       <th>acciones</th>

      </tr>
     </thead>
    </table>
   </div>
  </div>

  <!-- The Modal actualizar proyecto -->
  <div class="modal fade" id="editarProyecto">
   <div class="modal-dialog">
    <div class="modal-content">

     <!-- Modal Header -->
     <div class="modal-header">
      <h4 class="modal-title">Actualizar proyecto</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <div class="modal-body">
      <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="info-box col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="form-group">
          <input type="hidden" v-model="adminproyectos.pid">
          <input type="hidden" v-model="adminproyectos.uid">
          <div style="margin-top: 10px;">

           <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="exampleInputEmail1"><strong>Name *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" id="nombreE" v-model="adminproyectos.name" v-on:keyup="letP1">
             <p id="Pu1" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Description *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" id="apellidoE" v-model="adminproyectos.description" v-on:keyup="letP2">
             <p id="Pu2" style="visibility:hidden; color:red;">campo obligatorio</p>
            </div>
           </div>

           <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>avatar *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" id="nombreE" v-model="adminproyectos.avatar" >
             <p id="Pu" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Alias *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" id="apellidoE" v-model="adminproyectos.alias" v-on:keyup="letP3">
             <p id="Pu3" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
           </div>
           <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Status *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" id="nombreE" v-model="adminproyectos.status" v-on:keyup="letP4">
             <p id="Pu4" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Initial date *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" id="apellidoE" v-model="adminproyectos.initial_date" v-on:keyup="letP5">
             <p id="Pu5" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
           </div>
           <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Final date *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" id="nombreE" v-model="adminproyectos.final_date" v-on:keyup="letP6">
             <p id="Pu6" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
             <label for="exampleInputEmail1"><strong>Leader name *</strong></label>
             <div style="color:red"></div>
             <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" id="apellidoE" v-model="adminproyectos.leader_name" v-on:keyup="letP7">
             <p id="Pu7" style="visibility:hidden; color:red;">Campo obligatorio</p>
            </div>
           </div>

          </div>
         </div>

         <button type="button" class="btn btn-primary mouse-pointer" style="margin-bottom: 10px;" @click="updateproyecto()">Actualizar proyecto</button>

        </div>
        <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
      </div>
     </div>
    </div>

   </div>
  </div>

  <!-- fin modal actualizar proyecto -->

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
          <input type="hidden" v-model="adminproyectos.Uid">
          <div style="margin-top: 10px;">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">

            <div style="color:red"></div>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" id="nombreE" v-model="adminproyectos.Cnombre" v-on:keyup="letP3">
            <p id="Cu1" style="visibility:hidden; color:red;">Campo obligatorio</p>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">

            <div style="color:red"></div>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Email" id="apellidoE" v-model="adminproyectos.Cemail" v-on:keyup="letP4">
            <p id="Cu2" style="visibility:hidden; color:red;">Campo obligatorio</p>
           </div>
           <div class="select col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-3em">
            <select name="account" class="form-control" v-on:change="letP4" v-model="adminproyectos.Crol">
             <option value="">Rol </option>
             <option value="administrador">administrador </option>
             <option value="lider">lider </option>
             <option value="registrado">registrado </option>
            </select>
            <p id="Cu3" style="visibility:hidden; color:red;">Campo obligatorio</p>
           </div>
           <input type="hidden" class="form-control" aria-describedby="emailHelp" placeholder="Apellido" id="idE">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div style="color:red"></div>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Clave" id="apellidoE" v-model="adminproyectos.Cclave1" v-on:keyup="letP4">
            <p id="Cu4" style="visibility:hidden; color:red;">Campo obligatorio</p>
            <p id="Cu44" style="visibility:hidden; color:red;">claves no coinciden</p>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

            <div style="color:red"></div>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Confirmar clave" id="apellidoE" v-model="adminproyectos.Cclave2" v-on:keyup="letP4">
            <p id="Cu5" style="visibility:hidden; color:red;">Campo obligatorio</p>
            <p id="Cu55" style="visibility:hidden; color:red;">claves no coinciden</p>
           </div>

          </div>

         </div>

         <button type="button" class="btn btn-primary mouse-pointer" style="margin-bottom: 10px;" @click="CreateUser()">Crear usuario</button>

        </div>
        <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
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
				this.tablamostrarproyectos();
				this.getupdateproyectos();
			
		 },
	 data:function(){
					return{
							adminproyectos:{
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

          uid:'',
          pid:'',
          name:'',
          description:'',
          alias:'',
          avatar:'',
          status:'',
          initial_date:'',
          final_date:'',
          leader_name:'',
							 } /* closed brackets empleadoupdate */
					} /* closed brackets data:function */
		 }, /* closed brackets export default */
		 methods:{
			
			tablamostrarproyectos(){
		 $(document).ready(function(){
			 $('#admiprojects').DataTable({
			 "oLanguage": {
					"sSearch": "Buscar Proyecto: "
					},
					"processing": true,
					"serverSide": true,
					"ajax": "getProyectos",
					columns: [
					
					 
						{ data: 'name', name: 'name' },
						{ data: 'description', name: 'description' },
						{ data: 'avatar', name: 'avatar' },
						{ data: 'alias', name: 'alias' },
						{ data: 'status', name: 'status' },
						{ data: 'initial_date', name: 'initial_date' },
						{ data: 'final_date', name: 'final_date' },
						{ data: 'leader_name', name: 'leader_name' },
						{data: 'action', name: 'acciones', orderable: false, searchable: false},
					 ]
				});
			 });
			}, /* closed brackets tablamostrarempleados */
			letP1:function(){
					var let1 = this.adminproyectos.name.trim();
				if (let1.length > 0) {
					document.getElementById("Pu1").style.visibility = "hidden";
				}
			},
			letP2:function(){
					var let2 = this.adminproyectos.description.trim();
				if (let2.length > 0) {
					document.getElementById("Pu2").style.visibility = "hidden";
				}
			},
			letP3:function(){
					var let3 = this.adminproyectos.alias.trim();
				if (let3.length > 0) {
					document.getElementById("Pu3").style.visibility = "hidden";
				}
			},
			letP4:function(){
					var let4 = this.adminproyectos.status.trim();
				if (let4.length > 0) {
					document.getElementById("Pu4").style.visibility = "hidden";
				}
			},
			letP5:function(){
					var let5 = this.adminproyectos.initial_date.trim();
				if (let5.length > 0) {
					document.getElementById("Pu5").style.visibility = "hidden";
				}
				
			},

			letP6:function(){
					var let6 = this.adminproyectos.final_date.trim();
				if (let6.length > 0) {
					document.getElementById("Pu6").style.visibility = "hidden";
				}
				
			},
	
			letP7:function(){
    var let6 = this.adminproyectos.leader_name.trim();
    if (let6.length > 0) {
     document.getElementById("Pu7").style.visibility = "hidden";
    }
			},

			CreateUser(){
					 var url = 'createusuario';

					 if (this.adminproyectos.Cnombre.trim() == '' || this.adminproyectos.Cnombre.trim() == undefined || this.adminproyectos.Cnombre.trim() == null) {
								 document.getElementById("Cu1").style.visibility = "visible";
							}else if(this.adminproyectos.Cemail.trim() == '' || this.adminproyectos.Cemail.trim() == undefined || this.adminproyectos.Cemail.trim() == null){
								 document.getElementById("Cu2").style.visibility = "visible";
							}else if(this.adminproyectos.Crol == '' || this.adminproyectos.Crol == undefined || this.adminproyectos.Crol == null){
								 document.getElementById("Cu3").style.visibility = "visible";
							}else if(this.adminproyectos.Cclave1.trim() == '' || this.adminproyectos.Cclave1.trim() == undefined || this.adminproyectos.Cclave1.trim() == null){
								 document.getElementById("Cu4").style.visibility = "visible";
							}else if(this.adminproyectos.Cclave2.trim() == '' || this.adminproyectos.Cclave2.trim() == undefined || this.adminproyectos.Cclave2.trim() == null){
								 document.getElementById("Cu5").style.visibility = "visible";
							}else if(this.adminproyectos.Cclave1.trim() != this.adminproyectos.Cclave2.trim()){
									document.getElementById("Cu44").style.visibility = "visible";
									document.getElementById("Cu55").style.visibility = "visible";
							}else{
					 axios.post(url,{
							'name': this.adminproyectos.Cnombre,
							'email': this.adminproyectos.Cemail,
							'password': this.adminproyectos.Cclave1,
							'rol': this.adminproyectos.Crol,
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
										this.adminproyectos.Cnombre = '';
										this.adminproyectos.Cemail = '';
										this.adminproyectos.Cclave1 = '';
										this.adminproyectos.Crol = '';
								 }else{

								 }
					 }).catch( error=>{

					 });
					} 
			}, /* closed brackets crear usuario */
			updateproyecto(){
				var url = 'updateProyecto';
				 if (this.adminproyectos.name.trim() == '' || this.adminproyectos.name.trim() == undefined || this.adminproyectos.name.trim() == null) {
								 document.getElementById("Pu1").style.visibility = "visible";
						}else if(this.adminproyectos.description.trim() == '' || this.adminproyectos.description.trim() == undefined || this.adminproyectos.description.trim() == null){
								 document.getElementById("Pu2").style.visibility = "visible";
							}else if(this.adminproyectos.alias.trim() == '' || this.adminproyectos.alias.trim() == undefined || this.adminproyectos.alias.trim() == null){
         document.getElementById("Pu3").style.visibility = "visible";
       }else if(this.adminproyectos.status.trim() == '' || this.adminproyectos.status.trim() == undefined || this.adminproyectos.status.trim() == null){
         document.getElementById("Pu4").style.visibility = "visible";
       }else if(this.adminproyectos.initial_date.trim() == '' || this.adminproyectos.initial_date.trim() == undefined || this.adminproyectos.initial_date.trim() == null){
         document.getElementById("Pu5").style.visibility = "visible";
       }else if(this.adminproyectos.final_date.trim() == '' || this.adminproyectos.final_date.trim() == undefined || this.adminproyectos.final_date.trim() == null){
         document.getElementById("Pu6").style.visibility = "visible";
       }else if(this.adminproyectos.leader_name.trim() == '' || this.adminproyectos.leader_name.trim() == undefined || this.adminproyectos.leader_name.trim() == null){
         document.getElementById("Pu7").style.visibility = "visible";
       }else{
				axios.post(url,{
      'uid': this.adminproyectos.uid,
      'pid': this.adminproyectos.pid,
					 'name': this.adminproyectos.name,
      'description': this.adminproyectos.description,
      'avatar': this.adminproyectos.avatar,
      'alias': this.adminproyectos.alias,
      'status': this.adminproyectos.status,
      'initial_date': this.adminproyectos.initial_date,
      'final_date': this.adminproyectos.final_date,
      'leader_name': this.adminproyectos.leader_name,
				}).then( response => {
						
						 if (response.data == 'ok') {
							Toastr.success('Proyecto actualizado');
						 }else if(response.data == 'unauthorized'){
							Toastr.error('No autorizado');
						 }else if(response.data.hasOwnProperty('name')){
							Toastr.error(response.data.name);
						 }else if(response.data.hasOwnProperty('description')){
       Toastr.error(response.data.description);
       }else if(response.data.hasOwnProperty('alias')){
       Toastr.error(response.data.alias);
       }else if(response.data.hasOwnProperty('status')){
       Toastr.error(response.data.status);
       }else if(response.data.hasOwnProperty('initial_date')){
       Toastr.error(response.data.initial_date);
       }else if(response.data.hasOwnProperty('final_date')){
       Toastr.error(response.data.final_date);
       }else if(response.data.hasOwnProperty('leader_name')){
       Toastr.error(response.data.leader_name);
       }else{
       Toastr.error('contactese con el administrador del sistema');
       }
				}).catch( error => {

				});
			 }
			},
			selectUsuario(){

			}, /* closed brackets selectUsuario */
			getupdateproyectos(){
						 var url = 'getupdateproyectos';
						 axios.get(url,{

						 }).then( response => {
        
								this.adminproyectos.uid = response.data[0].leader_user;
        this.adminproyectos.pid = response.data[0].id;
								this.adminproyectos.name = response.data[0].name;
								this.adminproyectos.description = response.data[0].description;
								this.adminproyectos.avatar = response.data[0].name;
        this.adminproyectos.alias = response.data[0].alias;
        this.adminproyectos.status = response.data[0].status;
        this.adminproyectos.initial_date = response.data[0].initial_date;
        this.adminproyectos.final_date = response.data[0].final_date;
        this.adminproyectos.leader_name = response.data[0].leader_name;
						 }).catch( error => {

						 });
			} /* closed brackets getupdateusuarios */
			

		 }/* closed brackets methods */
	}
</script>