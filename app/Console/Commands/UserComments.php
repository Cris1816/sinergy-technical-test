<?php

namespace App\Console\Commands;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UserComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        try 
        {
            $client = new Client();

            $response = $client->request('GET','https://jsonplaceholder.typicode.com/comments?email=Eliseo@gardner.biz');

            $comments = json_decode($response->getBody()->getContents());

            for ($i=0; $i < count($comments); $i++) 
            {
                echo "\nComentario número: ".$i+1;
                echo "\nEmail: ".$comments[$i]->email;
                echo "\nComentario: ".$comments[$i]->body;
            }
        } 
        catch (Exception $ex) 
        {
            error_log("Exception: ".$ex->getMessage());
        }
    }
}
