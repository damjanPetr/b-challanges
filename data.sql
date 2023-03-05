INSERT INTO movies(
        movie_name,
        production_name,
        origin_country,
        premiere,
        genre
    )
VALUES --
    (
        "The Shawshank Redemption",
        "Castle Rock Entertainment",
        "United States",
        "1994-10-25",
        "Drama"
    ),
    (
        "The Godfather",
        "Paramount Pictures",
        "United States",
        "1972-04-24",
        "Crime"
    ),
    (
        "The Dark Knight",
        "Warner Bros.",
        "United States",
        "2008-06-18",
        "Action"
    ),
    (
        "The Godfather Part II",
        "Paramount Pictures",
        "United States",
        "1974-12-18",
        "Crime"
    ),
    (
        "12 Angry Men",
        "Orion-Nova Productions",
        "United States",
        "1957-04-10",
        "Drama"
    ),
    (
        "Schindler's List",
        "Universal Pictures",
        "United States",
        "1994-02-04",
        "Drama"
    ),
    (
        "The Lord of the Rings: The Return of the King",
        "New Line Cinema",
        "United States",
        "2003-12-17",
        "Action"
    ),
    (
        "Pulp Fiction",
        "Miramax",
        "United States",
        "1994-10-14",
        "Drama"
    ),
    (
        "The Lord of the Rings: The Fellowship of the Ring",
        "New Line Cinema",
        "United States",
        "2001-12-19",
        "Adventure"
    ),
    (
        "The Good, the Bad and the Ugly",
        "Constantin Film",
        "United States",
        "1967-12-29",
        "Western"
    ),
    (
        "Forrest Gump",
        "Paramount Pictures",
        "United States",
        "1994-07-6",
        "Romance"
    ),
    (
        "Fight Club",
        "Fox 2000 Pictures",
        "United States",
        "1999-10-15",
        "Drama"
    ),
    (
        "The Lord of the Rings: The Two Towers",
        "New Line Cinema",
        "United States",
        "2002-12-18",
        "Action"
    ),
    (
        "Inception",
        "Warner Bros",
        "United States",
        "2010-07-16",
        "Sci-Fi"
    ),
    (
        "Star Wars: Episode V - The Empire Strikes Back",
        "Lucasfilm",
        "United States",
        "1980-06-20",
        "Fantasy"
    ),
    (
        "The Matrix",
        "Warner Bros.",
        "United States",
        "1999-03-31",
        "Action"
    ),
    (
        "Goodfellas",
        "Warner Bros.",
        "United States",
        "1990-09-21",
        "Biography"
    ),
    --
    (
        "Breaking Bad",
        "High Bridge Productions",
        "United States",
        "2008-01-20",
        "Crime"
    ),
    (
        "Chernobyl",
        "Home Box Office (HBO)",
        "United States",
        "2008-01-20",
        "History"
    ),
    (
        "The Wire",
        "Blown Deadline Productions",
        "United States",
        "2002-06-02",
        "Thriller"
    ),
    (
        "The Sopranos",
        "Warner Bros.",
        "United States",
        "1999-01-10",
        "Crime"
    ),
    (
        "Game of Thrones",
        "Home Box Office",
        "United States",
        "2011-04-17",
        "Fantasy"
    );
INSERT INTO actors (
        firstname,
        lastname,
        nickname,
        birth_date,
        agent_code,
        movie_id
    )
VALUES ("Tim", "Robinson", "", "1958-10-16", "5453", "1"),
    (
        "Al",
        "Pacino",
        "Sonny",
        "1940-04-25",
        "1332",
        "2"
    ),
    (
        "Robert",
        "De Niro",
        "",
        "1943-08-17",
        "1999",
        "3"
    ),
    (
        "Liam",
        "Neeson",
        "",
        "1952-06-07",
        "1146512",
        "4"
    ),
    (
        "Elijah",
        "Wood",
        "",
        "1981-01-28",
        "7334561",
        "5"
    ),
    (
        "John",
        "Travolta",
        "",
        "1954-02-18",
        "1324548",
        "6"
    ),
    (
        "Orlando",
        "Bloom",
        "",
        "1977-01-13",
        "0024558",
        "7"
    ),
    (
        "Clint",
        "Eastwood",
        "",
        "1930-05-31",
        "94922",
        "8"
    ),
    ("Tom", "Hanks", "", "1956-07-09", "1684", "9"),
    ("Brad", "Pitt", "", "1963-12-18", "789541", "10"),
    (
        "Viggo",
        "Mortensen",
        "",
        "1958-10-20",
        "1238884",
        "11"
    ),
    (
        "Marion",
        "Cotillard",
        "",
        "1975-09-30",
        "789455",
        "12"
    ),
    (
        "Mark",
        "Hammil",
        "",
        "1951-09-25",
        "845512",
        "13"
    ),
    (
        "Keanu",
        "Reeves",
        "",
        "1964-09-02",
        "789523",
        "14"
    ),
    (
        "Ray",
        "Liotta",
        "",
        "1954-12-18",
        "7778566",
        "15"
    ),
    -- 
    (
        "Bryan",
        "Cranston",
        "",
        "1956-04-07",
        "2154897",
        "16"
    ),
    (
        "Jessie",
        "Buckley",
        "",
        "1989-12-28",
        "789951",
        "17"
    ),
    (
        "Dominic",
        "West",
        "",
        "1969-10-15",
        "87422",
        "18"
    ),
    (
        "James",
        "Gandolfini",
        "",
        "1961-10-18",
        "77789",
        "19"
    ),
    (
        "Emilia",
        "Clarke",
        "",
        "1986-10-23",
        "778556",
        "20"
    );
