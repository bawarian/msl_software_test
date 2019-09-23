<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Room;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RoomController extends Controller
{
    public function part1()
    {
		$rooms = Room::all();
        return view('room.part1', ['rooms' => $rooms]);
    }

	public function part1_add(Request $request)
	{
		$room = new Room;
        $room->room_type_name = $request->input('room_type_name');
        $room->room_type_id	  = $request->input('room_type_id');
        $room->save();

		return redirect('room/part1');
	}
	
    public function part2(Request $request)
    {
		$rooms = Room::all();
		//print_r($request->session()->all());

		$data = '';
		if ($request->has('date') && $request->has('room_type_id'))
		{
			try
			{
				$client = new Client();
				$result = $client->post('http://3.84.18.224/aspire-project/public/booking-box/api-test', [
					'http_errors' => false,
					'form_params' => [
						'date'			=>	$request->input('date'),
						'room_type_id'	=>	$request->input('room_type_id')
					]
				]);

				$data = $result->getBody();
			}
			catch (Exceptioin $e)
			{
				return $e->getMessage();
			}
		}

        return view('room.part2', ['rooms' => $rooms, 'data' => $data]);
    }

	public function part2_api(Request $request)
	{
		$client = new Client();
		$result = $client->post('http://3.84.18.224/aspire-project/public/booking-box/api-test', [
			'form_params' => [
				'date'			=>	$request->input('date'),
				'room_type_id'	=>	$request->input('room_type_id')
			]
		]);

		$data = $result->getBody();
		$request->session()->put('data', $data);
		
		return redirect('room/part2');
	}
}