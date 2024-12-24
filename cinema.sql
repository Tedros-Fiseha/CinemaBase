-- Table for basic cinema details
CREATE TABLE cinemas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cinema_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    cinema_phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    website VARCHAR(255) NOT NULL,
    cinema_logo VARCHAR(255) NOT NULL,
    op_hours INT,
    screen_rooms INT,
    seating_capacity INT,
    tin_number VARCHAR(20) NOT NULL,
    business_license VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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

