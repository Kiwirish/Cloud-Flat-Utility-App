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

CREATE TABLE power_costs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    month VARCHAR(20) NOT NULL,  -- e.g., "October 2024"
    total_cost DECIMAL(10, 2) NOT NULL,  -- Total power cost for the month
    person VARCHAR(50) NOT NULL,  -- Name of the person
    days_present INT NOT NULL,  -- Number of days the person was present
    calculated_cost DECIMAL(10, 2)  -- Calculated cost per person
);


INSERT INTO items (item_name, added_by) VALUES ('Milk', 'Blake');
INSERT INTO items (item_name, added_by) VALUES ('Bread', 'Teeks');
INSERT INTO items (item_name, added_by) VALUES ('200g Steak', 'Quinn');
INSERT INTO items (item_name, added_by) VALUES ('Cheese', 'Simran');
INSERT INTO items (item_name, added_by) VALUES ('Pork Belly', 'Salisbury');



INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Blake', '2024-9-9');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Quinn', '2024-9-10');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Teeks', '2024-9-11');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Salisbury', '2024-9-12');
INSERT INTO laundry_bookings (booked_by, booking_date) VALUES ('Simran', '2024-9-13');



INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) 
VALUES ('August 2024', 378.47, 'Quinn', 31, 159.02);

INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) 
VALUES ('August 2024', 378.47, 'Salisbury', 5, 25.44);

INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) 
VALUES ('August 2024', 378.47, 'Simran', 20, 101.77);

INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) 
VALUES ('August 2024', 378.47, 'Blake', 18, 92.20);

INSERT INTO power_costs (month, total_cost, person, days_present, calculated_cost) 
VALUES ('August 2024', 378.47, 'Teeks', 0, 0.00);
