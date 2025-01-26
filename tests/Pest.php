<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

// pest()->extend(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

define( 'ABSPATH', dirname( __DIR__ ) . '/' );

class GFForms {
	public static function include_addon_framework() {
	}
}
class GFAddOn {
}

require_once dirname( __DIR__ ) . '/includes/class-gfemailblacklist.php';


if ( ! function_exists( "rgar" ) ) {

	/**
	 * Get a specific property of an array without needing to check if that property exists.
	 *
	 * Provide a default value if you want to return a specific value if the property is not set.
	 *
	 * @since  Unknown
	 * @access public
	 *
	 * @param array  $array   Array from which the property's value should be retrieved.
	 * @param string $prop    Name of the property to be retrieved.
	 * @param string $default Optional. Value that should be returned if the property is not set or empty. Defaults to null.
	 *
	 * @return null|string|mixed The value
	 */
	function rgar( $array, $prop, $default = null ) {

		if ( ! is_array( $array ) && ! ( is_object( $array ) && $array instanceof ArrayAccess ) ) {
			return $default;
		}

		if ( isset( $array[ $prop ] ) ) {
			$value = $array[ $prop ];
		} else {
			$value = '';
		}

		return empty( $value ) && $default !== null ? $default : $value;
	}
}

function apply_filters( $tag, $value, $arg = null ) {
	return $value;
}

function test_email_validation( $blacklist, $email ) {
	$gfemailblacklist = new GFEMailBlacklist();

	// Extract the email input and parse email components.
	$email  = $gfemailblacklist->gf_emailblacklist_clean( $email );
	$domain = $gfemailblacklist->gf_emailblacklist_clean( rgar( explode( '@', $email ), 1 ) );
	$tld    = strrchr( $domain, '.' );

	return $gfemailblacklist->is_email_blacklisted(false, null, $email, $domain, $tld, $blacklist);
}
