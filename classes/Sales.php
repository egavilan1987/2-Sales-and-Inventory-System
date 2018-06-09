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
	
	public function createSale(){
			$c=new Connect();
			$connection=$c->connection();

		$date=date('Y-m-d');
		$id_sale=self::createFolio();
		$data=$_SESSION['buyTableTemp'];
		$id_user=$_SESSION['iduser'];
		$r=0;

		for ($i=0; $i < count($data) ; $i++) { 
			$d=explode("||", $data[$i]);

			$sql="INSERT INTO sl_sales (id_sale,
										id_client,
										id_product,
										id_user,
										price_sales,
										purchase_date)
							VALUES ('$id_sale',
									'$d[5]',
									'$d[0]',
									'$id_user',
									'$d[3]',
									'$date')";
			$r=$r + $result=mysqli_query($connection,$sql);
		}

		return $r;
	}

	public function createFolio(){
			$c=new Connect();
			$connection=$c->connection();


		$sql="SELECT id_sale FROM sl_sales GROUP BY id_sale DESC";

		$resul=mysqli_query($connection,$sql);
		$id=mysqli_fetch_row($resul)[0];

		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}
	public function clientName($idClient){
			$c=new Connect();
			$connection=$c->connection();


		 $sql="SELECT last_client,name_client 
			from sl_clients 
			where id_client='$idClient'";
		$result=mysqli_query($connection,$sql);

		$row=mysqli_fetch_row($result);

		return $row[0]." ".$row[1];
	}

	public function getTotal($idSale){
			$c=new Connect();
			$connection=$c->connection();


		$sql="SELECT price_sales 
				from sl_sales 
				where id_sale='$idSale'";
		$result=mysqli_query($connection,$sql);

		$total=0;

		while($row=mysqli_fetch_row($result)){
			$total=$total + $row[0];
		}

		return $total;
	}
}

?>