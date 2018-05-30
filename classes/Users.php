<?php 
	class Users{
		public function userRegister($data){
			$c=new Connect();
			$connection=$c->connection();
			$date=date('Y-m-d');
			$sql="INSERT INTO sl_users (name_user,
								last_name,
								email_user,
								password,
								date_capture)
						VALUES ('$data[0]',
								'$data[1]',
								'$data[2]',
								'$data[3]',
								'$date')";
			return mysqli_query($connection,$sql);
		}

		public function loginUser($inform){
			$c=new Connect();
			$connection=$c->connection();
			$password=sha1($inform[1]);

			$_SESSION['user']=$inform[0];
			$_SESSION['iduser']=self::bringID($inform);

			$sql="SELECT * 
					from sl_users 
				where email='$inform[0]'
				and password='$password'";
			$result=mysqli_query($connection,$sql);

			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}
		}
		public function bringID($inform){
			$c=new Connect();
			$connection=$c->connection();

			$password=sha1($inform[1]);

			$sql="SELECT id_user 
					from sl_users 
					where email='$inform[0]'
					and password='$password'"; 
			$result=mysqli_query($connection,$sql);

			return mysqli_fetch_row($result)[0];
		}
		public function obtenDatosUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="SELECT id_usuario,
							nombre,
							apellido,
							email
					from usuarios 
					where id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);
			$datos=array(
						'id_usuario' => $ver[0],
							'nombre' => $ver[1],
							'apellido' => $ver[2],
							'email' => $ver[3]
						);
			return $datos;
		}
		public function actualizaUsuario($datos){
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE usuarios set nombre='$datos[1]',
									apellido='$datos[2]',
									email='$datos[3]'
						where id_usuario='$datos[0]'";
			return mysqli_query($conexion,$sql);	
		}
		public function eliminaUsuario($idusuario){
			$c=new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from usuarios 
					where id_usuario='$idusuario'";
			return mysqli_query($conexion,$sql);
		}
	}
 ?>
