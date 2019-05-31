/* 
 * Creates a trigger that inserts a new copy in the 'copies' everytime a *new* Book is 
 * added. The copyNr this triggers add is always 1, as it is only called upon inserting 
 * a new book (not a new copy) in the database  
*/
DELIMITER $$
CREATE TRIGGER after_insert_Book 
AFTER INSERT ON Book
FOR EACH ROW
BEGIN
	INSERT INTO copies (ISBN, copyNr)
	VALUES(NEW.ISBN, 1);
END$$
