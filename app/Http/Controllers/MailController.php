<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class MailController extends Controller
{
   

    public function do_create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'required|image',
        ]);
    
        $data = $request->all();
        $path = 'asset/storage/images/'.$data['image'];
        $fileName=time().$request->file('image')->getClientoriginalName();
        $path=$request->file('image')->storeAs('images',$fileName,'public');
        $datas["image"]='/storage/'.$path;        
        $data['image']=$fileName; 
        $data['password']=bcrypt($request->password);
    
        // Create user
        User::create($data);
    
        // Attach files
        $files = [
            public_path('storage/images/' . $data['image']),
        ];
        
    
        // Send email
        Mail::send('testmail', ['data' => $data], function ($message) use ($data, $files) {
            $message->to($data['email'], $data['name'])
                    ->subject('Subject of Your Email');
    
            foreach ($files as $file) {
                $message->attach($file);
            }
        });
        return "email sent successfully";
    }
    
}
