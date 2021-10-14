<?php

use classes\CustomerDelete;

$customerDelete = new CustomerDelete();
$customerDelete->deleteByID(filter_input(INPUT_GET, "cliente", FILTER_VALIDATE_INT));

header("Location: " . BASE_URL . "/home");
exit;