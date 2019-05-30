/* Creates a trigger that inserts a new copy in the 'copies' everytime a Book is added */
DELIMITER $$
CREATE TRIGGER after_insert_Book 
AFTER INSERT ON Book
FOR EACH ROW
BEGIN
    IF (SELECT copyNr FROM copies WHERE copies.ISBN=NEW.ISBN) = null THEN
		INSERT INTO copies (ISBN, copyNr, shelf)
		VALUES(NEW.ISBN, 1, null);
    ELSE
		INSERT INTO copies (ISBN, copyNr, shelf)
		VALUES(NEW.ISBN, (SELECT copyNr FROM copies WHERE copies.ISBN=NEW.ISBN) + 1, null);
	END IF;
END$$
