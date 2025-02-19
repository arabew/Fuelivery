<?php
// Supabase PostgreSQL Connection
$host = "db.bshabouwkhvwxbqnsdwk.supabase.co";
$dbname = "postgres";
$user = "postgres";
$password = "Fuelivery2025-";
$port = "5432";

// Establish connection
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
