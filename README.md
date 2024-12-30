# Gravity Forms Email Blacklist

## Description

The Email Blacklist Add-on for Gravity Forms was built to help block submissions from users with generic or competitor email addresses. Prevent the user from processing the form and stop non-qualified leads from being collected.

This plugin allows site admins to create a list of domains that, if used in an email field on a Gravity Form, will cause a validation error and block the submission. A default email blacklist and validation message can be created to use across all email fields. These default settings can be overridden on a per-email field basis.

Global settings can be added under **Forms > Settings > Email Blacklist**. To add settings to an individual email field, select the field and navigate to the **Advanced Settings** tab.

This plugin works by blocking either individual email addresses (e.g., `jsmith@gmail.com`), email address domains (e.g., `gmail.com`), and/or email address top-level domains (e.g., `*.com`).

## Installation

1. Search for and install the 'Gravity Forms Email Blacklist' plugin, OR upload `gravity-forms-email-blacklist` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Navigate to **Forms > Settings > Email Blacklist** to configure the plugin.

## Screenshots

1. Global Plugin Settings
2. Email Field Settings
3. Email Field Settings Updated
4. Form Validation Error

## Instructions

### Global Blacklist Settings

Once set up, these settings will apply to all email input fields across all Gravity Forms used on the site. They can be overridden by individual email blacklist settings.

1. Log in to your site and navigate to **Forms > Settings > Email Blacklist**.
2. In the **Global Blacklisted Emails** field, enter a comma-separated list of blacklisted domains (e.g., `hotmail.com`), email addresses (e.g., `user@aol.com`), and/or use wildcard notation to block top-level domains (e.g., `*.com`). These settings can be overridden in individual email fields under advanced settings.
3. In the **Global Validation Message** field, enter a default error message that will display if a blacklisted email is submitted. This setting can also be overridden in individual email fields.
4. Click **Update Settings** to save your changes.

### Individual Email Input Blacklist Settings

These settings apply only to the selected form and override the global blacklist settings.

1. Log in to your site and navigate to the Gravity Form you want to update.
2. Add or edit an existing email input field on the form.
3. Go to the **Advanced Settings** tab for the field.
4. In the **Blacklisted Emails** field, enter a comma-separated list of blacklisted domains (e.g., `hotmail.com`), email addresses (e.g., `user@aol.com`), and/or use wildcard notation to block top-level domains (e.g., `*.com`). To bypass the global settings and allow all email addresses, enter `none`.
5. In the **Blacklisted Emails Validation Message** field, enter an error message to display if a blacklisted email is submitted. This setting overrides the global validation message.
6. Click **Save Form** to apply your changes.

## Additional Resources

- [Gravity Forms Documentation - Getting Started](https://docs.gravityforms.com/category/getting-started/)
- [Gravity Forms Documentation - Email Input Fields](https://docs.gravityforms.com/email/)
- [Gravity Forms Documentation - Fighting Spam](https://docs.gravityforms.com/spam/)

## Changelog

### 2.7.0
- **Enhancement:** Added support to treat submissions with blacklisted emails as spam.

### 2.5.5
- **Bugfix:** Corrected version number issue.

### 2.5.4
- **Bugfix:** Resolved empty value handling in the validation function to prevent false positives.
- **Enhancement:** Added capability declination support for better integration with role and capabilities plugins.

### 2.5.3
- **Improvement:** Updated labels and descriptions in admin settings for better clarity.

### 2.5.2
- **Bugfix:** Improved TLD detection to ensure wildcard support for sub-domain emails.

### 2.5.1
- **Enhancement:** Enabled translation for static setting strings.
- **Added:** Text domain for translations.
- **Added:** Filters for third-party plugins to modify validation messages and checks.
- **Added:** Short-circuit filter for bypassing specific checks.

### 2.5.0
- **Documentation:** Updated instructions and compatibility details.
- **Bugfix:** Adjusted validation for hidden email fields under conditional logic.

### 2.4.0
- **Feature:** Added support for wildcards to block entire top-level domains.

### 2.3.0
- **Improvement:** Refactored AddOn initialization process.
- **Code Standard:** Updated to meet PHPCS WordPress coding standards.
- **Updated:** Version and compatibility numbers.

### 2.2.0
- **Added:** GitHub repository URL in author details.
- **Bugfix:** Corrected typo in the readme file.

### 2.1.0
- **Feature:** Added plugin icon for better identification.

### 2.0.0
- **Bugfix:** Removed debug statements from the validation function.
- **Enhancement:** Added case-insensitive email comparison.
- **Improvement:** Enhanced functionality for both domains and specific emails.
- **Code Quality:** Passed through PHPCS with WordPress standards.
- **Structure:** Moved main class to `/includes` directory.
- **UX:** Added placeholder text to input fields.
- **Updated:** Code comments and file naming for clarity.

### 1.1.0
- **Feature:** Introduced custom validation messages in email field advanced settings.
- **Enhancement:** Added default global settings for blacklist and validation messages.

### 1.0.0
- **Initial Release:** Added email blacklist options to email fields under advanced settings.
