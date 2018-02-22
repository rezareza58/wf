
ALTER TABLE person_address 
ADD CONSTRAINT relation 
FOREIGN KEY (personid)
REFERENCES person(id);

ALTER TABLE person_address 
ADD CONSTRAINT relation2 
FOREIGN KEY (Addressid)
REFERENCES address(id);

ALTER TABLE person_address 
ADD CONSTRAINT relation3 
FOREIGN KEY (Address_typeid)
REFERENCES address_type(id);

ALTER TABLE address
ADD CONSTRAINT relation4
FOREIGN KEY (id)
REFERENCES town(id);

ALTER TABLE town
ADD CONSTRAINT relation5
FOREIGN KEY (id)
REFERENCES country(id);
