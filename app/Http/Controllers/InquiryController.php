<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\NewInquiryNotification;


class InquiryController extends Controller
{	

    public function inquiry(Request $request) {
        // $to_email = $request->get('email');

            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'phone' => 'required|string',
            'message' => 'required|max:500',
        ]);

        // dd($validator->errors());    
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $Inquiry = Inquiry::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
        ]);

        // Send Email
        Mail::to('ali@alimuhammad.ca')->send(new NewInquiryNotification($request));

        $array_response = [
        	"Inquiry has been created",
        	"Email is sent"
        ];
        return response()->json($array_response, 201);
    }

    private function rules($id = '') {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50',
            'phone' => 'required|string',
            'message' => 'required|max:500',
        ];
    }
    private function messages() {
        return [
            'required' => 'The :attribute can not be blank.'
        ];
    }
}
