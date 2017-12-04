<?php

Namespace Model\LandingPage ;

class ChatApplication {

    protected static $chat_name ;
    protected static $chat_msg ;
    protected static $socket ;

    public function start() {
        \ISOPHP\console::log('in the start method') ;
        if (ISOPHP_EXECUTION_ENVIRONMENT === 'UNITER') {
            \ISOPHP\console::log('this is the chat app start') ;
            $host = \ISOPHP\js_core::$window->location->hostname ;
            $socket_server_url = 'http://' . $host . ':3000' ;
            self::$socket = \ISOPHP\js_core::$window->io($socket_server_url);
            \ISOPHP\console::log(self::$socket) ;
            $jQuery = \ISOPHP\js_core::$jQuery ;
            $this->bindButton($jQuery) ;
            $this->bindSocket() ;
        }
    }

    private function bindButton($jQuery) {
        $jQuery('#choose_chat_name')->on('click', function (){
            \ISOPHP\console::log('Clicked the #choose_chat_name span button') ;
            self::chooseChatName() ;
        });
        $jQuery('#choose_chat_msg')->on('click', function () {
            \ISOPHP\console::log('Clicked the #choose_chat_msg span button') ;
            $is_valid = (self::$chat_name !== null) ;
            if ( $is_valid ) {
                self::chooseChatMessage() ;
            } else {
                \Core\WindowMessage::showMessage('Please pick a name before a message', 'bad') ;
            }
        });
        $jQuery('#send_chat_message')->on('click', function () {
            \ISOPHP\console::log('Clicked the #send_chat_message span button') ;
            $is_valid = ( (self::$chat_name !== null) && (self::$chat_msg !== null) ) ;
            if ( $is_valid ) {
                self::submitForm() ;
            } else {
                \Core\WindowMessage::showMessage('Please pick a name and message to send', 'bad') ;
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
        \Core\WindowMessage::showOverlay($html) ;
        $jQuery = \ISOPHP\js_core::$jQuery ;
        $jQuery('.chat_name_choice')->on('click', function ($jqthis) {
            $jQuery = \ISOPHP\js_core::$jQuery ;
            \ISOPHP\console::log( $jqthis->target->id );
            self::$chat_name = $jQuery('#'.$jqthis->target->id)->attr('data-chat_name_choice');
            \ISOPHP\console::log('Chosen chat name of '.self::$chat_name) ;
            $label = '<h4>Name: <strong>'.self::$chat_name.'</strong></h4>' ;
            $jQuery('#choose_chat_name_wrapper')->html($label) ;
            \Core\WindowMessage::showMessage('Chat name '.self::$chat_name.' chosen', 'good') ;
            \Core\WindowMessage::closeOverlay() ;
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
        \Core\WindowMessage::showOverlay($msg_html) ;
        $jQuery = \ISOPHP\js_core::$jQuery ;
        $jQuery('.chat_msg_choice')->on('click', function ($jqthis) {
            $jQuery = \ISOPHP\js_core::$jQuery ;
            \ISOPHP\console::log( $jqthis->target->id );
            self::$chat_msg = $jQuery('#'.$jqthis->target->id)->attr('data-chat_msg_choice');
            \ISOPHP\console::log('Chosen chat msg of '.self::$chat_msg) ;
            $label = '<h4>Message: <strong>'.self::$chat_msg.'</strong></h4>' ;
            $jQuery('#choose_chat_msg_wrapper')->html($label) ;
            \Core\WindowMessage::showMessage('Chat message '.self::$chat_msg.' chosen', 'good') ;
            \Core\WindowMessage::closeOverlay() ;
            $jQuery('#send_chat_message')->removeClass('disabled') ;
        });
    }

    private function bindSocket() {
        self::$socket->on('chat update',  function ($msg) {
            \ISOPHP\console::log('Running the chat update event on the socket') ;
            self::chatUpdate($msg) ;
        });
    }

    private function submitForm() {
        \ISOPHP\console::log('current message is', self::$chat_msg) ;
        self::$socket->emit('chat message', self::$chat_name . ' says ' . self::$chat_msg);
    }

    public static function chatUpdate($msg) {
        $jQuery = \ISOPHP\js_core::$jQuery ;
        $html_to_append = '<span>'.$msg.'</span>' ;
        \ISOPHP\console::log('appending html', $html_to_append) ;
        $jQuery('#messages')->append($html_to_append);
    }

}