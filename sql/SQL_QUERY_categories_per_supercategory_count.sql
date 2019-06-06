SELECT supercategoryName as 'Name', COUNT(supercategoryName) as 'Quantity'
FROM category
WHERE supercategoryName IS NOT NULL
GROUP BY supercategoryName
