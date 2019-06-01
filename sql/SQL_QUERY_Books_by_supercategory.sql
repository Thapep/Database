SELECT supercategoryName as 'Supercategory', COUNT(book_belongs.title) as '# books in supercategory' FROM (
	SELECT title, categoryName FROM Book JOIN belongs_to ON Book.ISBN = belongs_to.ISBN
    ) as book_belongs JOIN category 
    ON book_belongs.categoryName = category.categoryName
GROUP BY supercategoryName
ORDER BY COUNT(book_belongs.title) DESC