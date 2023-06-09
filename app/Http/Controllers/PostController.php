<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Compose as compose;
use App\Models\inbox;
use App\Models\Sender as send;
use App\Models\Delete as item;
use App\Models\Users as user;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function compose()
    {
        return view('pages.compose');
    }


    public function composeSubmit(Request $request)
    {

        $file = $request->file('file');
        if (is_null($file)) {

            $composer = new compose;
            $composer->sender = $request['sender'];
            $composer->receiver = $request['receiver'];
            $composer->subject = $request['subject'];
            $composer->message = $request['message'];
            $composer->file_name = null;

            $composer->status = 0;
        } else {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $composer = new compose;
            $composer->sender = $request['sender'];
            $composer->receiver = $request['receiver'];
            $composer->subject = $request['subject'];
            $composer->message = $request['message'];
            $composer->status = 0;
            $composer->file_name = $fileName;
        }





        $composer->save();

        return redirect(route('compose'));
    }

    // public function composeSubmit(Request $request)
    // {

    //     $user = user::where('email', $request['receiver']);

    //     if (isNull($user)) {
    //         $composer = new compose;
    //         $composer->sender = $request['sender'];
    //         $composer->receiver = $request['receiver'];
    //         $composer->subject = $request['subject'];
    //         $composer->message = $request['message'];
    //         $composer->status = 0;
    //         $composer->save();
    //         return redirect(route('compose'));
    //     } else {
    //         $error = "Receiver is Not Exist!";
    //         return redirect(route('compose'))->with('error', $error);
    //     }
    // }

    public function send()
    {
        $send = send::where('sender', Auth::user()->email)->get();
        $data = compact('send');
        return view('pages.send')->with($data);
    }

    public function inbox()
    {
        $receiver = Inbox::where('receiver', Auth::user()->email)->get();
        $data = compact('receiver');
        return view('pages.inbox')->with($data);
    }

    // public function inboxRead($data)
    // {
    //     return view('pages.inboxRead', ['data' => $data]);
    // }

    public function delete($id)
    {

        $item = item::findOrFail($id);

        // Perform the delete operation
        $item->delete();

        return redirect()->back();
    }

    public function download($filename)
    {
        $filePath = storage_path('app/uploads/' . $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle file not found error
        }
    }
}
