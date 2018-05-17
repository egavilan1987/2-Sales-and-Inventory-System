<?php 
	class users{
		public function usersRegister($data){
			$c=new Connect();
			$connection=$c->connection();
			$date=date('Y-m-d');
			$sql="INSERT INTO sl_users (name_user,
								last_user,
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