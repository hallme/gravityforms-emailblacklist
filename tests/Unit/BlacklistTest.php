<?php

test('no rules is valid', function () {
	$blacklist = '';

	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'example' ))->toBe(true);
});

test('single domain', function () {
	$blacklist = 'example.com';

	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(false);
});

test('single domain alterative syntax', function () {
	$blacklist = '*@example.com';

	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(false);
});

test('multiple domains', function () {
	$blacklist = 'example.com,test.com';

	expect(test_email_validation( $blacklist, 'test@testing.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(false);
});

test('multiple domains with wildcard', function () {
	$blacklist = 'example.*,test.com';

	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'example@example.us' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'example@test.us' ))->toBe(true);
});

test('multiple domains with wildcard and single email', function () {
	$blacklist = 'example.com,test@test.com';

	expect(test_email_validation( $blacklist, 'test@testing.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'test@test.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'example@example.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'test@example.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(true);
});

test('single email', function () {
	$blacklist = 'jsmith@crosspeaksoftware.com';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'test@example.com' ))->toBe(true);
});

test('weird case emails', function () {
	$blacklist = 'JSMITH@crosspeaksoftware.com';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@CROSSPEAKSOFTWARE.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsMith@CROSSPEAKsoftware.COM ' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(true);
});

test('multiple emails', function () {
	$blacklist = 'jsmith@crosspeaksoftware.com, jdoe@crosspeaksoftware.com';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.co' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co' ))->toBe(true);
});

test('multiple emails with wildcard', function () {
	$blacklist = 'jsmith@crosspeaksoftware.com, jdoe@*';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.us' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co.uk' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com.au' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.ca' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.de' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co.jp' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@example.com' ))->toBe(false);
});

test('wildcard in middle of blacklist', function () {
	$blacklist = 'jsmith*@crosspeaksoftware.com';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith2425@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith_test@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmit@crosspeaksoftware.com' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jsmit@crosspeaksoftware.co' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co' ))->toBe(true);
});

test('wildcard at end of blacklist', function () {
	$blacklist = 'jsmith@crosspeaksoftware.com*';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com.au' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.ca' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.de' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co.jp' ))->toBe(true);
});

test('wildcard at beginning of blacklist', function () {
	$blacklist = '*@crosspeaksoftware.com';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com.au' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.ca' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.de' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co.jp' ))->toBe(true);
});

test('wildcard at beginning and end of blacklist', function () {
	$blacklist = '*@crosspeaksoftware.com*';

	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com.au' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.ca' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.co.jp' ))->toBe(true);
});

test('wildcard at beginning and end of blacklist with email', function () {
	$blacklist = '*@crosspeaksoftware.com, jsmith@crosspeaksoftware.com*';

	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.com.au' ))->toBe(false);
	expect(test_email_validation( $blacklist, 'jdoe@crosspeaksoftware.com.au' ))->toBe(true);
	expect(test_email_validation( $blacklist, 'jsmith@crosspeaksoftware.ca' ))->toBe(true);
});

test('empty and invalid email addresses', function () {
	$blacklist = 'example.com';

	expect(test_email_validation($blacklist, ''))->toBe(true);
	expect(test_email_validation($blacklist, ' '))->toBe(true);
	expect(test_email_validation($blacklist, 'notanemail'))->toBe(true);
	expect(test_email_validation($blacklist, '@.com'))->toBe(true);
	expect(test_email_validation($blacklist, '@example.com'))->toBe(false);
});

test('special characters in email addresses', function () {
	$blacklist = 'example.com';

	expect(test_email_validation($blacklist, 'user+tag@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user.name@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user-name@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user_name@example.com'))->toBe(false);
});

test('whitespace handling', function () {
	$blacklist = ' example.com , test.com ';

	expect(test_email_validation($blacklist, 'user@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@test.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@other.com'))->toBe(true);
});


test('multiple wildcards in pattern', function () {
	$blacklist = '*spam*@*.com';

	expect(test_email_validation($blacklist, 'spam@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'myspam@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'spamtest@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'myspamtest@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'normal@example.com'))->toBe(true);
});

test('domain case sensitivity', function () {
	$blacklist = 'Example.Com';

	expect(test_email_validation($blacklist, 'user@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@EXAMPLE.COM'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@Example.Com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@Example1.Com'))->toBe(true);
});

test('malformed blacklist entries', function () {
	$blacklist = '@example.com,,test.com,@,.com,*@*';

	expect(test_email_validation($blacklist, 'user@example.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@test.com'))->toBe(false);
	expect(test_email_validation($blacklist, 'user@valid.com'))->toBe(false); // Due to *@*
});

test('long email addresses', function () {
	$blacklist = 'verylongdomain.com';
	$longLocalPart = str_repeat('a', 64); // Maximum local part length

	expect(test_email_validation($blacklist, $longLocalPart . '@verylongdomain.com'))->toBe(false);
	expect(test_email_validation($blacklist, $longLocalPart . '@other.com'))->toBe(true);
});
