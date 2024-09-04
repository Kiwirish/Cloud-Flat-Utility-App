CREATE TABLE items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(100) NOT NULL,
  added_by VARCHAR(50) NOT NULL,
  date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO items (item_name, added_by) VALUES ('Milk', 'User1');
INSERT INTO items (item_name, added_by) VALUES ('Bread', 'User2');
