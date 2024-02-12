<?php

/* MODELS */
require "models/Category.php";
require "models/User.php";
require "models/Image.php";
require "models/Product.php";
require "models/Order.php";

/* MANAGERS */
require "managers/AbstractManager.php";
require "managers/CategoryManager.php";
require "managers/OrderManager.php";
require "managers/ProductManager.php";
require "managers/UserManager.php";

/* CONTROLLERS */
require "controllers/AbstractController.php";
require "controllers/AuthController.php";
require "controllers/PageController.php";
require "controllers/OrderController.php";

/* SERVICES */
require "services/CSRFTokenManager.php";
require "services/Router.php";
