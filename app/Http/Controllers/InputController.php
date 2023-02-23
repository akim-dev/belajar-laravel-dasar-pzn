<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return 'Hello ' . $name;
    }

    public function helloFirstName(Request $request): string
    {
        $firstName = $request->input('first.name');
        return "hello " . $firstName;
    }

    public function testInput()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Eko',
                'last' => 'Khannedy'
            ]
        ])->assertSeeText('Hello Eko');
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }


    // mengambil semua data di dalam array
    public function helloArray(Request $request): string
    {
        $names = $request->input('products.*.name');
        return json_encode($names);
    }

    // dengan carbon
    public function inputType(Request $request): string
    {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birth_date = $request->date('birth_date', 'Y-m-d');
        return json_encode([
            'name' => $name,
            'married' => $married,
            'birth_date' => $birth_date->format('Y-m-d')
        ]);
    }


    //methode filter only dan except
    public function filterOnly(Request $request): string
    {
        $name = $request->only('name.first', 'name.last');
        return json_encode($name);
    }
    public function filterExcept(Request $request): string
    {
        $user = $request->except('admin');
        return json_encode($user);
    }
}
