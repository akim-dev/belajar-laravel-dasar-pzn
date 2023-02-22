<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloController extends Controller
{
    public function hello():string
     {
        return 'Welcome';
    }
    private HelloService $helloService;
    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }
    public function hello1(Request $request, string $name):string
    {
        $request->path();
        $request->url();
        $request->fullUrl();
        $request->method();
        return $this->helloService->hello($name);
    }

    public function request(Request $request)
    {
        return $request->path(). PHP_EOL.
            $request->url(). PHP_EOL.
            $request->fullUrl(). PHP_EOL.
            $request->method().PHP_EOL.
            $request->headers('Accept');
    }
}
