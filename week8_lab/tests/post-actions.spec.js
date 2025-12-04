import { test, expect } from '@playwright/test';
import { randomUUID } from 'crypto';

test('Register -> Login -> Create -> Edit -> Delete post', async ({ page }) => {
  // Unique user
  const unique = Date.now();
  const email = `pwtest+${unique}@example.com`;
  const password = 'password';

  // 1) Register
  await page.goto('/');
  await page.goto('/register');
  await page.fill('input[name="username"]', `pwuser${unique}`);
  await page.fill('input[name="email"]', email);
  await page.fill('input[name="password"]', password);
  await page.fill('input[name="password_confirmation"]', password);
  await page.click('button:has-text("Register")');

  // After register you may be redirected — ensure we are logged in
  await expect(page.locator('text=Logout').first()).toBeVisible();

  // 2) Go to dashboard and create a post
  await page.goto('/dashboard');
  await page.fill('input[name="title"]', 'Playwright Post');
  await page.fill('textarea[name="body"]', 'This is a Playwright-created post body.');
  // if your create form has an image input named "image", uncomment next line:
  // await page.setInputFiles('input[name="image"]', 'tests/fixtures/test-image.jpg');
  await page.click('button:has-text("Create")');

  // Wait for success message or the post title to appear in dashboard
  await expect(page.locator('text=Post created successfully').or(page.locator('text=Playwright Post'))).toBeVisible({ timeout: 10000 });

  // 3) Edit the post — click its Edit link (assumes an "Edit" link is present next to post)
  await page.click(`text=Playwright Post`);
  // If Read-more view shows an Update link:
  if (await page.locator('a:has-text("Update")').count() > 0) {
    await page.click('a:has-text("Update")');
  } else {
    // fallback: go to posts list and click Update for first occurrence
    await page.click('a:has-text("Edit")');
  }

  await page.fill('input[name="title"]', 'Playwright Post (edited)');
  await page.click('button:has-text("Update")');
  await expect(page.locator('text=Post updated').or(page.locator('text=Playwright Post (edited)'))).toBeVisible({ timeout: 10000 });

  // 4) Delete the post
  // Locate delete form/button and submit it. This assumes a Delete button exists.
  const del = page.locator('form:has(button:has-text("Delete"))').first();
  await del.evaluate(form => form.submit());
  // Wait for a confirmation or absence of title
  await expect(page.locator('text=Playwright Post (edited)')).toHaveCount(0, { timeout: 10000 });
});
