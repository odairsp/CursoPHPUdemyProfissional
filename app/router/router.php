<?php
function routes()
{
    return require_once 'routes.php';
}

function exactMatchUriInArrayRoutes(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }
    return [];
}




function regularExpressionMatchArrayRoutes($uri, $routes)
{
    $matchedUri = array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
    return $matchedUri;
}

function params($uri, $matchedUri)
{
    if (!empty($matchedUri)) {

        $matchedToGetParams = array_keys($matchedUri)[0];
        $params = array_diff(
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($matchedToGetParams, '/'))
        );
        return $params;
    }

    return [];
}


function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);

    if (empty($matchedUri)) {
        $matchedUri =  regularExpressionMatchArrayRoutes($uri, $routes);
        $params = params($uri, $matchedUri);
    }
    dd($params);
}