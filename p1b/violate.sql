UPDATE Movie set id = NULL where id = 100;
/*ERROR 1048 (23000): Column 'id' cannot be NULL*/

UPDATE Movie set id = 1 where id = 100;
/*ERROR 1451 (23000): Cannot delete or update a parent row: a foreign key constain fails*/

INSERT INTO Actor VALUES(1, NULL, NULL, 'Male', NULL, NULL);
/* ERROR 1048 (23000): Column 'last' cannot be null*/

INSERT INTO Actor VALUES(1, NULL, 'b', 'Male', NULL, NULL);
/* ERROR 1048 (23000): Column 'first' cannot be null*/

INSERT INTO Actor VALUES(1, 'a', 'b', 'Male', NULL, NULL);
/* ERROR 1048 (23000): Column 'dob' cannot be null*/