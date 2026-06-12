<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anorra Clinic Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        anorraTeal: '#008080',
                        anorraSecondary: '#A8DADC',
                        anorraBg: '#FFFFFF',
                        anorraLight: '#F4F9F9'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-gray-800 font-sans">
    @yield('content')
</body>
</html>