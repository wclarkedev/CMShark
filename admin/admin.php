<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="../tailwind.config.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
        <title>Admin</title>
        <meta name="title" content="Admin">
    </head>
    <body class="bg-backgroundColor">
    <?php 
    error_reporting(0);
        if($_SERVER['REQUEST_METHOD']=='GET') {
            $action = $_GET['action'];
            switch ($action) {
                case "current_pfp":
                    ?>
                        <section class="w-4/12 flex flex-col mx-auto bg-backgroundAccent text-primaryText rounded mt-12">
                            <a class="text-accent font-semibold hover:underline p-2" href="index.php">Return to dashboard</a>
                            <span class="text-primaryText text-xl px-5 pt-4">Current Profile Picture</span>
                            <img class="h-6/12 w-6/12 mx-auto mt-4 mb-5 rounded" 
                            src="https://images.unsplash.com/photo-1637734433731-621aca1c8cb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=404&q=80" 
                            alt="profile picture">
                        </section>
                    <?php
                break;
            }
        }
    ?>
    </body>
</html>