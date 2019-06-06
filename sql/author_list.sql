CREATE VIEW author_list AS
	SELECT author.AFirst as 'First Name', author.ALast as 'Last Name'
	FROM author