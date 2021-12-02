function validar() {
var usuario =  document.getElementById('usuario').value;

pass1 = document.getElementById('password');
pass2 = document.getElementById('password');

console.log(pass1+'/'+pass1);
/*var passw1 =  document.getElementById('password').value;
var passw2 =  document.getElementById('password2').value;*/

if (usuario == ''){
document.getElementById('Iusuario').innerHTML='El campo usuario esta vacio';
document.getElementById('usuario').focus();
   return false;

} 

if(pass1==pass2){
document.getElementById('Mpass').innerHTML='';
}else{

document.getElementById('Mpass').innerHTML='Las contraseñas no coinciden';
document.getElementById('contrasena2').focus();
   return false;
}
                    
}