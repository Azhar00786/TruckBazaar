<?php
include "info.php";
$con = mysqli_connect($s, $u,$p,$d);
if (!$con){
              die("Connection failed: " . mysqli_connect_error());
           }
$customer="create table ".$prefix."customer(c_no int primary key AUTO_INCREMENT,
                                            customer_name varchar(20) not null,
                                            customer_sex varchar(30) not null,
                                            address_1 varchar(30) not null,
                                            address_2 varchar(30) not null,
                                            emailid varchar(30),
                                            username varchar(30),
                                            password_field varchar(256),
                                            contact_number varchar(12),
                                            file_location varchar(40));";
$createCustomer=mysqli_query($con,$customer);
if(!$createCustomer){
    echo "Error :".mysqli_query_error();
}

$driver="create table ".$prefix."driver(dr_no int primary key AUTO_INCREMENT,
                                        driver_name varchar(20) not null,
                                        driver_sex varchar(30) not null,
                                        address_1 varchar(30) not null,
                                        address_2 varchar(30) not null,
                                        emailid varchar(30),
                                        username varchar(30),
                                        password_field varchar(256),
                                        contact_number varchar(12),
                                        file_location varchar(40));";
$createDriver=mysqli_query($con,$driver);
if(!$createDriver){
    echo "Error :".mysqli_query_error();
}
$driver_request="create table ".$prefix."driver_request(driver_no int primary key references driver(dr_no),
                    driver_pickupcity varchar(80) not null,
                    driver_dropcity varchar(80) not null,
                    driver_startdate varchar(20) not null,
                    driver_enddate varchar(20) not null,
                    driver_trucktype varchar(60) not null);";
$createDriver_request=mysqli_query($con,$driver_request);
if(!$createDriver_request){
    echo "Error :".mysqli_query_error();
}
$customer_request="create table ".$prefix."customer_request(customer_no int primary key references customer(c_no),
                    customer_pickupcity varchar(80) not null,
                    customer_dropcity varchar(80) not null,
                    customer_pickup_date varchar(20) not null,
                    customer_trucktype varchar(60) not null);";
$createCustomer_request=mysqli_query($con,$customer_request);
if(!$createCustomer_request){
    echo "Error :".mysqli_query_error();
}


$admin="create table ".$prefix."admin(admin_no int primary key,
                    admin_name varchar(80) not null,
                    admin_username varchar(20) not null,
                    admin_password varchar(256) not null);";
$create_admin=mysqli_query($con,$admin);
if(!$create_admin){
    echo "Error :".mysqli_query_error();
}
echo "Tables in database created successfully";
?>
