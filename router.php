<?php 

$url = parse_url($_SERVER['REQUEST_URI'])['path'];



$routes = [
    '/' => 'controllers/index.php',
    '/contact' => 'controllers/contact.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/notes/create' => 'controllers/note-create.php',
    '/about' => 'controllers/about.php',
];

routeToControllers($url, $routes);