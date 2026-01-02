<?php
/**
 * Form Block
 *
 * @var array $data
 */

$action = $data['action'] ?? '#';
?>

<section class="max-w-7xl mx-auto px-4 py-12">
  <form method="post" action="<?= htmlspecialchars($action) ?>" class="max-w-xl">
    
    <label class="block mb-4">
      <span class="text-sm text-muted-foreground">Email</span>
      <input type="email" name="email" required
             class="w-full border border-border px-3 py-2 rounded-md">
    </label>

    <button type="submit"
            class="bg-cta text-inverse-foreground px-6 py-3 rounded-md font-semibold">
      Send
    </button>

  </form>
</section>