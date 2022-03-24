<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email|max:255|unique:users',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer',
            'home_number' => 'required',
            'mobile_phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required|integer',
            // 'home_address_current_time' => 'required|date',
            ]);
        if ($validator->fails()) {
                //If validation fails, return error messages in JSON format
                return response()->json(['errors' => $validator->errors()], 422);
        }
        else {
            // If validation passes, create a new user
                $user = new User;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email_address = $request->email_address;
                $user->date_of_birth = $request->date_of_birth;
                $user->age = $request->age;
                $user->home_number = $request->home_number;
                $user->mobile_phone = $request->mobile_phone;
                $user->street_address = $request->street_address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->zip_code = $request->zip_code;
                $user->home_address_current_time = getTimezone($request->city.' '.$request->state);
                $user->save();
                $response = [
                    'success' => true,
                    'message' => "User Created Successfully!",
                ];


                return response()->json($response, 200);

        }
    return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = User::where('id',$id)->first();
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => 'User fetching successfully.',
        ];

        return response()->json($response,200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = User::where('id',$id)->first();
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => 'User fetching successfully.',
        ];

        return response()->json($response,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required',
            'date_of_birth' => 'required|date',
            'age' => 'required|integer',
            'home_number' => 'required',
            'mobile_phone' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required|integer',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());

        }

        $result = User::where('id',$id)->update([
            "first_name" => $input['first_name'],
            "last_name" => $input['last_name'],
            "date_of_birth" => $input['date_of_birth'],
            "age" => $input['age'],
            "home_number" => $input['home_number'],
            "mobile_phone" => $input['mobile_phone'],
            "email_address" => $input['email_address'],
            "street_address" => $input['street_address'],
            "city" => $input['city'],
            "state" => $input['state'],
            "zip_code" => $input['zip_code'],
            "home_address_current_time" => getTimezone($input['city'].' '.$input['state'])
          ]);
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => 'User updated successfully.',
        ];
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::where('id',$id)->delete();
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => 'User deleted successfully.',
        ];

        return response()->json($response,200);
    }

    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    public function getTimezone()
    {
        // $location = "1600+Pennsylvania+Avenue+NW+Washington+DC 20500+United States";
        $location = urlencode("sydney");
        dd($location);
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address={$location}&sensor=false";
        $data = file_get_contents($url);

        // Get the lat/lng out of the data
        $data = json_decode($data);
        if(!$data) return false;
        if(!is_array($data->results)) return false;
        if(!isset($data->results[0])) return false;
        if(!is_object($data->results[0])) return false;
        if(!is_object($data->results[0]->geometry)) return false;
        if(!is_object($data->results[0]->geometry->location)) return false;
        if(!is_numeric($data->results[0]->geometry->location->lat)) return false;
        if(!is_numeric($data->results[0]->geometry->location->lng)) return false;
        $lat = $data->results[0]->geometry->location->lat;
        $lng = $data->results[0]->geometry->location->lng;

        // get the API response for the timezone
        $timestamp = time();
        $timezoneAPI = "https://maps.googleapis.com/maps/api/timezone/json?location={$lat},{$lng}&sensor=false&timestamp={$timestamp}";
        $response = file_get_contents($timezoneAPI);
        if(!$response) return false;
        $response = json_decode($response);
        if(!$response) return false;
        if(!is_object($response)) return false;
        if(!is_string($response->timeZoneId)) return false;

        return $response->timeZoneId;
    }




}
