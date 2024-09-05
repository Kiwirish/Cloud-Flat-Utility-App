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


INSERT INTO items (item_name, added_by) VALUES ('Milk', 'Blake');
INSERT INTO items (item_name, added_by) VALUES ('Bread', 'Luke');
INSERT INTO items (item_name, added_by) VALUES ('200g Steak', 'Quinn');


INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Blake', '2024-9-9');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Quinn', '2024-9-10');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Luke', '2024-9-11');
