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
