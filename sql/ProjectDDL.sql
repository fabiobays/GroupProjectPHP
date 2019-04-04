Drop DATABASE IF EXISTS GroupProject 

Create Database GroupProject;

Use GroupProject;

CREATE TABLE User (
UserID INT NOT NULL AUTO_INCREMENT,
Username VarChar(50) NOT NULL,
Password VarChar(255) NOT NULL,
Primary key(UserID)
);

CREATE TABLE Address (
AddressID INT NOT NULL AUTO_INCREMENT,
UserID INT NOT NULL,
City VarChar(50) NULL,
Street VarChar(50) NULL,
State VarChar(50) NULL,
Primary key(AddressID, UserID),
Foreign Key(UserID) References User(UserID)
);

CREATE TABLE Movie (
MovieID INT NOT NULL AUTO_INCREMENT,
MovieName VarChar(100) NOT NULL,
Rating Decimal(1,1) NULL,
Primary key(MovieID)
);

CREATE TABLE Review (
    ReviewID INT NOT NULL AUTO_INCREMENT,
    MovieID INT NOT NULL,
    UserID INT NOT NULL,
    ReviewDesc VarChar(300) NOT NULL,
    Rating Decimal(1,1) NOT NULL,
    Date Date NOT NULL,
    Primary key(ReviewID,MovieID,UserID),
    Foreign key(UserID) References User(UserID),
    Foreign key(MovieID) References Movie(MovieID)
);