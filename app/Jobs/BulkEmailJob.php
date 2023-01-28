<?php

namespace App\Jobs;

use App\Mail\BulkEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class BulkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    protected $ids;
    protected $title;
    protected $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $ids, $details, $title)
    {
        $this->details = $details;
        $this->ids = $ids;
        $this->title = $title;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {




          $details = $this->details;
        //   dd($details[0]);
        $title['title'] = $this->title;
        $subject['subject'] = $this->subject;
        foreach ($this->ids as $key => $emails) {
            // echo dd($email);
            // $emails['email'] =  $email;
            $email = new BulkEmail($details);
            Mail::to($emails)->send($email);
        // Mail::to($this->details['email'])->send($email);
        //     Mail::send('email' ,[],function ($message) use ($email) {
        //         $message->to($email,'Test')->subject('yes');
        //     });
        }
    }
}
