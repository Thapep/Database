/*
 * Returns all the currently borrowed books by ISBN and title as well as
 * the memberID and full name of the member in possesion of the book.
 */
SELECT borrows_member_copies.ISBN, Book.title, borrows_member_copies.memberID, borrows_member_copies.MFirst, borrows_member_copies.MLast FROM (
	SELECT borrows_member.ISBN, borrows_member.memberID, borrows_member.MFirst, borrows_member.MLast FROM (
		SELECT ISBN,member.memberID, member.MFirst, member.MLast, copyNr FROM borrows JOIN member 
		ON borrows.memberID = member.memberID
		) as borrows_member
	JOIN copies ON borrows_member.ISBN = copies.ISBN and borrows_member.copyNr = copies.copyNr
    ) as borrows_member_copies
JOIN Book ON borrows_member_copies.ISBN = Book.ISBN