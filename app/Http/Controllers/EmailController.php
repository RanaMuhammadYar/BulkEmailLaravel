<?php

namespace App\Http\Controllers;

use App\Mail\BulkEmail;
use App\Jobs\BulkEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email()
    {
        $subject = ["Test Email"];
        $title = ["Bulk Email"];
        $details = "<h1><strong><i>This is Test Email</i></strong></h1>";
        $ids = ["ranamuhammadyaar9@gmail.com","syedhussnainshah787@gmail.com"];
        dispatch(new BulkEmailJob($details,$ids, $title,$subject))->delay(now()->addSeconds(2));
        // ($job);
        return "Mail send successfully !!";
    }
}
