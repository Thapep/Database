DELIMITER $$
CREATE TRIGGER after_insert_employee
AFTER INSERT ON employee
FOR EACH ROW
BEGIN
	IF NEW.emp_type = 'perm' THEN
		INSERT INTO permanent_employee (empID, HiringDate)
        VALUES(empID, null);
	ELSE
		INSERT INTO temporary_employee (empID, ContactNr)
        VALUES(empID, null);
	END IF;
END$$
