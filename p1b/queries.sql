/*Give me the names of all the actors in the movie 'Die Another Day'
*/
SELECT CONCAT(first, ' ',last)
FROM Actor as a1, MovieActor as a2, Movie as m3
WHERE a1.id=a2.aid AND a2.mid=m3.id AND m3.title='Die Another Day';

/*the count of all the actors who acted in multiple movies
*/
SELECT count(*) FROM (
	SELECT aid
	FROM MovieActor
	GROUP BY aid
	HAVING count(mid) > 1) AS ret;

/*select the actor whose id is between 20 and 40
*/
SELECT * FROM Actor WHERE id between 20 AND 40;