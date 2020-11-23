<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Requests\SocketChartRequest;
use \App\Events\ChartEvent;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function Index()
    {
        $url_data=[
            [
                'title'=>'Rosinfra',
                'url'=>'https://rosinfra.ru/'
            ],
            [
                'title'=>'YouTube',
                'url'=>'https://www.youtube.com'
            ]
        ];
        return view('start',['url_data'=>$url_data]);
    }

    public function getJson()
    {
        return [
            ['title'=>'Google','url'=>'https://www.google.com/'],
            ['title'=>'Yandex','url'=>'https://yandex.ru/']
        ];
    }

    public function chartData(){
        return [
            'labels' => ['март','апрель','май','июнь'],
            'datasets' => [
                [
                    'label'=>'Sales',
                    'backgroundColor'=>'#f26202',
                    'data'=>[15000,5000,10000,30000]
                ],
                [
                    'label'=>'Bay',
                    'backgroundColor'=>'#0cadfd',
                    'data'=>[1500,15000,5000,3500]
                ]
            ]
        ];
    }

    public function lineData()
    {
        return[
            'labels' => ['март','апрель','май','июнь'],
            'datasets' => [
                [
                    'label'=>'Золото',
                    'backgroundColor'=>'#316AB39',
                    'data'=>[rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)]
                ],
                [
                    'label'=>'Серебро',
                    'backgroundColor'=>'#B5CC18',
                    'data'=>[rand(0,40000),rand(0,40000),rand(0,40000),rand(0,40000)]
                ],
            ]
        ];
    }

    public function newEvent(Request $request)
    {
        $result= [
            'labels' => ['march','april','may','june'],
            'datasets' => [
                [
                    'label'=>'Sales',
                    'backgroundColor'=>'#f26202',
                    'data'=>[15000,5000,10000,30000]
                ],
            ]
        ];
        if($request->has('label')){

            $result['labels'][]=$request->input('label');
            $result['datasets'][0]['data'][]=(int)$request->input('sale');
            if($request->has('realtime')){
                if(filter_var($request->input('realtime'),FILTER_VALIDATE_BOOLEAN)){
                    event(new ChartEvent($result));
                }
            }
        }
        return $result;
    }

    public function chat(Request $request)
    {
        event(new NewMessage($request->input('message')));
    }
}
