<?php
print 'Hello from binder.fephp!';
return function ($document) {
    $messageBox = $document->getElementById('myMessage');
    $document->getElementById('helloButton')->addEventListener('click', function () use ($messageBox) {
        $messageBox->textContent = 'You clicked Hello!';
    });
    $document->getElementById('worldButton')->addEventListener('click', function () use ($messageBox) {
        $messageBox->textContent = 'You clicked World!';
    });
};