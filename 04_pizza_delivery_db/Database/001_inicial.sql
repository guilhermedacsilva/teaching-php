CREATE TABLE orders (
    id INT NOT NULL AUTO_INCREMENT ,
    client VARCHAR(255) NOT NULL ,
    pizza_flavor VARCHAR(255) NOT NULL ,
    pizza_size VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;
