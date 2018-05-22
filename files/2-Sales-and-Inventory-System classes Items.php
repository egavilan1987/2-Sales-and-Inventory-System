-
2-Sales-and-Inventory-System classes Items.php
<?php 
	class items{
		public function addImage($data){
			$c=new Connect();
			$connection=$c->connection();
			$date=date('Y-m-d');
			$sql="INSERT INTO sl_images (id_category,
										name_image,
										path,
										uploaded_date)
							VALUES ('$data[0]',
									'$data[1]',
									'$data[2]',
									'$date')";
			return mysqli_query($connection,$sql);
		}
			public function insertItem($data){
			$c=new Connect();
			$connection=$c->connection();
			$date=date('Y-m-d');
			$sql="INSERT INTO sl_items (id_category,
										id_image,
										id_user,
										name_product,
										description_product,
										stock_product,
										price_product,
										date_capture) 
							VALUES ('$data[0]',
									'$data[1]',
									'$data[2]',
									'$data[3]',
									'$data[4]',
									'$data[5]',
									'$data[6]',
									'$date')";
			return mysqli_query($connection,$sql);
		}
		public function getItemData($id_product){
			$c=new Connect();
			$conn=$c->connection();
			$sql="SELECT id_product, 
						id_category, 
						name_product,
						description_product,
						stock_product,
						price_product
				FROM sl_items
				WHERE id_product='$id_product'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_row($result);
			$itemArray=array(
					"id_product" => $row[0],
					"id_category" => $row[1],
					"name_product" => $row[2],
					"description_product" => $row[3],
					"stock_product" => $row[4],
					"price_product" => $row[5]
						);
			return $itemArray;
		}
		public function updateItem($data){
			$c=new Connect();
			$conn=$c->connection();
			$sql="UPDATE sl_items SET id_category='$data[1]', 
										name_product='$data[2]',
										description_product='$data[3]',
										stock_product='$data[4]',
										price_product='$data[5]'
						WHERE id_product='$data[0]'";
			return mysqli_query($conn,$sql);
		}
		public function deleteItem($idProduct){
			$c=new Connect();
			$conn=$c->connection();
			$idImage=self::getImageID($idProduct);
			$sql="DELETE from sl_items 
					WHERE id_product='$idProduct'";
			$result=mysqli_query($conn,$sql);
			if($result){
				$path=self::getImagePath($idImage);
				$sql="DELETE from sl_images 
						WHERE id_image='$idImage'";
				$result=mysqli_query($conn,$sql);
					if($result){
						if(unlink($path)){
							return 1;
						}
					}
			}
		}
		public function getImageID($idProduct){
			$c=new Connect();
			$conn=$c->connection();
			$sql="SELECT id_image 
					FROM sl_items 
					WHERE id_product='$idProduct'";
			$result=mysqli_query($conn,$sql);
			return mysqli_fetch_row($result)[0];
		}
		public function getImagePath($idImg){
			$c=new Connect();
			$conn=$c->connection();
			$sql="SELECT path 
					FROM sl_images 
					WHERE id_image='$idImg'";
			$result=mysqli_query($conn,$sql);
			return mysqli_fetch_row($result)[0];
		}

	}

2-Sales-and-Inventory-System classes customer.php

<?php 
	class clients{
		public function addClient($data){
			$c=new Connect();
			$conn=$c->connection();
			$iduser=$_SESSION['iduser'];
			$sql="INSERT INTO sl_clients ($iduser,
										name_client,
										last_client,
										address_client,
										email_client,
										telephone_client,
										rfc)
							values ('$iduser,
									'$data[0]',
									'$data[1]',
									'$data[2]',
									'$data[3]',
									'$data[4]',
									'$data[5]')";
			return mysqli_query($conn,$sql);	
		}
		public function getClientData($idclient){
			$c=new Connect();
			$conn=$c->connection();
			$sql="SELECT id_client, 
							name_client,
							last_client,
							address_client,
							email_client ,
							telephone_client,
							rfc 
				FROM sl_clients";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_row($result);
			$clientArray=array(
					'id_client' => $row[0], 
					'name_client' => $row[1],
					'last_client' => $row[2],
					'address_client' => $row[3],
					'email_client' => $row[4],
					'telephone_client' => $row[5],
					'rfc' => $row[6]
						);
			return $clientArray;
		}

		public function updateClient($data){
			$c=new Connect();
			$conn=$c->connection();
			$sql="UPDATE sl_clients SET id_user='$data[1]',
										name_client='$data[2]',
										address_client='$data[3]',
										email_client='$data[4]',
										telephone_client='$data[5]',
										rfc='$data[6]' 
								WHERE id_client='$data[0]'";
			return mysqli_query($conn,$sql);
		}
		public function deleteClient($idclient){
			$c=new Connect();
			$conn=$c->connection();
			$sql="DELETE from sl_clients WHERE id_client='$idclient'";
			return mysqli_query($conn,$sql);
		}
	}
 ?>
















-
