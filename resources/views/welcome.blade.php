<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="root"></div>
    <script>
        // Add "Hello World" dynamically to the page
        const root = document.getElementById('root');
        const helloWorldLink = document.createElement('a');
        helloWorldLink.href = "{{ url('/about') }}";
        helloWorldLink.textContent = "Hello World";
        root.appendChild(helloWorldLink);
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>