<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $members = [
            [
                'name' => 'Angelina Joyvina Christy Setyawan',
                'student_id' => '2702363733',
                'class' => 'PPTI 18',
                'img' => '/img/nana/1.jpg',
                'alt' => 'Angelina Joyvina',
            ],
            [
                'name' => 'Arya Maulana Shodiqi',
                'student_id' => '2702363746',
                'class' => 'PPTI 18',
                'img' => '/img/arya/1.jpg',
                'alt' => 'Arya Maulana',
            ],
            [
                'name' => 'Fransiska Fu',
                'student_id' => '2702363891',
                'class' => 'PPTI 18',
                'img' => '/img/siska/1.jpg',
                'alt' => 'Fransiska Fu',
            ],
            [
                'name' => 'Michael Kurniawan',
                'student_id' => '2702363992',
                'class' => 'PPTI 18',
                'img' => '/img/mikel/1.jpg',
                'alt' => 'Michael Kurniawan',
            ],
            [
                'name' => 'Yosua Sugihartono',
                'student_id' => '2702364276',
                'class' => 'PPTI 18',
                'img' => '/img/yos/1.jpg',
                'alt' => 'Yosua Sugihartono',
            ]
        ];

        return view('team', compact('members'));
    }
}
