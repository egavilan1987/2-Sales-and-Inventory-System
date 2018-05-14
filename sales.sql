create database sales;

use sales;

create table sl_users(
				id_user int auto_increment,
				name_user varchar(50),
				last_user varchar(50),
				email_user varchar(50),
				password text(50),
				date_capture date,
				primary key(id_user)
					);

create table sl_categories(
				id_category int auto_increment,
				id_user int not null,
				name_category  varchar(150),
				date_capture date,
				primary key(id_category)
						);

create table sl_images(
				id_image int auto_increment,
				id_category int not null,
				name_image varchar(500),
				path varchar(500),
				uploaded_date date,
				primary key(id_image)
					);
create table sl_items(
				id_product int auto_increment,
				id_category int not null,
				id_image int not null,
				id_user int not null,
				name_product varchar(50),
				description_product varchar(500),
				stock_product int,
				price_product float,
				date_capture date,
				primary key(id_product)

						);
create table sl_clients(
				id_client int auto_increment,
				id_user int not null,
				name_client varchar(200),
				last_client varchar(200),
				address_client varchar(200),
				email_client varchar(200),
				telephone_client varchar(200),
				rfc varchar(200),
				primary key(id_client)
					);
create table sl_sales(
				id_sale int not null,
				id_client int,
				id_product int,
				id_user int,
				price_sales float,
				purchase_date date
					);
