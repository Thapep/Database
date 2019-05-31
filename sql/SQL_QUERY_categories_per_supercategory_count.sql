SELECT supercategoryName, COUNT(supercategoryName)
FROM category
WHERE supercategoryName IS NOT NULL
GROUP BY supercategoryName
