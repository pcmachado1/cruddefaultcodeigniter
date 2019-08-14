<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>

<div id="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          CRUD
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="novousuario">Novo Cadastro</a>
		          <a class="dropdown-item" href="index">Listar Usuarios</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
		</nav>
		<div class="row my-5 ">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<fieldset class="border p-2">
   					<legend  class="w-auto">Usuarios</legend>
					<table class="table table-hover">
					<thead class="thead-dark">
						
					<tr>
						 <th>ID</th>
						 <th>First Name</th>
						 <th>Last Name</th>
						 <th>Email</th>
						 <th>Actions</th>
						 <th>Actions</th>
					 </tr>
					</thead>		
					<tbody >
					 <?php foreach ($usuarios as $row) : ?>
						 <tr>
						 <td><?php echo $row->id; ?></td>
						 <td><?php echo $row->nome; ?></td>
						 <td><?php echo $row->sobrenome; ?></td>
						 <td><?php echo $row->email; ?></td>
						 <td><?php echo anchor
						 ('usuariocontroller/editarusuario/'.$row->id, 'Edit') ; ?></td>
						 <td><?php echo anchor
						 ('usuariocontroller/deletarusuario/'.$row->id, 'Delete') ; ?></td>
						 </tr>
					 <?php endforeach ; ?>
					 </tbody>
					</table>
					</fieldset>
				</div>
				<div class="col-md-3"></div>
		</div>
	
		
	

</div>

</body>
</html>