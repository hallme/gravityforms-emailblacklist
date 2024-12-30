==== Gravity Forms Email Blacklist ====
Contributors: crosspeak, hallme, timbhowe, matt-h-1, Matt Thomas
Donate link: N/A
Tags: gravity forms, gravity form, forms, gravity, form, email blacklist, block email, blacklist
Requires at least: 3.8
Tested up to: 6.1.1
Stable tag: 2.7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An add-on plugin for Gravity Forms that allows the Blacklisting of specific emails or email domains that are entered in [Email input fields](https://docs.gravityforms.com/email/) to throw a validation error and blocking the form submission.

=== Description ===

The Email Blacklist Add-on for Gravity Forms was built to help block submissions from users with generic or competitors email addresses. Prevent the user from processing the form and stop non-qualified leads from being collected.

This plugin allows site admins to create a list of domains that if used in an email field on a Gravity Form it will cause a validation error and block the submission. A default email blacklist and validation message can be created to use across all email fields. These default settings can be overridden on a per email field basis.

Global settings can be added on 'Forms' > 'Settings' > 'Email Blacklist'. To add settings to an individual email field, select the field and navigate to the 'Advanced Settings' tab.

This plugin works by blocking either individual email addresses (ex. jsmith@gmail.com), email address domains (ex. gmail.com), and/or email address top-level domains (ex. *.com).

Feel free to contribute on [github](https://github.com/crosspeaksoftware/gravity-forms-email-blacklist).

=== Installation ===

1. Search for and install the 'Gravity Forms Email Blacklist' OR Upload `gravity-forms-email-blacklist` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate from the Dashboard to the 'Forms' > 'Settings' > 'Email Blacklist' to make sure it is installed.

=== Screenshots ===

1. Global Plugin Settings
2. Email Field Settings
3. Email Field Settings Updated
4. Form Validation Error

=== Instructions ===

== Global Blacklist Settings ==
Once set up, these settings will be used on all email input fields across all the Gravity Forms used on the site. They can be overridden by the individual email blacklist settings below.

1. Once Logged into your site navigate to 'Forms' > 'Settings' > 'Email Blacklist'
2. In the 'Global Blacklisted Emails' input enter a comma separated list of blacklisted domains (ie. hotmail.com), email addresses (ie. user@aol.com), and/or include the wildcard notation to block top-level domains (ie. *.com). This setting can be overridden on individual email fields in the advanced settings.
3. In the 'Global Validation Message' input enter a default error message if a blacklisted email is submitted. This setting can be overridden on individual email fields in the advanced settings.
4. Click the 'Update Settings' button to save the settings.

== Individual Email Input Blacklist Settings ==
Once set up these settings will be used on this form only and in place of the global blacklist settings above.

1. Once Logged into your site navigate to the Gravity Form you would like to update.
2. Add or update an existing email input field on the form.
3. Go to the 'Advanced Settings' tab for the 'Blacklisted Emails' input.
4. In the 'Blacklisted Emails' input enter a comma separated list of blacklisted domains (ie. hotmail.com), email addresses (ie. user@aol.com), and/or include the wildcard notation to block top-level domains (ie. *.com). This will override the globally defined blacklisted emails setting. Enter 'none' to bypass the global setting and allow all email addresses.
5. In the 'Blacklisted Emails Validation Message' input enter an error message if a blacklisted email is submitted. This will override the globally defined error message.
6. Click the 'Save Form' button to save the settings.

=== Additional Resources ===
* [Gravity Forms Documentation - Getting Started](https://docs.gravityforms.com/category/getting-started/)
* [Gravity Forms Documentation - Email Input Fields](https://docs.gravityforms.com/email/)
* [Gravity Forms Documentation - Fighting Spam](https://docs.gravityforms.com/spam/)

=== Changelog ===

= 2.7.0 =
* Enhancement: Added support to treat submissions with blacklisted emails as spam.

= 2.5.5 =
* Bugfix: Corrected version number issue.

= 2.5.4 =
* Bugfix: Resolved empty value handling in the validation function to prevent false positives.
* Enhancement: Added capability declination support for better integration with role and capabilities plugins.

= 2.5.3 =
* Improvement: Updated labels and descriptions in admin settings for better clarity.

= 2.5.2 =
* Bugfix: Improved TLD detection to ensure wildcard support for sub-domain emails.

= 2.5.1 =
* Enhancement: Enabled translation for static setting strings.
* Added: Text domain for translations.
* Added: Filters for 3rd party plugins to modify validation messages and checks.
* Added: Short-circuit filter for bypassing specific checks.

= 2.5.0 =
* Documentation: Updated instructions and compatibility details.
* Bugfix: Adjusted validation for hidden email fields under conditional logic.

= 2.4.0 =
* Feature: Added support for wildcards to block entire top-level domains.

= 2.3.0 =
* Improvement: Refactored AddOn initialization process.
* Code Standard: Updated to meet PHPCS WordPress coding standards.
* Updated: Version and compatibility numbers.

= 2.2.0 =
* Added: GitHub repository URL in author details.
* Bugfix: Corrected typo in the readme file.

= 2.1.0 =
* Feature: Added plugin icon for better identification.

= 2.0.0 =
* Bugfix: Removed debug statements from validation function.
* Enhancement: Added case-insensitive email comparison.
* Improvement: Enhanced functionality for both domains and specific emails.
* Code Quality: Passed through PHPCS with WordPress standards.
* Structure: Moved main class to '/includes' directory.
* UX: Added placeholder text to input fields.
* Updated: Code comments and file naming for clarity.

= 1.1.0 =
* Feature: Introduced custom validation messages in email field advanced settings.
* Enhancement: Added default global settings for blacklist and validation messages.

= 1.0.0 =
* Initial Release: Added email blacklist options to email fields under advanced settings.

