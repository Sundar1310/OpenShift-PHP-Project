<?php
// Parlour Details
$shopName = "Sundar Hair Stylings";
$tagline = "Your beauty, our passion";

// Services Array
$services = [
    ["name" => "Haircut & Styling", "price" => "₹500", "desc" => "Trendy cuts & perfect styles."],
    ["name" => "Facial & Skin Care", "price" => "₹800", "desc" => "Rejuvenate and refresh your skin."],
    ["name" => "Manicure & Pedicure", "price" => "₹600", "desc" => "Pamper your hands & feet."],
    ["name" => "Makeup Services", "price" => "₹1200", "desc" => "Perfect makeup for every occasion."],
    ["name" => "Spa & Massage", "price" => "₹1500", "desc" => "Relax with our soothing treatments."]
];

// Timings Array
$timings = [
    "Monday - Friday" => "10:00 AM - 10:00 PM",
    "Saturday" => "9:00 AM - 9:00 PM",
    "Sunday" => "Closed"
];

// Form Submission Logic
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $submitted = true;

    // Save to file for demonstration
    $log = date("Y-m-d H:i:s") . " | $name | $email | $message" . PHP_EOL;
    file_put_contents("submissions.txt", $log, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $shopName; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #fffafc; margin: 0; padding: 0; }
        header { background: #d6336c; color: white; padding: 20px; text-align: center; }
        h1 { margin: 0; }
        section { padding: 20px; }
        .services, .timings { display: flex; flex-wrap: wrap; justify-content: center; }
        .service, .time {
            background: white; border: 1px solid #ddd; border-radius: 8px; padding: 15px;
            margin: 10px; width: 250px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .service h3 { color: #d6336c; }
        form {
            max-width: 400px; margin: auto; background: white; padding: 20px;
            border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        form input, form textarea, form button {
            width: 100%; margin-top: 10px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;
        }
        form button { background: #d6336c; color: white; border: none; cursor: pointer; }
        footer { text-align: center; padding: 15px; background: #f1f1f1; margin-top: 20px; }
        .success { text-align: center; color: green; margin-bottom: 15px; }
        .badge {
            display: inline-block; padding: 5px 10px; background: #007bff; color: white;
            border-radius: 4px; font-size: 14px; text-decoration: none; margin-top: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1><?php echo $shopName; ?></h1>
    <p><?php echo $tagline; ?></p>
    <a class="badge" href="https://YOUR-APP-URL" target="_blank">Live on OpenShift</a>
</header>

<section>
    <h2 style="text-align:center;">Our Services</h2>
    <div class="services">
        <?php foreach ($services as $service): ?>
            <div class="service">
                <h3><?php echo $service["name"]; ?></h3>
                <p><?php echo $service["desc"]; ?></p>
                <strong>Price: <?php echo $service["price"]; ?></strong>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <h2 style="text-align:center;">Shop Timings</h2>
    <div class="timings">
        <?php foreach ($timings as $day => $time): ?>
            <div class="time">
                <strong><?php echo $day; ?></strong><br>
                <?php echo $time; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <h2 style="text-align:center;">Contact Us</h2>
    <?php if ($submitted): ?>
        <p class="success">Thank you <?php echo $name; ?>, your message was received and saved!</p>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>

<footer>
    <p>© <?php echo date("Y"); ?> Sundar Hair Stylings. All Rights Reserved.</p>
    <p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/OpenShift-LogoType.svg"
             alt="OpenShift Logo" style="height: 25px; vertical-align: middle;">
        Powered by <strong>Red Hat OpenShift</strong>
    </p>
</footer>

</body>
</html>
