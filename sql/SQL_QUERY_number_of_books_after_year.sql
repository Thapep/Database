/*
 * This is an example of what a .php file does. It takes a year as input
 * and counts the books published every year after that.
 */
SELECT pubYear, COUNT(pubName) FROM Book
GROUP BY pubYear
HAVING pubYear > 1900