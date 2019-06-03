INSERT INTO publisher(pubName, estYear, pubAddress)
	VALUES ('Tziolas', 1976, 'Theotoki 7');

DELETE FROM publisher
WHERE pubName = 'Kedros';

#delete all publishers without a book in the library
DELETE FROM publisher
WHERE pubName NOT IN (SELECT pubName FROM Book);	

UPDATE publisher
SET pubAddress = 'Paradeisou 25'
WHERE pubName = 'Patakis';					
    
INSERT INTO Book(ISBN, title, pubYear, numpages, pubName)
	VALUES (2435, 'Mathimatika I', 1997, 978, 'Tziolas');
 
DELETE FROM Book
WHERE ISBN = 2359;

UPDATE Book
SET numpages = 273
WHERE ISBN = 820;
 
INSERT INTO member(memberID, MFirst, MLast, Street, st_number, postalCode)    
	VALUES (359, 'Periklis', 'Chinas', 'Papagou', 32, 16337);
    
DELETE FROM member
WHERE memberID = 453;    

UPDATE member
SET Street = 'Papagou', st_number = 14
WHERE memberID = 251;
    
INSERT INTO author(authID, AFirst, ALast, Abirthdate)
	VALUES (145, 'Leo', 'Tolstoy', '1828-09-09');
    
DELETE FROM author
WHERE authID = 512;

#delete all authors without a book in the library
DELETE FROM author
WHERE authID NOT IN (SELECT authID FROM written_by);

UPDATE author
SET Abirthdate = '1949-02-01'
WHERE authID = 141;
    
INSERT INTO category(categoryName, supercategoryName)
	VALUES ('mathematics', 'science');

DELETE FROM category
WHERE categoryName = 'biology';

#delete all categories that no book belongs to them
DELETE FROM category
WHERE categoryName NOT IN (SELECT categoryName FROM belongs_to);
 
UPDATE category
SET supercategoryName = 'science'
WHERE categoryName = 'astronomy';
  
INSERT INTO copies(ISBN, copyNr, shelf)
	VALUES (2435, 5, 'A12');

DELETE FROM copies
WHERE ISBN = 1224;

UPDATE copies 
SET shelf = 'B2'
WHERE ISBN = 1412;
   
INSERT INTO employee(empID, EFirst, ELast, salary)
	VALUES (42, 'Xaralampos', 'Minos', 850);

DELETE FROM employee
WHERE empID = 23;

UPDATE employee 
SET salary = 1000
WHERE empID = 14;
    
INSERT INTO permanent_employee(empID_sub, HiringDate)
	VALUES (42, '2014-11-12');
    
INSERT INTO temporary_employee(empID_sub, ContactNr)
	VALUES (64, 6984232854);
    
UPDATE temporary_employee
SET ContactNr = 6942512319
WHERE empID_sub = 23;    
    
INSERT INTO written_by(ISBN, authID)
	VALUES (2435, 145);
            
INSERT INTO belongs_to(ISBN, categoryName)
	VALUES (2435, 'mathematics');
    
UPDATE belongs_to
SET categoryName = 'chemistry'
WHERE ISBN = 1245;    
    
INSERT INTO borrows(memberID, ISBN, copyNr, date_of_borrowing, date_of_return)
	VALUES (359, 2435, 3, '2019-05-10', '2019-06-10');

DELETE FROM borrows
WHERE memberID = 321 AND ISBN = 5145;
    
INSERT INTO has_copies(ISBN, copyNr)
	VALUES (4363, 25);
    
INSERT INTO reminder(empID, memberID, ISBN, copyNr, date_of_borrowing, date_of_reminder)
	VALUES (42, 235, 4363, 25, '2019-03-11', '2019-04-06');
    
DELETE FROM reminder
WHERE empID = 25 AND memberID = 3264 AND ISBN = 2538;    
    
    
    
    
    
    