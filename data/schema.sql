DROP TABLE IF EXISTS reservation_seats;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS room_rows_seats;
DROP TABLE IF EXISTS room_rows;
DROP TABLE IF EXISTS room;
DROP TABLE IF EXISTS event;

CREATE TABLE event (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    start_time DATETIME
);

CREATE TABLE room (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
) ENGINE=INNODB;

CREATE TABLE room_rows (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    room_id INT(11),
    FOREIGN KEY (room_id) REFERENCES room (id)
) ENGINE=INNODB;

CREATE TABLE room_rows_seats (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    row_id INT(11),
    seat_number VARCHAR(10),
    category VARCHAR(10),
    price DECIMAL(10,2),
    FOREIGN KEY (row_id) REFERENCES room_rows (id)
) ENGINE=INNODB;

CREATE TABLE reservation (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    event_id INT(11),
    buyer VARCHAR(255),
    payment_received TINYINT(1),
    FOREIGN KEY (event_id) REFERENCES event (id)
) ENGINE=INNODB;

CREATE TABLE reservation_seats (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT(11),
    seat_id INT(11),
    FOREIGN KEY (reservation_id) REFERENCES reservation (id),
    FOREIGN KEY (seat_id) REFERENCES room_rows_seats (id)
) ENGINE=INNODB;
