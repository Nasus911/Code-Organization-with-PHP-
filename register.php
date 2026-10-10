<?php
require_once 'validation.php';

$fullName = '';
$email = '';
$errors = [];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;
    $fullName = clean_input($_POST['full_name'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (!valid_name($fullName)) {
        $errors['full_name'] = 'Use 2-100 letters with spaces, periods, apostrophes, or hyphens.';
    }
    if (!valid_email($email)) {
        $errors['email'] = 'Enter a valid email address.';
    }
    if (!valid_password($password)) {
        $errors['password'] = 'Password must be at least 8 characters and contain a letter and a number.';
    }
    if ($confirmPassword !== $password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }
    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'You must agree to the terms and conditions.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Create a Marco Rafaeles portfolio account.">
  <title>Register | Marco Rafaeles</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
  <header class="auth-header"><a class="brand-mark" href="index.php" aria-label="Marco Rafaeles home">MR<span>.</span></a><a class="back-link" href="index.php"><span aria-hidden="true">&larr;</span> Back to portfolio</a></header>
  <main class="auth-main">
    <section class="auth-card" aria-labelledby="register-title">
      <p class="eyebrow">Join the portfolio</p>
      <h1 id="register-title">Create your account.</h1>
      <p class="auth-intro">Save your favorite projects and stay close to new work.</p>
      <?php if ($submitted && $errors === []): ?><p class="form-success" role="status">Your registration details passed validation.</p><?php endif; ?>
      <form action="register.php" method="post" novalidate>
        <div class="form-field"><label for="register-name">Full name</label><input type="text" id="register-name" name="full_name" value="<?= escape_output($fullName) ?>" autocomplete="name" maxlength="100" required><?php if (isset($errors['full_name'])): ?><small class="form-error"><?= escape_output($errors['full_name']) ?></small><?php endif; ?></div>
        <div class="form-field"><label for="register-email">Email address</label><input type="email" id="register-email" name="email" value="<?= escape_output($email) ?>" autocomplete="email" maxlength="254" autocapitalize="none" required><?php if (isset($errors['email'])): ?><small class="form-error"><?= escape_output($errors['email']) ?></small><?php endif; ?></div>
        <div class="form-field"><label for="register-password">Password</label><input type="password" id="register-password" name="password" autocomplete="new-password" required><small>Use at least 8 characters, including a letter and a number.</small><?php if (isset($errors['password'])): ?><small class="form-error"><?= escape_output($errors['password']) ?></small><?php endif; ?></div>
        <div class="form-field"><label for="confirm-password">Confirm password</label><input type="password" id="confirm-password" name="confirm_password" autocomplete="new-password" required><?php if (isset($errors['confirm_password'])): ?><small class="form-error"><?= escape_output($errors['confirm_password']) ?></small><?php endif; ?></div>
        <div class="form-check custom-check"><input class="form-check-input" type="checkbox" id="terms" name="terms" required><label class="form-check-label" for="terms">I agree to the <a href="#">terms and conditions</a>.</label><?php if (isset($errors['terms'])): ?><small class="form-error"><?= escape_output($errors['terms']) ?></small><?php endif; ?></div>
        <button class="btn btn-primary-custom w-100 auth-submit" type="submit">Create account <span aria-hidden="true">&#8594;</span></button>
      </form>
      <p class="switch-auth">Already have an account? <a href="login.php">Log in</a></p>
    </section>
  </main>
  <footer class="auth-footer"><p>&copy; 2026 Marco Rafaeles</p></footer>
</body>
</html>
