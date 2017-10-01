<?php

class ChatApplication {

    protected static $chat_name ;
    protected static $chat_msg ;
    protected static $socket ;

    public function start() {
        $host = \JSCore::$window->location->hostname ;
        $socket_server_url = 'http://' . $host . ':3000' ;
        self::$socket = \JSCore::$window->io($socket_server_url);
        \JSCore::$console->log(self::$socket) ;
        $jQuery = \JSCore::$jQuery ;
        $this->bindButton($jQuery) ;
        $this->bindSocket() ;
    }

    private function bindButton($jQuery) {
        $jQuery('#choose_chat_name')->on('click', function (){
            $console = \JSCore::$console ;
            $console->log('Clicked the #choose_chat_name span button') ;
            self::chooseChatName() ;
        });
        $jQuery('#choose_chat_msg')->on('click', function () {
            $console = \JSCore::$console ;
            $console->log('Clicked the #choose_chat_msg span button') ;
            $is_valid = (self::$chat_name !== null) ;
            if ( $is_valid ) {
                self::chooseChatMessage() ;
            } else {
                \WindowMessage::showMessage('Please pick a name before a message', 'bad') ;
            }
        });
        $jQuery('#send_chat_message')->on('click', function () {
            $console = \JSCore::$console ;
            $console->log('Clicked the #send_chat_message span button') ;
            $is_valid = ( (self::$chat_name !== null) && (self::$chat_msg !== null) ) ;
            if ( $is_valid ) {
                self::submitForm() ;
            } else {
                \WindowMessage::showMessage('Please pick a name and message to send', 'bad') ;
            }
        });
    }

    private function chooseChatName() {
        $html  = "<h2>Choose a chat name</h2>" ;
        $names = array(
            "Michaelangelo",
            "Donatello",
            "Leonardo",
            "Raphael",
        ) ;
        foreach ($names as $name) {
            $html = $html . "<span id='chat_name_choice_".$name."' class='chat_choice chat_name_choice' data-chat_name_choice='" ;
            $html = $html . $name."'>".$name."</span>" ;
            $html = $html . "<hr />" ;
        }
        \WindowMessage::showOverlay($html) ;
        $jQuery = \JSCore::$jQuery ;
        $jQuery('.chat_name_choice')->on('click', function ($jqthis) {
            $jQuery = \JSCore::$jQuery ;
            $console = \JSCore::$console ;
            $console->log( $jqthis->target->id );
            self::$chat_name = $jQuery('#'.$jqthis->target->id)->attr('data-chat_name_choice');
            $console->log('Chosen chat name of '.self::$chat_name) ;
            $label = '<h4>Name: <strong>'.self::$chat_name.'</strong></h4>' ;
            $jQuery('#choose_chat_name_wrapper')->html($label) ;
            \WindowMessage::showMessage('Chat name '.self::$chat_name.' chosen', 'good') ;
            \WindowMessage::closeOverlay() ;
            $jQuery('#choose_chat_msg')->removeClass('disabled') ;
        });
    }

    private function chooseChatMessage() {
        $msg_html  = "<h2>Choose a chat message</h2>" ;
        $msgs = array(
            1 => "Ninja.  Vanish.",
            2 => "Pizza dude’s got 30 seconds",
            3 => "Dude, Awesome!!!",
            4 => "I have always liked... Cowabunga.",
            5 => "Oh man, I could go for a little deep dish action right about now. "
        ) ;
        foreach ($msgs as $key => $msg) {
            $msg_html = $msg_html . "<span id='chat_msg_choice_".$key."' class='chat_choice chat_msg_choice' data-chat_msg_choice='" ;
            $msg_html = $msg_html . $msg."'>".$msg."</span>" ;
            $msg_html = $msg_html . "<hr />" ;
        }
        \WindowMessage::showOverlay($msg_html) ;
        $jQuery = \JSCore::$jQuery ;
        $jQuery('.chat_msg_choice')->on('click', function ($jqthis) {
            $jQuery = \JSCore::$jQuery ;
            $console = \JSCore::$console ;
            $console->log( $jqthis->target->id );
            self::$chat_msg = $jQuery('#'.$jqthis->target->id)->attr('data-chat_msg_choice');
            $console->log('Chosen chat msg of '.self::$chat_msg) ;
            $label = '<h4>Message: <strong>'.self::$chat_msg.'</strong></h4>' ;
            $jQuery('#choose_chat_msg_wrapper')->html($label) ;
            \WindowMessage::showMessage('Chat message '.self::$chat_msg.' chosen', 'good') ;
            \WindowMessage::closeOverlay() ;
            $jQuery('#send_chat_message')->removeClass('disabled') ;
        });
    }

    private function bindSocket() {
        self::$socket->on('chat update',  function ($msg) {
            $console = \JSCore::$console ;
            $console->log('Running the chat update event on the socket') ;
            self::chatUpdate($msg) ;
        });
    }

    private function submitForm() {
        $console = \JSCore::$console ;
        $console->log('current message is', self::$chat_msg) ;
        self::$socket->emit('chat message', self::$chat_name . ' says ' . self::$chat_msg);
    }

    public static function chatUpdate($msg) {
        $console = \JSCore::$console ;
        $jQuery = \JSCore::$jQuery ;
        $html_to_append = '<span>'.$msg.'</span>' ;
        $console->log('appending html', $html_to_append) ;
        $jQuery('#messages')->append($html_to_append);
    }

}