INSERT INTO customers (id, firstName, lastName, phone) VALUES
  (1, 'John', 'Smith', '5558679305'),
  (2, 'Jane', 'Doe',   '5556667777'),
  (3, 'Billy', 'Kid',  '5554443333');

INSERT INTO addresses (id, customerId, address) VALUES
  (1, 1, 'Somewhere over the rainbow.'),
  (2, 1, 'Happy Road.'),
  (3, 2, 'Sadness Avenue.');
