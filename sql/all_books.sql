CREATE VIEW `all_books` AS
SELECT ISBN, title AS 'Title', 
pubYear as 'Publication Year', 
pubName as 'Publisher'
FROM Book