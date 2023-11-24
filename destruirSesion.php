<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

session_destroy();

/* if (session_destroy()) {
    echo "sesion cerrada con exito";
}else {
    echo "no se ha cerrado correctamente";
} */

header('location:index.html');