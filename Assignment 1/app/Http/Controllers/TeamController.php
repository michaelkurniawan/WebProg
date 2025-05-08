<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{

    private $members = [
        [
            'name' => 'Angelina Joyvina C S',
            'student_id' => '2702363733',
            'class' => 'PPTI 18',
            'gallery' => [
                '/image/nana/1.jpg',
                '/image/nana/2.jpg',
                '/image/nana/3.jpg',
                '/image/nana/4.jpeg',
                '/image/nana/5.jpg',
            ],
            'alt' => 'angelina-joyvina',
            'description' => "Baik, tidak sombong, suka menabung, suka makan, suka tidur"
        ],
        [
            'name' => 'Arya Maulana S',
            'student_id' => '2702363746',
            'class' => 'PPTI 18',
            'gallery' => [
                '/image/arya/1.jpg',
                '/image/arya/2.jpg',
                '/image/arya/3.jpg',
                '/image/arya/4.jpg',
                '/image/arya/5.jpg',
            ],
            'alt' => 'arya-maulana',
            'description' => "Orang yang suka & bangga sama timnas Indonesia"
        ],
        [
            'name' => 'Fransiska Fu',
            'student_id' => '2702363891',
            'class' => 'PPTI 18',
            'gallery' => [
                '/image/siska/1.jpg',
                '/image/siska/2.jpg',
                '/image/siska/3.jpg',
                '/image/siska/4.jpg',
                '/image/siska/5.jpg',
            ],
            'alt' => 'fransiska-fu',
            'description' => "Anggota perempuan PPTI 18 yang baik hati, ramah, dan suka menabung :D"
        ],
        [
            'name' => 'Michael Kurniawan',
            'student_id' => '2702363992',
            'class' => 'PPTI 18',
            'gallery' => [
                '/image/mikel/1.jpg',
                '/image/mikel/2.jpeg',
                '/image/mikel/3.jpg',
                '/image/mikel/4.jpg',
                '/image/mikel/5.jpg',
            ],
            'alt' => 'michael-kurniawan',
            'description' => "I'm a Computer Science student at BINUS University and scholarship awardee of the PPTI BCA program — a prestigious CSR initiative by Bank Central Asia focused on developing future IT leaders."
        ],
        [
            'name' => 'Yosua Sugihartono',
            'student_id' => '2702364276',
            'class' => 'PPTI 18',
            'gallery' => [
                '/image/yos/1.jpg',
                '/image/yos/2.jpg',
                '/image/yos/3.jpg',
                '/image/yos/4.jpg',
                '/image/yos/5.jpg',
            ],
            'alt' => 'yosua-sugihartono',
            'description' => "Yosua = Manusia paling baik sedunia"
        ]
    ];

    public function index(){
        return view('team', ['members' => $this->members]);
    }

    public function show($alt){
        $member = collect($this->members)->firstWhere('alt', $alt);
        if(!$member) {
            abort(404);
        }

        return view('teamDetail', ['member' => $member]);
    }
}
