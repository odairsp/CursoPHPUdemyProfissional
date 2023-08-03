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
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
        return $params;
    }
    return [];
}

function paramsFormat($uri, $params)
{
    $paramsData = [];
    foreach ($params as $key => $param) {
        $paramsData[$uri[$key - 1]] = $param;
    }
    return $paramsData;
}


function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routes();
    $matchedUri = exactMatchUriInArrayRoutes($uri, $routes);
    $params = [];
    
    if (empty($matchedUri)) {
        $matchedUri =  regularExpressionMatchArrayRoutes($uri, $routes);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
    }

    if (!empty($matchedUri)) {
        return loadController($matchedUri, $params);
    }

    throw new Exception("Algo deu errado!");
}