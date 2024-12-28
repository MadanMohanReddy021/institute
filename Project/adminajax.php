<?php
session_start();
if (isset($_SESSION["admin"]) )
{
    echo"1";
}
else
{
    echo "LOGIN TO CONTINUE IN ADMIN SECTION";
}

 