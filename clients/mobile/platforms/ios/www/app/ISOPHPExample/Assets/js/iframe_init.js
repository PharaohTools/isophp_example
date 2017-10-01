var iframePHPEngine = uniter.createEngine('PHP');

iframePHPEngine.getStdout().on('data', function (data) {
    document.body.insertAdjacentHTML('beforeEnd', data);
});

iframePHPEngine.getStderr().on('data', function (data) {
    document.body.insertAdjacentHTML('beforeEnd', 'PHP error: ' + data);
});

[].forEach.call(document.querySelectorAll('script[type="text/x-uniter"]'), function (script) {
    iframePHPEngine.execute('<?php ' + script.textContent).fail(function (error) {
        console.error(error);
    });
});
