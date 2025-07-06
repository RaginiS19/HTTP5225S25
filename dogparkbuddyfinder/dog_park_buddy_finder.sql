
CREATE TABLE parks (
    id INT PRIMARY KEY,
    park_name VARCHAR(100),
    location VARCHAR(100),
    off_leash_area BOOLEAN
);

INSERT INTO parks (id, park_name, location, off_leash_area) VALUES
(1, 'Riverdale Park', 'Toronto East', 1),
(2, 'Trinity Bellwoods', 'Downtown Toronto', 1),
(3, 'High Park', 'Toronto West', 1),
(4, 'Cherry Beach Park', 'Toronto Waterfront', 1),
(5, 'Sunnybrook Park', 'North York', 0),
(6, 'Stanley Park', 'Etobicoke', 0),
(7, 'Cedarvale Park', 'Midtown Toronto', 1),
(8, 'Dufferin Grove Park', 'Bloorcourt', 0);


CREATE TABLE dog_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dog_name VARCHAR(100),
    breed VARCHAR(100),
    age INT,
    owner_name VARCHAR(100),
    photo_url VARCHAR(255),
    vaccinated BOOLEAN,
    park_id INT,
    FOREIGN KEY (park_id) REFERENCES parks(id)
);

INSERT INTO dog_profiles (dog_name, breed, age, owner_name, photo_url, vaccinated, park_id) VALUES
('Luna', 'Golden Retriever', 3, 'Sarah Jenkins', 'luna.jpg', 1, 1),
('Max', 'French Bulldog', 2, 'Dan Rivera', 'max.jpg', 1, 2),
('Coco', 'Poodle Mix', 4, 'Priya Patel', 'coco.jpg', 0, 3),
('Duke', 'German Shepherd', 5, 'Ahmed Hassan', 'duke.jpg', 1, 4),
('Bella', 'Labrador Retriever', 3, 'Emily Wong', 'bella.jpg', 0, 5),
('Rocky', 'Boxer', 6, 'Jake Thompson', 'rocky.jpg', 1, 6),
('Nala', 'Beagle', 2, 'Mina Aziz', 'nala.jpg', 1, 7),
('Teddy', 'Shih Tzu', 7, 'Leo Martins', 'teddy.jpg', 0, 8);