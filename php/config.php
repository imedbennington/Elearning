<?php
class Config {
    public static $smtpHost = 'smtp.gmail.com';
    public static $smtpPort = 587;
    public static $smtpUsername = 'bouzidy.imed@gmail.com';
    public static $smtpPassword;

    // Initialize properties using a static method
    public static function initialize() {
        self::$smtpPassword = getenv('SMTP_PASSWORD');
    }
}

// Initialize the configuration
Config::initialize();
?>
