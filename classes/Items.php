

<?php 
	class items{
		public function insertImage($data){
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
	}
