@php
    if (empty($title)) {
		$title = 'LVZ';
    }
	if (empty($header_info)) {
		$header_info = '';
	}
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('css/lvz/main.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="container">
                <div class="headerWrap">
                    <a href="/" class="headerWrapLink">
                        <img src="/images/main_logo.png" class="headerWrapLinkImg">
                    </a>
                    <p class="headerWrapP">[LVZ] {{ $header_info }}</p>
                </div>
            </div>
        </header>
        @if ($showAuth == 'show')
            <x-l::auth-info/>
        @endif
        {{ $slot }}
    </body>
</html>
