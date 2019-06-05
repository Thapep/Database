DELIMITER $$ 
CREATE TRIGGER test_trigger 
BEFORE INSERT ON borrows
FOR EACH ROW 
BEGIN 
	IF  ((SELECT COUNT(*) FROM borrows WHERE member_memberID = NEW.member_memberID) >= 5) THEN 
		SIGNAL sqlstate '45000';
	END IF;
END $$

