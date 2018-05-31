<?php 
	class clients{
		public function insertClient($data){
			
			$c=new Connect();
			$connection=$c->connection();
			
			$id_user=$_SESSION['idUser'];
			$sql="INSERT INTO sl_clients (id_user,
										name_client,
										last_client,
										address_client,
										email_client,
										telephone_client,
										rfc)
							VALUES ('$id_user',
									'$data[0]',
									'$data[1]',
									'$data[2]',
									'$data[3]',
									'$data[4]',
									'$data[5]')";
			return mysqli_query($connection,$sql);	
		}
    
    
    
	}
 ?>
