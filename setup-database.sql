CREATE TABLE items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(100) NOT NULL,
  added_by VARCHAR(50) NOT NULL,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE laundry_bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booked_by VARCHAR(50) NOT NULL,
  booking_date DATE NOT NULL
);


INSERT INTO items (item_name, added_by) VALUES ('Milk', 'User1');
INSERT INTO items (item_name, added_by) VALUES ('Bread', 'User2');

INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Blake', '20-10-2024');
