USE test;
SELECT * FROM  test.orders;

UPDATE orders SET description="NC" WHERE agent_code = "A002";
DELETE FROM orders  WHERE customer_code="C00022"
 AND description="NC" ;