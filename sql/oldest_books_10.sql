CREATE VIEW `view1` AS
	SELECT written_by.ISBN, Book.title, author.AFirst, author.ALast
	FROM written_by LEFT JOIN Book
	ON Book.ISBN=written_by.ISBN
	LEFT JOIN author ON author.authID=written_by.authID
	ORDER BY pubYear ASC
    LIMIT 10
