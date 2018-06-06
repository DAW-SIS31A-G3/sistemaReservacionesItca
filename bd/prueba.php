<?php
require_once('nav.html');
 ?>
 <div class="container-fluid" style="margin-top:80px">
  <h1>ITCA-FEPADE</h1>
  <p>Plataforma de reservacio de equipo audio visual.</p>
  <h6>Administrador</h6>
</div>
<div class="container">
  <h2>Animated Alerts</h2>
  <p>The .fade and .show classes adds a fading effect when closing the alert message.</p>
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>
  <div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
  </div>
  <div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
  </div>
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
  </div>
  <div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Primary!</strong> Indicates an important action.
  </div>
  <div class="alert alert-secondary alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Secondary!</strong> Indicates a slightly less important action.
  </div>
  <div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Dark!</strong> Dark grey alert.
  </div>
  <div class="alert alert-light alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Light!</strong> Light grey alert.
  </div>
</div>
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
  <button type="button" class="btn">Basic</button>
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-dark">Dark</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-link">Link</button>
<form class="form-horizontal" action="/action_page.php">
 <div class="form-group">
   <label class="control-label col-sm-2" for="email">Email:</label>
   <div class="col-sm-10">
     <input type="email" class="form-control" id="email" placeholder="Enter email">
   </div>
 </div>
 <div class="form-group">
   <label class="control-label col-sm-2" for="pwd">Password:</label>
   <div class="col-sm-10">
     <input type="password" class="form-control" id="pwd" placeholder="Enter password">
   </div>
 </div>
 <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <div class="checkbox">
       <label><input type="checkbox"> Remember me</label>
     </div>
   </div>
 </div>
 <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-default">Submit</button>
   </div>
 </div>
</form>
<form name="f1"> 
Nombre: <input type="text" name="nombre"> 
<br> 
<input type="checkbox" name="ch1"> Opcion 1 
<br> 
<input type="checkbox" name="ch2"> Opcion 2 
<br> 
<input type="checkbox" name="ch3"> Opcion 3 
<br> 
<input type="checkbox" name="ch4"> Opcion 4 
<br> 
//Otro campo de formulario: 
<select name=otro> 
<option value="1">Seleccion 1 
<option value="2">Seleccion 2 
</select> 
<br> 
<input type="submit"> 
<br> 
<br> 
<a href="javascript:seleccionar_todo()">Marcar todos</a> | 
<a href="javascript:deseleccionar_todo()">Marcar ninguno</a> 
</form>
<script>
function seleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox")	
         document.f1.elements[i].checked=1 
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.f1.elements.length;i++) 
      if(document.f1.elements[i].type == "checkbox")	
         document.f1.elements[i].checked=0 
}
</script>