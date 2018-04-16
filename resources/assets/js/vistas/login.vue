<template>
   <!-- inicio login -->
   <div>
    <section class="container margin-oficial-login">
    <div id="loginpreload">
   </div>
        <div class="card card-container">

            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="usucontra" style="display:none; color:#f44336;">usuario o contraseña incorrectos</span>

                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus v-model="login.login">
                <span id="usunombre" style="display:none; color:#f44336;">campo email obligatorio</span>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required v-model="login.clave">
                <span id="usuclave" style="display:none; color:#f44336;">campo contraseña obligatorio</span>
                <div id="remember" class="checkbox">
                </div>
                
            </form><!-- /form -->

            <button v-if="currency"> logueado</button>
            <button v-else class="btn btn-lg btn-primary btn-block btn-signin mouse-pointer"   @click="Loginusuario()">Login</button>
            <a href="#" class="forgot-password bold-negro cent">
                ¿Haz olvidado tu contraseña?
            </a>
        </div><!-- /card-container -->
    </section><!-- /container -->

   <!-- fin login -->
 </div>
</template>

<script>var currency = <?php echo Auth::guest(); ?>
    
</script>

<script>
  export default{
     
     data:function(){
          return{
            login:{
                login:'',
                clave:'',
            },
            errors:[],
            currency:''


        } /*clode brackets return */
     }, /*close brackets data:function */
     methods:{
         loginpreload:function(){
         $('#loginpreload').ready(function() { 
        $.blockUI({ css: { 
            border: 'none', 
            padding: '10px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: 'white' 
        } }); 
 
       
    }); 
    },
    closeloginpreload:function(){
        $('#loginpreload').ready(function() { 
        $.unblockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .6, 
            color: 'white' 
        } }); 
 
       
    });
      },
         Loginusuario:function(){
            if(this.login.login.trim() == ''){
              $('#usunombre').show()
            }else if(this.login.clave.trim() == ''){
              $('#usuclave').show()
            }else{
            const url = 'login';

            var formData = new FormData();
            formData.append('email', this.login.login);
            formData.append('password', this.login.clave);
             this.loginpreload();
            axios.post(url, formData,{
                headers: {
                'Content-Type': 'multipart/form-data'
               }
            }).then(response => {

                this.closeloginpreload()
                if(response.data == 'somerror'){
                   $('#usunombre').hide()
                   $('#usuclave').hide()
                   $('#usucontra').show() 
                }else if(response.data == 'administrador'){
                   this.login.login = '';
                   this.login.clave = '';
                   $('#usunombre').hide()
                   $('#usuclave').hide()
                   $('#usucontra').hide() 
                   var urlactual = window.location.href;
                   var urlnew = urlactual.replace(urlactual, urlactual+"usuarios");
                   window.location.href = urlnew;
                   
                   

                }else if(response.data == 'lider'){
                   this.login.login = '';
                   this.login.clave = '';
                   $('#usunombre').hide()
                   $('#usuclave').hide()
                   $('#usucontra').hide() 
                   var urlactual = window.location.href;
                   var urltoreplace = window.location.pathname;
                   var urlnew = urlactual.replace(urltoreplace, "/usuario-lider");
                   window.location.href = urlnew;
                   

                }else if(response.data == 'registrado'){
                   this.login.login = '';
                   this.login.clave = '';
                   $('#usunombre').hide()
                   $('#usuclave').hide()
                   $('#usucontra').hide() 
                   var urlactual = window.location.href;
                   var urltoreplace = window.location.pathname;
                   var urlnew = urlactual.replace(urltoreplace, "/usuario-registrado");
                   window.location.href = urlnew;
                }else{

                }
                

            }).catch(error => {
                this.closeloginpreload()
                 this.errors = error.response.data
            });
          } /*close brackets else */
         }
     } /*close brackets methods */
  }
</script>