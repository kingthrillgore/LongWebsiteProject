SELECT fe.feature
FROM features fe
INNER JOIN features_vehicles fev ON fev.feature_id = fe.id
INNER JOIN vehicles ve ON ve.id = fev.vehicle_id
WHERE ve.id = 2