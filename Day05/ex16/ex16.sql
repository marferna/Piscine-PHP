SELECT COUNT(id_film) AS films FROM member_history
	WHERE 
		DATE(`date`) BETWEEN "2006-10-30" AND "2007-07-27"
	OR 
		MONTH(`date`) = '12' AND DAY(`date`) = 24;
