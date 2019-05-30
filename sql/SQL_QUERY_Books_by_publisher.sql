SELECT pubName as Publisher, COUNT(*) as 'Available Books' FROM Book
GROUP BY pubName;