<?php
    /*$href = $_POST['username'];
    $messg = $_POST['messg'];
    $sedule_time = $_POST['time'];
    $del_or_send = $_POST['del_or_send'];
    $message_id = $_POST['message_id'];*/
    $href = "@g4grey";
    $messg = "a";
    $sedule_time = time() + 60;
    $del_or_send = 1;
   // $message_id = $_POST['message_id'];

    if (!file_exists('madeline.php')) {
        copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
    }
    include 'madeline.php';
    require 'vendor/autoload.php';
    use \danog\MadelineProto\API;

    $settings = [
        'app_info' => [
            'api_id' => 27983869,
            'api_hash' => '33da3ff295cf6ab6cc4213f78e8f72ee',
        ],
        'logger' => [ // Вывод сообщений и ошибок
            'logger' => 3, // выводим сообещения через echo
            'logger_level' => 4, // выводим только критические ошибки.
        ],
        
        'serialization' => [
            'serialization_interval' => 300,
            //Очищать файл сессии от некритичных данных. 
            //Значительно снижает потребление памяти при интенсивном использовании, но может вызывать проблемы
            'cleanup_before_serialization' => true,
        ],
    ];

   
    

    // require_once 'vendor/autoload.php';


    $MP = new \danog\MadelineProto\API('session.madeline', $settings);
    $MP->start();
    if ($del_or_send == 1) {
        $ret = $MP->messages->sendMessage(['peer' => $username, 'message' => $messg, 'schedule_date' => $sedule_time]);
    }
    else {
        $MP->messages->deleteSchedulesMessages(['peer' => $username, 'id' => $ret]);
    }

    /*$participants = $MP->channels->getParticipants(channel: $href, filter: ['_' => 'channelParticipantsSearch'], offset: 0, limit: 200, hash: [0, 0], );
        print_r($participants); 
        foreach ($participants['participants'] as $participant) {
            $participant = $participant['user'];
        
            $username = $participant['username'] ?? null;
                
            if ($username !== null) {
                $usernames[] = "@$username";
            }
        }
        print_r($usernames);*/

    /*$count = 0;
    if ($usernames == null){
        //print_r('1   ');
        /*$participants = $MP->channels->getParticipants(channel: $href, filter: ['_' => 'channelParticipantsSearch'], offset: 0, limit: 200, hash: [0, 0], );
        print_r($participants); 
        foreach ($participants['participants'] as $participant) {
            $participant = $participant['user'];
        
            $username = $participant['username'] ?? null;
                
            if ($username !== null) {
                $usernames[] = "@$username";
            }
        }
        print_r($usernames);*/
        /*$channelInfo = $MP->channels->getFullChannel(['channel' => $href]);

        $members = $MP->channels->getParticipants(['channel' => $href, 'filter' => ['_' => 'channelParticipantsRecent'], 'offset' => 0, 'limit' => 200]);

        $users = array();
        foreach ($members['participants'] as $member) {
            print_r(2);
            $usr = $MP->users->getUser(['id' => $member['user_id']]);
            array_push($users, $usr['first_name'] . " " . $usr['last_name']);
            $count++;
        }
        //print_r($usernames);
    }*/
    /*else{
        foreach ($usernames as $username) {
            //$MP->messages->sendMessage(['peer' => '@'.$username, 'message' => $messg]);
            $count++;
        }
    }*/
    //отправка сообщений
    
    //print_r($count);

    /*$dialogs = $MP->getDialogs();
    
    $groups = [];
    foreach ($dialogs as $dialog) {
        if ($dialog['_'] == 'peerChat' || $dialog['_'] == 'peerChannel') {
            $groups[] = $dialog;
        }
        print_r(1);
        array_push($groups, $group);
    }
    
    print_r($dialogs);*/    



    //возвращение на изначальную страницу
    //header('Location: /index.php');
?>