<?php
header('Content-Type: application/json');
echo json_encode(['validCount' => rand(0, 10)]);