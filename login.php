<?php
require_once 'validation.php';

$email = '';
$errors = [];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    $email = clean_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!valid_email($email)) {
        $errors['email'] = 'Enter a valid email address.';
    }
    if (!valid_password($password)) {
        $errors['password'] = 'Password must be at least 8 characters and contain a letter and a number.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Log in to your Marco Rafaeles portfolio account.">
  <title>Log In | Marco Rafaeles</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
  <header class="auth-header"><a class="brand-mark" href="index.php" aria-label="Marco Rafaeles home">MR<span>.</span></a><a class="back-link" href="index.php"><span aria-hidden="true">&larr;</span> Back to portfolio</a></header>
  <main class="auth-main">
    <section class="auth-card" aria-labelledby="login-title">
      <p class="eyebrow">Welcome back</p>
      <h1 id="login-title">Log in to your account.</h1>
      <p class="auth-intro">Continue exploring the work and ideas behind the portfolio.</p>
      <?php if ($submitted && $errors === []): ?><p class="form-success" role="status">Your login details passed validation.</p><?php endif; ?>
      <form action="login.php" method="post" novalidate>
        <div class="form-field"><label for="login-email">Email address</label><input type="email" id="login-email" name="email" value="<?= escape_output($email) ?>" autocomplete="email" maxlength="254" autocapitalize="none" required><?php if (isset($errors['email'])): ?><small class="form-error"><?= escape_output($errors['email']) ?></small><?php endif; ?></div>
        <div class="form-field"><div class="label-row"><label for="login-password">Password</label><a href="#">Forgot password?</a></div><input type="password" id="login-password" name="password" autocomplete="current-password" required><?php if (isset($errors['password'])): ?><small class="form-error"><?= escape_output($errors['password']) ?></small><?php endif; ?></div>
        <div class="form-check custom-check"><input class="form-check-input" type="checkbox" id="remember-me" name="remember"><label class="form-check-label" for="remember-me">Remember me</label></div>
        <button class="btn btn-primary-custom w-100 auth-submit" type="submit">Log in <span aria-hidden="true">&#8594;</span></button>
      </form>
      <p class="switch-auth">Don&apos;t have an account? <a href="register.php">Create one</a></p>
    </section>
  </main>
  <footer class="auth-footer"><p>&copy; 2026 Marco Rafaeles. Built with intention.</p></footer>
</body>
</html>
