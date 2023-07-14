<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    


    public function notifcations(){
        $unreadNotifications =  auth()->user()->unreadNotifications;
        return view('admin.notification',compact('unreadNotifications'));
    }

    public function ReadAll(){
        $unreadNotifications =  auth()->user()->unreadNotifications;
        $unreadNotifications->each(function($notifcation){
            $notifcation->markAsRead();

        });

        return redirect()->back();


    }

    public function Read($notifcation){
        $Notifications =  auth()->user()->notifications()->findOrFail($notifcation);

        $Notifications->makeAsRead();
        
        return redirect()->back();


    }
}
