<?php 
	class Users{
		public function userRegister($data){
			$c=new Connect();
			$connection=$c->connection();
			$date=date('Y-m-d');
			$sql="INSERT INTO sl_users (name,
								last_name,
								email,
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
		public function getUserData($idUser){
			$c=new Connect();
			$connection=$c->connection();
			$sql="SELECT id_user,
							name,
							last_user,
							email
					FROM sl_users 
					WHERE id_user='$idUser'";
			$result=mysqli_query($connection,$sql);
			
			$row=mysqli_fetch_row($result);
			
			$userArray=array(
						'id_user' => $row[0],
							'name' => $row[1],
							'lastName' => $row[2],
							'email' => $row[3]
						);
			return $userArray;
		}
		public function updateUser($data){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="UPDATE sl_users SET name='$data[1]',
							last_name='$data[2]',
							email='$data[3]'
						WHERE id_user='$data[0]'";
			return mysqli_query($connection,$sql);	
		}
		public function deleteUser($idUser){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$sql="DELETE FROM sl_users 
					WHERE id_user='$idUser'";
			return mysqli_query($connection,$sql);
		}
	}
 ?>
