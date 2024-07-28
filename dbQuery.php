<?php 
include('connection.php'); 

// #tblRSSfeed
// $createtblRSSfeed = "Create table RSSfeed
// (
// 	RSSfeedID int NOT NULL Primary Key Auto_Increment,
// 	Title varchar(30),
// 	Description text,
// 	Url varchar(100)
// )";
// $result=mysqli_query($connectDB, $createtblRSSfeed);

// if ($result) {
// 	echo "RSS Table Set up Successfully.";
// }
// else {
// 	echo "Error in RSS Table.";
// }


// #tblReviews
// $createtblReviews = "Create table Reviews
// (
// 	ReviewID int NOT NULL Primary Key Auto_Increment,
//  Username varchar(30),
//  Date varchar(30),
// 	Rating int,
// 	Feedback text,
// 	CustomerID int,
//  SiteID int,
// 	Foreign Key(CustomerID) References Customers(CustomerID),
// 	Foreign Key(SiteID) References Sites(SiteID)

// )";
// $result=mysqli_query($connectDB, $createtblReviews);

// if ($result) {
// 	echo "Reviews Table Set up Successfully.";
// }
// else {
// 	echo "Error in Reviews Table.";
// }


// #tblContact
// $createtblContact = "Create table Contact
// (
//     ContactID int NOT NULL Primary Key Auto_Increment,
//     FirstName varchar(40),
//     Surname varchar(40),
//     ContactPhone varchar(40),
//     ContactEmail varchar(40),
//     ContactMessage varchar(255),
//     CustomerID int,
//     Foreign Key(CustomerID) References Customers(CustomerID)
// )";
// $result=mysqli_query($connectDB, $createtblContact);

// if ($result) {
// 	echo "Contact Table Set up Successfully.";
// }
// else {
// 	echo "Error in Contact Table.";
// }

#tblBooking
$createtblBooking = "Create table Booking
(
	BookingID int NOT NULL Primary Key Auto_Increment,
	BookingDate date,
	CustomerID int,
	PitchID int,
	CheckInDate date,
	Quantity int,
	Subtotal int,
	Tax int,
	TotalPrice int,
	PaymentType varchar(40),
	PaymentInfo varchar(60),
	ConfirmedEmail varchar(30),
	ConfirmedPhone varchar(30),
	Msg text,
	Foreign Key(CustomerID) References Customers(CustomerID),
	Foreign Key(PitchID) References Pitches(PitchID) 
)";
$result=mysqli_query($connectDB, $createtblBooking);

if ($result) {
	echo "Booking Table Set up Successfully.";
}
else {
	echo "Error in Booking Table.";
}


// // #tblPitches
// $createtblPitches = "Create table Pitches
// (
// 	PitchID int NOT NULL Primary Key Auto_Increment,
// 	PitchName varchar(50),
// 	SiteID int,
// 	PitchTypeID int,
// 	PitchLocation varchar(100),
// 	Duration varchar(30),
// 	Price int,
// 	PitchImg1 varchar(255),
// 	PitchImg2 varchar(255),
// 	PitchImg3 varchar(255),
// 	Feature1 varchar(50),
// 	Feature2 varchar(50),
// 	FeatureDetails1 varchar(255),
// 	FeatureDetails2 varchar(255),
// 	FeatureImg1 varchar(50),
// 	FeatureImg2 varchar(50),
// 	PitchStatus varchar(30),
// 	Capacity int,
// 	PitchDescription varchar(255),
// 	LocalAttractionName1 varchar(100),
// 	LocalAttractionName2 varchar(100),
// 	LocalAttractionDetails1 varchar(255),
// 	LocalAttractionDetails2 varchar(255),
// 	LocalAttractionImg1 varchar(255),
// 	LocalAttractionImg2 varchar(255),
// 	LocationMap varchar(255),
// 	Foreign Key(SiteID) References Sites(SiteID),
// 	Foreign Key(PitchTypeID) References PitchTypes(PitchTypeID) 
// )";
// $result=mysqli_query($connectDB, $createtblPitches);

// if ($result) {
// 	echo "Pitches Table Set up Successfully.";
// }
// else {
// 	echo "Error in Pitches Table.";
// }


// #tblSites
// $createtblSites = "Create table Sites
// (
// 	SiteID int NOT NULL Primary Key Auto_Increment,
// 	SiteName varchar(120),
// 	Location varchar(200),
// 	Description varchar(255),
// 	SiteImg1 varchar(255),
// 	SiteImg2 varchar(255),
// 	Reviews varchar(100)
// )";
// $result=mysqli_query($connectDB, $createtblSites);

// if ($result) {
// 	echo "Sites Table Set up Successfully.";
// }
// else {
// 	echo "Error in Sites Table.";
// }


// #tblPitchTypes
// $createtblPitchTypes = "Create table PitchTypes
// (
// 	PitchTypeID int NOT NULL Primary Key Auto_Increment,
// 	PitchTypeName varchar(100),
// 	Description varchar(255),
// 	PitchTypeImg varchar(255)
// )";
// $result=mysqli_query($connectDB, $createtblPitchTypes);

// if ($result) {
// 	echo "PitchTypes Table Set up Successfully.";
// }
// else {
// 	echo "Error in PitchTypes Table.";
// }


// #tblCustomers
// $createtblCustomers = "Create table Customers
// (
// 	CustomerID int NOT NULL Primary Key Auto_Increment,
// 	FirstName varchar(30),
// 	Surname varchar(30),
// 	Username varchar(30),
// 	PhoneNo varchar(30),
// 	EmailAddress varchar(30),
// 	Password varchar(30),
// 	Address varchar(30),
// 	Viewcount int
// )";
// $result=mysqli_query($connectDB, $createtblCustomers);

// if ($result) {
// 	echo "Customers Table Set up Successfully.";
// }
// else {
// 	echo "Error in Customers Table.";
// }


#tblAdmin
$createtblAdmin = "Create table Admins
(
	AdminID int NOT NULL Primary Key Auto_Increment,
	AdminName varchar(30),
	Email varchar(30),
	Password varchar(30),
	PhoneNo varchar(30),
	Address varchar(30)
)";
$result=mysqli_query($connectDB, $createtblAdmin);

if ($result) {
	echo "Admins Table Set up Successfully.";
}
else {
	echo "Error in Admins Table.";
} 
 
?>