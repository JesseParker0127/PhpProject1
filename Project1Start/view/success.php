<?php include 'header.php'; ?>
<main>
    <h2>Success</h2>
    <p>The following registration information has been successfully
       submitted.</p>
    <ul>
        <li>First Name: <?php echo htmlspecialchars($first_name); ?></li>
        <li>Last Name: <?php echo htmlspecialchars($last_name); ?></li>
        <li>Phone: <?php echo htmlspecialchars($phone); ?></li>
        <li>Email: <?php echo htmlspecialchars($email); ?></li>
    </ul>
	<!--Echo the session id-->
	<p>Session ID: <?php echo session_id(); ?></p>
</main>
<?php include 'footer.php'; ?>