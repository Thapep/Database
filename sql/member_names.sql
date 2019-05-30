CREATE VIEW `member_names` AS
	SELECT memberID, MFirst, MLast
    FROM member
    ORDER BY memberID ASC;
