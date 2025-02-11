<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Mail\TaskCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class SendTaskCreatedEmail
{
    public function handle(TaskCreated $event)
    {
        $task = $event->task;
        if (auth()->user() && !empty(auth()->user()->email)) {
            Mail::to(auth()->user()->email)->send(new TaskCreatedMail($task));
        } else {
            Log::warning("Tentativa de envio de e-mail para task sem usuário ou e-mail inválido.", ['task_id' => $task->id]);
        }
    }
}
