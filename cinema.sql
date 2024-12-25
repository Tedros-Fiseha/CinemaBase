-- Table for basic cinema details
CREATE TABLE cinemas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cinema_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cinema_phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    website VARCHAR(255) NOT NULL,
    cinema_logo VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cinema_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cinema_id INT NOT NULL,
    op_hours VARCHAR(255),
    screen_rooms INT,
    seating_capacity INT,
    languages VARCHAR(255),
    facilities VARCHAR(255),
    tin_number INT(20),
    business_license VARCHAR(100),
    payment_methods VARCHAR(255), -- Example payment methods
    FOREIGN KEY (cinema_id) REFERENCES cinemas(id) ON DELETE CASCADE
);

-- Table for admin details
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cinema_id INT NOT NULL,
    admin_name VARCHAR(255) NOT NULL,
    admin_contact VARCHAR(255) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    admin_id_card VARCHAR(255) NOT NULL,
    admin_employment_document VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cinema_id) REFERENCES cinemas(id) ON DELETE CASCADE
);

-- Table for operating hours
CREATE TABLE operating_hours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cinema_id INT NOT NULL,
    day ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cinema_id) REFERENCES cinemas(id) ON DELETE CASCADE
);

-- Create cinema_movies table
CREATE TABLE cinema_movies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cinema_id INT NOT NULL, -- Links movies to cinemas
    admin_id INT NOT NULL,  -- Links movies to admins
    title VARCHAR(255) NOT NULL,
    poster VARCHAR(255) NOT NULL,
    overview TEXT NOT NULL,
    release_date DATE NOT NULL,
    runtime INT NOT NULL,
    genre VARCHAR(255) NOT NULL,
    rating FLOAT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cinema_id) REFERENCES cinemas(id) ON DELETE CASCADE,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE
);


-- Create movie_cast table
CREATE TABLE movie_cast (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id INT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    character_name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    FOREIGN KEY (movie_id) REFERENCES cinema_movies(id) ON DELETE CASCADE
);

-- Create cinema_show_times table
CREATE TABLE cinema_show_times (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id INT UNSIGNED NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES cinema_movies(id) ON DELETE CASCADE
);

CREATE TABLE app_user (
    user_id INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL UNIQUE,    
    phone_no VARCHAR(15),                    
    user_password VARCHAR(255) NOT NULL,    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

