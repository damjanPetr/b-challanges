select m.movie_name, m.premiere,m.genre,m.origin_country, m.production_name,count(*)
from movies as m
join actors as a
on m.id = a.id
group by m.id;

select a.firstname,a.lastname,a.nickname,birth_date,agent_code,count(*)
from actors as a
join movies as m
on a.id=m.id
group by a.id;

select f.premiere_city,f.first_premiere_week_profit,f.premiere_format
from films as f
join movies as m
on f.id=m.id
order by premiere_format,first_premiere_week_profit DESC;


select m.movie_name, ow.movie_role,a.firstname,a.lastname,a.nickname,a.birth_date,a.agent_code
from oscar_winners as ow
join movies as m
	on ow.film_id = m.id
join actors as a
	on ow.actor_id = a.id
order by ow.oscar_win_year DESC;


select f.first_premiere_week_profit, f.director_salary, f.premiere_city, f.premiere_format,a.firstname,a.lastname, d.firstname , d.lastname 
from films as f
join movies as m
	on f.movie_id = m.id
join directors as d
	on f.movie_id = d.id
join actors as a
	on f.movie_id = a.id
order by d.firstname DESC;


-- select a.firstname,a.lastname,a.nickname,a.birth_date,a.agent_code
select a.firstname,avg(ac.acting_grade) as 'avg grade'
from actors as a
join actors_critique as ac
    on a.id= ac.actor_id
join movies as m
    on ac.movie_id = m.id
join movie_critique as mc
    on m.id = mc.movie_id
join critics as c
    on mc.critic_id = c.id
group by a.id
    having AVG(ac.acting_grade) > (select avg(acting_grade) from actors_critique)
order by 'avg grade';
-- having avg(ac.acting_grade) in (select Avg(ac.acting_grade)
--  from actors as a 
--    join actors_critique as ac
--  on a.id = ac.actor_id
--  group by a.id)

