create database if not exists estate_chain;

CREATE TABLE tenants (
    ID INT PRIMARY KEY NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    mobileNo VARCHAR(14),
    leaseInfo INT NOT NULL REFERENCES leases (ID)
);

CREATE TABLE properties (
    ID INT PRIMARY KEY NOT NULL,
    description VARCHAR(120),
    address VARCHAR(120),
    completion_year INT,
    propertyStatus VARCHAR(50),
    manager INT NOT NULL REFERENCES employees (ID)
);

CREATE TABLE leases (
    ID INT PRIMARY KEY NOT NULL,
    startDate DATETIME NOT NULL,
    endDate DATETIME NOT NULL,
    leaseAmount INT UNSIGNED NOT NULL,
    property INT NOT NULL REFERENCES properties (ID),
    tenant INT NOT NULL REFERENCES tenants (ID),
    estate_manager INT NOT NULL REFERENCES employees (ID)
);

-- keeps a record of daily trasactions authorized by estate chain
CREATE TABLE Transactions (
    entryNo INT PRIMARY KEY NOT NULL,
    entryDate DATETIME NOT NULL,
    transactionType SET('', ''),
    AuthorizedBy INT NOT NULL REFERENCES employees (ID)
);

-- a record of property employees working for estate chain
CREATE TABLE employees (
    ID INT PRIMARY KEY NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    employeeRole SET('Maintaince employees', 'manager')
);

-- a record of incoming revenue (only revenue is from lease payments)
CREATE TABLE lease_received (
    ID INT PRIMARY KEY NOT NULL,
    receiptDate DATETIME NOT NULL,
    amountReceived INT UNSIGNED NOT NULL,
    leaseInfo INT NOT NULL REFERENCES leases (ID)
);


CREATE TABLE staff_payments (
    ID INT PRIMARY KEY NOT NULL,
    paymentDate DATETIME NOT NULL,
    amountPaid INT UNSIGNED NOT NULL,
    employee INT NOT NULL REFERENCES employees (ID)
);


CREATE TABLE vendor_payments (
    ID INT PRIMARY KEY NOT NULL,
    paymentDate DATETIME NOT NULL,
    amountPaid INT UNSIGNED NOT NULL,
    paidTo INT NOT NULL REFERENCES vendors (ID)
);


CREATE TABLE vendors (
    ID INT PRIMARY KEY NOT NULL,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    companyName VARCHAR(120),
    mobileNo VARCHAR(14),
    category VARCHAR(20)
);

-- tenants generate a request to have work done
CREATE TABLE work_request (
    orderNO INT PRIMARY KEY NOT NULL,
    tenant INT NOT NULL REFERENCES tenants (ID),
    preferredDate DATETIME,
    priority SET('low', 'medium', 'high'),
    property INT NOT NULL REFERENCES properties (ID),
    workDescription VARCHAR(200)
);

-- a record of all work done including who was involved
CREATE TABLE work_done (
    entryNo INT PRIMARY KEY NOT NULL,
    amountCharged INT UNSIGNED,
    vendor INT NOT NULL REFERENCES vendors (ID),
    orderNo INT NOT NULL REFERENCES work_order (orderNo),
    manager INT NOT NULL REFERENCES employees (ID)
);