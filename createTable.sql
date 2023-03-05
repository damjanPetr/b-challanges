CREATE TABLE movies (
    id INT AUTO_INCREMENT,
    production_name VARCHAR(255),
    origin_country VARCHAR(255),
    premiere DATE,
    genre VARCHAR(255),
    movie_name VARCHAR(255),
    PRIMARY KEY(id)
);
CREATE TABLE actors (
    id INT AUTO_INCREMENT,
    movie_id INT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    nickname VARCHAR(255),
    agent_code VARCHAR(255),
    birth_date DATE,
    PRIMARY KEY (id),
    FOREIGN key (movie_id) REFERENCES movies (id)
);
CREATE TABLE critics(
    id INT AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    username VARCHAR(255),
    user_password VARCHAR(255),
    PRIMARY KEY (id)
);
CREATE TABLE actors_critique (
    movie_id INT,
    actor_id INT,
    devotion_grade VARCHAR(255),
    naturalness_grade VARCHAR(255),
    expression_grade VARCHAR(255),
    acting_grade VARCHAR(255),
    FOREIGN KEY (actor_id) REFERENCES actors(id),
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);
CREATE TABLE actor_salary (
    movie_id INT,
    actor_id INT,
    salary DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (actor_id) REFERENCES actors(id),
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);
CREATE TABLE tv_series (
    id INT AUTO_INCREMENT,
    movie_id INT,
    first_air_tvchannel VARCHAR(255),
    episode_number INT,
    expected_season_number INT,
    PRIMARY KEY (id),
    FOREIGN key (movie_id) REFERENCES movies(id)
);
CREATE TABLE films (
    movie_id INT,
    id INT AUTO_INCREMENT,
    first_premiere_week_profit DECIMAL(20, 2),
    director_salary DECIMAL(10, 2),
    premiere_city VARCHAR(255),
    premiere_format VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN key (movie_id) REFERENCES movies(id)
);
CREATE TABLE oscar_winners (
    film_id INT,
    actor_id INT,
    movie_role VARCHAR(255),
    oscar_win_year INT,
    FOREIGN key (film_id) REFERENCES movies(id),
    FOREIGN key (actor_id) REFERENCES actors(id)
);
CREATE TABLE sequel (
    movie_id INT,
    sequel_id INT,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (sequel_id) REFERENCES movies(id)
);
CREATE TABLE directors (
    id INT AUTO_INCREMENT,
    movie_id INT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    director_genre VARCHAR(255),
    expertise VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN key (movie_id) REFERENCES films(movie_id)
);
CREATE TABLE movie_director(
    movie_id INT,
    director_id INT,
    FOREIGN key (movie_id) REFERENCES movies(id),
    FOREIGN key (director_id) REFERENCES directors(id)
);
CREATE TABLE movie_critique(
    critic_id INT,
    movie_id INT,
    rating VARCHAR(255),
    FOREIGN key (movie_id) REFERENCES movies(id),
    FOREIGN key (critic_id) REFERENCES critics(id)
);