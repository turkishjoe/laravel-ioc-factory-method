<?php

namespace App\Console\Commands;

use App\Service\Sender\SenderFactory;
use App\Model\User;
use Illuminate\Console\Command;

class SenderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send {user} {message}';

    /**
     * @var SenderFactory $factoryImplementation
     */
    private SenderFactory $factoryImplementation;

    /**
     * SenderCommand constructor.
     * @param SenderFactory $sender
     */
    public function __construct(SenderFactory $sender)
    {
        parent::__construct();

        $this->factoryImplementation = $sender;
    }

    public function handle(){
       $user = User::find($this->argument('user'));

       if(empty($user)){
           return;
       }

       $this->factoryImplementation->send($user, $this->argument('message'));
    }
}
