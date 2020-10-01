<?php

/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "ricodb");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.dashrico.com.br");
define("CONF_URL_TEST", "https://www.localhost/dash-rico");

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "midone-rico");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Portal Ricopeças");
define("CONF_SITE_LANG", "pt_BR");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp.gmail.com");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "marcusgraciano.ads@gmail.com");
define("CONF_MAIL_PASS", "MV<Graciano0IO8");
define("CONF_MAIL_SENDER", ["name" => "Marcus V. Graciano", "address" => "marcusgraciano.ads@gmail.com"]);
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");


/**
 * REGEX
 */
define("CONF_REGEX_MONEY_VALUE", '/^[0-9]{1,5}[.\,]?[0-9]{2}$/');