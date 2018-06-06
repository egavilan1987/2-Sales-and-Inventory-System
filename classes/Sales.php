<?php 

class Sales{
	public function getProductData($idProduct){
			$c=new Connect();
			$connection=$c->connection();

		$sql="SELECT itm.name_product,
		itm.description_product,
		itm.stock_product,
		img.pathStorage,
		itm.price_product
		from sl_items as itm 
		inner join sl_images as img
		on itm.id_image=img.id_image 
		and itm.id_product='$idProduct'";
		$result=mysqli_query($connection,$sql);

		$row=mysqli_fetch_row($result);

		$d=explode('/', $row[3]);

		$img=$d[1].'/'.$d[2].'/'.$d[3];

		$data=array(
			'name_product' => $row[0],
			'description_product' => $row[1],
			'stock_product' => $row[2],
			'pathStorage' => $img,
			'price_product' => $row[4]
		);		
		return $data;
		}
	
	}

?>