INSERT INTO critics(firstname, lastname, username, user_password)
VALUES ("Roger", "Abert", "reb13", "15678"),
    ("Alen", "Westwood", "reb13", "alina12"),
    ("Robert", "Smith", "reb13", "robby1"),
    ("John", "Doe", "reb13", "Hiliam%#@15c"),
    ("Samantha", "Anderson", "sam55", "5uhuhuhXD518");
INSERT INTO actors_critique (
        movie_id,
        actor_id,
        devotion_grade,
        naturalness_grade,
        expression_grade,
        acting_grade
    )
VALUES ("1", "3", "4", "5", "2", "10"),
    ("2", "3", "8", "5", "8", "2"),
    ("3", "2", "1", "1", "10", "5"),
    ("4", "3", "9", "2", "10", "5"),
    ("5", "3", "7", "3", "5", "2"),
    ("6", "6", "3", "5", "10", "1"),
    ("7", "2", "1", "10", "8", "3"),
    ("8", "9", "7", "5", "9", "5");
INSERT INTO actor_salary(movie_id, actor_id, salary)
VALUES ("1", "3", 66000.00),
    ("1", "3", 132000.00),
    ("1", "3", 362000.00),
    ("1", "3", 232000.00),
    ("1", "3", 912000.00);
INSERT INTO tv_series (
        movie_id,
        first_air_tvchannel,
        episode_number,
        expected_season_number
    )
VALUES ("18", "1", "62", "50"),
    ("19", "1", "5", "10"),
    ("20", "1", "60", "80"),
    ("21", "1", "86", "120"),
    ("22", "1", "73", "95");
INSERT INTO films (
        movie_id,
        first_premiere_week_profit,
        director_salary,
        premiere_city,
        premiere_format
    )
VALUES ("2", "302393", "100", "New York", "2D"),
    ("9", "47211490", "32131", "London", "2D"),
    (
        "3",
        "158411483",
        "42131",
        "New York",
        "2D"
    ),
    (
        "8",
        "9311882",
        "655142",
        "New York",
        "2D"
    ),
    (
        "16",
        "27788331",
        "3825329",
        "San Francisco",
        "2D"
    );
INSERT INTO oscar_winners (
        film_id,
        actor_id,
        movie_role,
        oscar_win_year
    )
VALUES (
        "2",
        "2",
        "Best Actor in a Supporting Role",
        "1973"
    ),
    ("9", "9", "Best Actor in a Leading Role", "1995"),
    ("4", "4", "Best Actor in a Leading Role", "1994"),
    ("14", "14", "Best Actor ", "1999"),
    (
        "16",
        "16",
        "Outstanding Lead Actor in a Drama Series",
        "2014"
    );
INSERT into sequel (movie_id, sequel_id)
VALUES ("9", "7"),
    ("9", "13");
INSERT INTO directors (
        firstname,
        lastname,
        director_genre,
        expertise
    )
VALUES ("Quentin", "Tarantino", "Action", "10"),
    ("Peter", "Jackson", "Action", "9"),
    ("Francis", "Ford Coppola", "Crime", "10"),
    ("Christopher", "Nolan", "Thriller", "7"),
    ("Robern", "Zemeckis", "Drama", "6");
-- INSERT INTO movie_director
-- VALUES ("1", "8"),
--     ("2", "13"),
--     ("3", "2"),
--     ("4", "14"),
--     ("5", "11");
INSERT INTO movie_critique (critic_id, movie_id, rating)
VALUES ("1", "2", "3"),
    ("2", "1", "3"),
    ("3", "2", "3"),
    ("4", "9", "3"),
    ("5", "9", "3");