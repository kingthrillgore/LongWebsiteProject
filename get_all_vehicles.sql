SELECT i.id, 
	i.stock_id,
	i.msrp AS "price",
	i.mileage,
	i.photo_url,
	cl.name AS "color",
	ve.name AS "vehicle_name",
	ve.model_year,
	br.name AS "brand_name",
	co.condition AS "condition"
FROM inventory i
INNER JOIN vehicles ve ON i.vehicle = ve.id
INNER JOIN conditions co ON i.condition = co.id
INNER JOIN brands br ON ve.brand = br.id
INNER JOIN colors cl ON i.color = cl.id;